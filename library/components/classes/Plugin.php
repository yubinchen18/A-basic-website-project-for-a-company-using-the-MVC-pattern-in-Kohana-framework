<?php 
class Plugin
{
	protected static $_instances = array();
	
	protected $_settings;
	
	protected $_text;
	
	
	
	/**
	 * factory for text objects
	 *
	 * @param string $text
	 * @return Text
	 */
	public static function factory($plugin,$settings=array())
	{
		// Set class name
		$plugin = 'Plugin_'.ucfirst($plugin);
		
		// create instance
		$instance = new $plugin($settings);
		
		// store instance
		self::$_instances[]=$instance;
		
		// return the instance
		return $instance;
	}
	
	
	/**
	 * constructor
	 *
	 */
	public function __construct($settings)
	{
		$this->_settings = $settings;
	}
	
	

	/**
	 * set text
	 *
	 * @param Text $text
	 */
	public function text($text)
	{
		$this->_text = $text;
	}
}