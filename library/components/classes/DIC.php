<?php


/**
 * Dependecy Injection Container
 * Call DIC::definitions(); first with an array that looks like this
 * array(
 *	'user'=>array(
 *		'ORM::factory'=>array('User',':id'),
 *		'database'=>array('&database')
 *	),
 *	'database'=>array(
 *		'Database::instance'=>array(':group')
 *	)
 *)
 * 
 * First row is the constructor, subsequent rows are extra calls to the instantiated object
 * use the class name if an object should be instantiated with 'new'
 * 
 * ":" means: use a var from $params in this place
 * "&" means: use DIC::get to create an object to use in this place
 * "+" means: use DIC::make to create an object in this place
 * 
 * 
 * Then use DIC::get() and DIC::make() to get an existing object or create a new one
 * ::get will return the last created object of that name
 * ::get will create a new object if none exists.
 * 
 * pass in params as an assoc array:
 * $user = DIC::make('user',array('id'=>12))
 * 
 * to pass in params for nested depencendies, use a nested construction
 * $user = DIC::make('user',array('id'=>12,'database'=>array('group'=>'server_1'))
 */
class DIC 
{
	
	/**
	 * The blueprints
	 * @var array 
	 */
	protected static $_definitions = array();
	
	
	/**
	 * The created instances
	 * @var array 
	 */
	protected static $_instances = array();
	
	
	/**
	 * Set the definitions
	 * @param array $definitions
	 */
	public static function definitions($definitions)
	{
		self::$_definitions = $definitions;
	}
	
	/**
	 * Create a new instance and store it under the given name
	 * @param string $name
	 * @param array $params
	 * @return Object
	 */
	public static function make($name,$params)
	{
		self::$_instances[$name] = self::instantiate($name,$params);
		return self::$_instances[$name];
	}
	
	/**
	 * Get an existing instance, if it doesnt exist, create a new one
	 * @param string $name
	 * @param array $params
	 * @return Object
	 */
	public static function get($name,$params)
	{
		if(!isset(self::$_instances[$name])){
			self::make($name,$params);
		}
		return self::$_instances[$name];
	}
	
	
	/**
	 * Create and return an instance
	 * @param string $name name of the service
	 * @param array $params
	 * @return Object
	 */
	protected static function instantiate($name,$params=array())
	{
		// make sure $params is an array
		if(!is_array($params)){
			$params = array();
		}

		//start with nothing
		$instance = NULL;
		
		// get definition
		$def = isset(self::$_definitions[$name]) ? self::$_definitions[$name] : array();
		
		
		// make sure $def is an array
		if(!is_array($def)){
			$def = array();
		}
		
		// catch the first method: as it is the constructor
		$counter = 0;
		
		foreach($def as $method => $args){
			// get the arguments
			$args = self::args($args,$params);
				
			if($counter == 0){
				// first one is the constructor
				// get an instance
				if(strpos($method,'::') <= -1){
					$reflection = new ReflectionClass($method);
					$instance = $reflection->newInstanceArgs($args);
				} else {
					$instance = call_user_func_array($method, $args);
					
				}
			} else {
				if($instance !== NULL){
					// subsequent ones are functioncalls
					call_user_func_array(array($instance,$method), $args);
				}
			}
			$counter++;
		}
		return $instance;
	}
	
	
	
	/**
	 * create args for instance calls
	 * Get args from SL, params or just use the string
	 * @param array $args
	 * @param array $params
	 * @return array
	 */
	protected static function args($args=array(),$params=array())
	{
		// no args 
		if(!is_array($args)){
			return array();
		}
		
		$parsed = array();
		foreach($args as $arg){
			$first = substr($arg,0,1);
			$last = substr($arg,1);
			if($first === ':'){
				$param = isset($params[$last])?$params[$last]:NULL;
				// get value from params
				$parsed[]=$param;
			} elseif($first === '&'){
				// get an existing instance
				$parsed[]= self::get($last,isset($params[$last])?$params[$last]:array());
			} elseif(substr($arg,0,1) === '+'){
				// create a new instance
				$parsed[]= self::make($last,isset($params[$last])?$params[$last]:array());
			} else {
				// just use the string
				$parsed[]= $arg;
			}
		}
		return $parsed;
	}
}