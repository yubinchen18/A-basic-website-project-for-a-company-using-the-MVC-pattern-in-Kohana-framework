<?php
class State
{
	// Key under which the state is stored in the session
	protected static $_key = '__data_state__';
	
	// Session storage
	protected static $_session = FALSE;
	
	// The state data
	protected static $_data = array();
	
	
	
	/**
	 * State instances
	 */ 
	protected static $_instances = array();
	
	/*
	 * Set session
	 */
	public static function session($session,$key=FALSE)
	{
		// store key
		if($key !== FALSE){
			self::$_key = $key;
		}
		
		// set session
		self::$_session = $session;

		// get data
		self::$_data = self::$_session->get(self::$_key);

		// bind data
		self::$_session->bind(self::$_key,self::$_data);
	}
	

	/**
	 * get instance with optional default group
	 */
	public static function instance($group='default')
	{
		if(!isset(self::$_instances[$group])){
			self::$_instances[$group] = new State($group);
		}
		
		return self::$_instances[$group];
	}
	
	
	// default group for state
	protected  $_group = '';
	
	
	
	/**
	 * construct
	 */
	protected function __construct($group='')
	{
		// add extra dot for non empty groups that dont end in a .
		if(strlen($group)>0 && substr($group, -1) !== '.'){
			$group = $group.'.';
		}
		// store group
		$this->_group = $group;
	}
	
	
	
	/**
	 * set a var
	 */ 
	public function set($path,$value)
	{
		// alter data
		Arr::set_path(self::$_data, $this->_group.$path, $value);
	}
	
	
	/**
	 * get a var
	 */
	public function get($path='', $default = NULL)
	{
		// return data
		return Arr::path(self::$_data, $this->_group.$path, $default);
	}
}