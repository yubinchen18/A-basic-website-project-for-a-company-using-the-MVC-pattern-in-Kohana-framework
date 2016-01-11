<?php
/**
 * Class to load and use settings files of the form
 * 
 * <?php
 * return array(
 *	'key'=>'value'
 * )
 * 
 * will load files from [cascading file system]/settings/[module]
 * 
 */
class Settings
{
	
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
	 * Create a settings instance
	 * supply module as argument
	 * optional directories parameter to check in instead of /settings
	 */
	public static function factory($module,$directories=FALSE)
	{
		// set directories
		if($directories === FALSE){
			$directories = array('settings'.DIRECTORY_SEPARATOR);
		} elseif(is_string($directories)){
			$directories = array($directories);
		} 
		
		// create reader
		$reader = call_user_func_array(array('Reader','factory'), $directories);

		// create settings
		$settings = new Settings($reader,$module);

		// return it
		return $settings;
	}
	
	/**
	 * reader instance
	 * @var Reader
	 */
	protected $_reader;
	
	/**
	 * module
	 * @var string
	 */
	protected $_module;
	
	
	/**
	 * Constructor
	 */
	protected function __construct($reader,$module)
	{
		// store reader
		$this->_reader = $reader;
		
		// store module
		$this->_module = $module;

		// load module
		$this->_reader->load(strtolower($this->_module));
	}
	
	
	/**
	 * Set group in reader
	 * @param string $group
	 */
	public function group($group)
	{
		$this->_reader->group($group);
	}
	
	
	/**
	 * Get a settings value
	 * @param string $path dotted string
	 * @return string
	 */
	public function get($path,$default=NULL)
	{
		// get the setting
		$setting = $this->_reader->get($path,$default);
		
		// replace substitutes
		if(is_string($setting)){
			$setting = strtr($setting,array(':module'=>$this->_module));
		}
		
		return $setting;
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