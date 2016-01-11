<?php

/**
* Class that reads php-files with the form
 * return array(
 *    'foo' => 'bar'
 * )
 * 
 * When a key __extend__ is used, the reader will also read from that file
 * Set an __extend__ key by using Reader::extend([group],[data array]);
 * 
 * When extending, all assoc arrays will be complemented by the parent
 * To prevent this, wrap an assoc array in Reader::fix([data array])
 * This will add a __fix__ => TRUE to the beginning of the array
 * 
 * Extra flags will be removed in the final data
 * 
 * use dot notation to access vars
 * use $reader->get([group]:data) to access a scecific group
 * 
 * use $reader->group([group]) to access a group by default
 * 
 */
class Reader
{
	
	/**
	 * Cache instance
	 */
	protected static $_cache = FALSE;
	
	/**
	 * Cache key
	 * @var type 
	 */
	protected static $_cache_key_base = '__reader_data_';
	
	/**
	 * Files that have been read
	 * @var array 
	 */
	protected static $_read = array();
	
	/**
	 * Set a cache instance
	 * @param Cache $cache
	 * @param String $key extra base key for cache (for instance 'backend' , 'frontend')
	 */
	public static function cache($cache,$key = '')
	{
		// set cache
		self::$_cache = $cache;
		// set extra base key
		self::$_cache_key_base .= ($key!='' ? ($key.'_') : '');
	}
	
	/**
	 * Add an __extend__ key to the start of the data
	 * @param string $group
	 * @param array $data
	 * @return array
	 */
	public static function extend($group,$data)
	{
		return array_merge($data,array('__extend__'=>$group));
	}

	/**
	 * Add a __locked__ key to the start of the data
	 * but only in case of an assoc array
	 * @param mixed $data
	 * @return mixed
	 */
	public static function lock($data)
	{
		if(is_array($data) && (Arr::is_assoc($data) || empty($data)) ){
			return array_merge($data,array('__locked__'=>TRUE));
		} else {
			return $data;
		}
	}
	
	
	/**
	 * Create a reader and return it
	 * set one or more directories to read from
	 * @return Reader
	 */
	public static function factory()
	{
		// get directories
		$directories = func_get_args();
		
		if(count($directories)===0){
			// set at least one empty directory
			$directories = array('');
		}

		// create a reader
		$reader = new Reader();
		// set directories (will autoload cache for those directories)
		$reader->directories($directories);
		// return it
		return $reader;
	}
	
	
	/**
	 * Directories to look in
	 * @var array 
	 */
	protected $_directories = array('');
	
	/**
	 * Flat string to identify the directories by. Used for internal and external cache
	 * @var string 
	 */
	protected $_directories_key ='';
	
	/**
	 * Loaded data
	 */
	protected $_data = array();
	
	/**
	 * Cache key for the reader cache
	 * @var string 
	 */
	protected $_cache_key = '';
	
	/**
	 * The group to read from: if false, the last added group is used
	 * @var type 
	 */
	protected $_group = FALSE;
	
	/**
	 * Data file that was added last: will be used if no group is set
	 * @var type 
	 */
	protected $_last = array();
	
	
	/**
	 * Constructor
	 */
	protected function __construct()
	{
		
	}
	
	
	/**
	 * Set base driectoreis for loading files
	 */
	public function directories($directories)
	{
		// set directory
		$this->_directories = $directories;
		// create key for these dirs. Used for internal and external caching
		$this->_directories_key = implode('__###__',array_map('strtolower', $directories));
		// get cached data
		if(self::$_cache !== FALSE){
			// create cache key
			$this->_cache_key = self::$_cache_key_base.$this->_directories_key;
			// get data from cache
			try{
				$this->_data = self::$_cache->get($this->_cache_key,array());
			} catch(Exception $e){
				
			}
		}
	}
	
	
	/**
	 * Set the file / group to use for calls to 'get'
	 * Get data from antother group by using [group]:var.var
	 * @param string $group
	 */
	public function group($group)
	{
		$this->_group = strtolower($group);
	}
	
	
	/**
	 * Load a file
	 * @param type $file
	 */
	public function load($file)
	{
		$file = strtolower($file);
		
		// if data was already loaded (for instance from cache)
		if(isset($this->_data[$file])){
			// store data as last loaded
			$this->_last = $this->_data[$file];
			// do nothing else: we got the data we want
			return;
		}
		// get data
		$this->_data[$file] = $this->build($file);

		// cache resulting data
		if(self::$_cache !== FALSE){
			try{
				self::$_cache->set($this->_cache_key,$this->_data);
			} catch(Exception $e){
				
			}
		}

		// store result as last loaded
		$this->_last = $this->_data[$file];
	}
	
	
	/**
	 * Build a databundle with extensions
	 * @param type $file
	 * @return type
	 */
	protected function build($file)
	{
		// get data from file
		$data = $this->read($file);

		// check for extension
		if(isset($data['__extend__'])){
			// build the parent recusrsively
			$parent = $this->build($data['__extend__']);
			
			// add parent's data
			$this->merge($data, $parent);
		}
		
		// remove __extend__ and __locked__ keys
		$this->cleanup($data);

		// done
		return $data;
	}
	
	
	/**
	 * Complement a child array with a parrnt array, is done by reference
	 * @param array $child
	 * @param array $parent
	 * @return void
	 */
	protected function merge(& $child, $parent)
	{
		// dont go through parent when it's not an array
		if(is_array($parent)){
			foreach($parent as $key => $val){
				if(isset($child[$key])){

					if(is_array($child[$key]) && (Arr::is_assoc($child[$key]) || empty($child[$key]))){
						// key exists and is assoc array: go deeper
						if(!isset($child[$key]['__locked__']) || $child[$key]['__locked__'] == FALSE){
							// only go deeper if the __fix__ flag was not set
							$this->merge($child[$key], $val);
						}
					} else {
						// dont overwrite anything that's not an assoc array
					}
				} else {
					// add entire value
					$child[$key] = $val;
				}
			}
		}
	}
	
	
	/**
	 * Remove __extend__ and __fix__ keys from data
	 * @param array $data
	 */
	protected function cleanup(& $data)
	{
		foreach($data as $key => $val){
			if(is_array($data[$key]) && Arr::is_assoc($data[$key])){
				// dig deeper
				$this->cleanup($data[$key]);
			}
			if($key === '__extend__' || $key === '__locked__'){
				unset($data[$key]);
			}
		}
	}
	
	
	/**
	 * Load a file
	 */
	protected function read($file)
	{
		if(isset(self::$_read[$this->_directories_key.$file])){
			// file already read somewhere: return read
			return self::$_read[$this->_directories_key.$file];
		} else {
			// not already read: get path
			foreach($this->_directories as $directory){
				if($path = Kohana::find_file($directory, $file, NULL , FALSE)){
					break;
				}
			}

			if($path !== FALSE){
				// include data from path
				$data = include($path);
			} else {
				// just an empty array
				$data =  array();
			}
			// store result as read
			self::$_read[$this->_directories_key.$file] = $data;
			
			// return the result
			return $data;
		}
	}
	

	/**
	 * Get a variable
	 */
	public function get($path,$default=NULL)
	{
		// check for namespace
		$parts = explode(':',$path);

		// get the correct data
		if(count($parts)>=2 && strpos($parts[0],'.')<=-1){
			// groups cannot have a dot
			$group = strtolower($parts[0]);
			// get namespaced data
			$data = isset($this->_data[$group]) ? $this->_data[$group] : array();
			// path is the second part
			$path = $parts[1];
		} elseif($this->_group !== FALSE) {
			// get current namespace data
			$data = isset($this->_data[$this->_group]) ? $this->_data[$this->_group] : array();
		} else {
			// use last loaded
			$data = $this->_last;
		}
		
		// find the wanted path
		$result = Arr::path($data, $path,'__not_set__');
	
		
		// return result or default
		if($result !== '__not_set__'){
			return $result;
		} else {
			return $default;
		}
	}
	
	
	/**
	 * Get the data as array
	 * @param string $group
	 * @return array
	 */
	public function as_array($group = FALSE)
	{
		if($group !== FALSE){
			$group = strtolower($group);
			// get data for given namespace
			$data = isset($this->_data[$group]) ? $this->_data[$group] : array();
		} elseif($this->_group !== FALSE) {
			// get current group data
			$data = isset($this->_data[$this->_group]) ? $this->_data[$this->_group] : array();
		} else {
			// use last loaded
			$data = $this->_last;
		}
		return $data;
	}
	
	
	/**
	 * Get all the data
	 * @return array
	 */
	public function data()
	{
		return $this->_data;
	}
}