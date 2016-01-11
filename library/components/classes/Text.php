<?php
/**
 * Class to load and use text files of the form
 * 
 * <?php
 * return array(
 *	'key'=>'value'
 * )
 * 
 * will load files from [cascading file system]/text/[language]/[pack]
 * 
 * packs can be given with a / separator to load from subdirectories
 */
class Text extends Kohana_Text
{
	
	/**
	 * language for next generated text instance
	 */
	protected static $_language = 'nl';
	
	
	/**
	 * text instance
	 * @var type 
	 */
	protected static $_instances = array();
	
	
	/**
	 * Set language
	 * @param string $language
	 */
	public static function language($language)
	{
		self::$_language = $language;
	}
	
	/**
	* Extend a parent group
	* @param array $data
	* @return array
	*/
	public static function extend($group,$data)
	{
		return Reader::extend($group,$data);
	}

	/**
	* Fix a piece of data, so it wont be complemented by extensions
	* @param mixed $data
	* @return mixed
	*/
	public static function lock($data)
	{
		return Reader::lock($data);
	}
	
	/**
	 * Create a text instance
	 * supply text-packs as arguments
	 * packs are lowercase without .php
	 */
	public static function instance($language = FALSE)
	{
		if($language === FALSE){
			// fallback on static language
			$language = self::$_language;
		}
		
		if(!isset(self::$_instances[$language])){
			// create a new reader and new instance for new language
			$reader = Reader::factory('text/'.$language.'/');

			// create text
			self::$_instances[$language] = new Text($reader);
		}
		
		// return instance
		return self::$_instances[$language];
	}
	
	
	
	/**
	 * Reader instance
	 * @var Reader 
	 */
	protected $_reader = FALSE;
	
	
	/**
	 * array with substitutes
	 * @var array 
	 */
	protected $_substitutes = array();
	
	
	/**
	 * Constructor
	 */
	protected function __construct($reader)
	{
		$this->_reader = $reader;
	}
	
	

	/**
	 * Load a text packs
	 */
	public function load()
	{	
		// get packs from arguments
		$packs = func_get_args();
		for($i=0;$i<count($packs);$i++){
			$pack = $packs[$i];
			if(is_array($pack)){
				// by mistake an array might be given. That's ok
				for($j=0;$j<count($pack);$j++){
					$this->_reader->load($pack[$j]);
				}
			} else {
				$this->_reader->load($pack);
			}
		}
		return $this;
	}
	
	
	/**
	 * Set default group to use in reader
	 * @param string $group
	 */
	public function group($group)
	{
		// set reader in group
		$this->_reader->group($group);
		// chain
		return $this;
	}
	
	
	/**
	 * Set default substitutes
	 */
	public function substitutes($val)
	{
		$this->_substitutes = $this->_substitutes($val);

	}
	
	
	/**
	 * Get substitutes
	 * provide an assoc array with substitutes
	 * or provide a string to read substitutes from the contents of the instance
	 * will automatically add : to the keys
	 * @param mixed $val string / array
	 */
	protected function _substitutes($val)
	{
		if(is_string($val)){
			$substitutes = $this->_reader->get($val,array());
		} elseif(is_array($val)){
			$substitutes = $val;
		} else {
			$substitutes = array();
		}
		$parsed = array();
		foreach($substitutes as $key => $substitute){
			if(substr($key,0,1) !== ':'){
				$key = ':'.$key;
			}
			$parsed[$key] = $substitute;
		}
		return $parsed;
	}
	
	
	/**
	 * Get a text value
	 * @param string $path dotted string
	 * @param array $substitutes
	 * @param bool $ucFirst
	 * @return string
	 */
	public function get($path,$substitutes=array(),$ucFirst=true)
	{
		// get the string
		$string = $this->_reader->get($path,'');
		
		// replace substitutes
		if(is_string($string)){
			
			if(is_string($substitutes)){
				// a subs string was given. Use an alternative set of subs from the loaded text
				$substitutes = $this->_substitutes($substitutes);
			} else {
				// use default subs as substitues, merge with given
				$substitutes = array_merge($this->_substitutes,$substitutes);
			}
		
			// replace substitues
			$string = strtr($string,$substitutes);
		}

		// Capitalize first
		if($ucFirst && is_string($string)){
			$string = ucfirst($string);
		}

		return $string;
	}
	
	
	/**
	 * Get the data as array
	 * @param string $group
	 * @return array
	 */
	public function as_array($group = FALSE)
	{
		return $this->_reader->as_array($group);
	}
}


/**
* Helper function for Views
 * Create an instance with the default language and call get
 */
function text($path,$substitutes=array(),$ucFirst=true)		
{
	return Text::instance()->get($path,$substitutes,$ucFirst);
}