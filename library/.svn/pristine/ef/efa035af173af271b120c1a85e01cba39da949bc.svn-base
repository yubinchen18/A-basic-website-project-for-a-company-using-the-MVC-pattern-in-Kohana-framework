<?php

/**
 * Viewer class
 * Has a number of purposes
 * - Does auto-escaping on data
 * - Can house helper function to make for cleaner views
 * - Can be cast to new Viewer-type
 * - Is passed by reference, but can also act as an array
 */
class Viewer implements Iterator, Countable, ArrayAccess 
{
	const TYPE_EMPTY = 'empty';
	const TYPE_SCALAR = 'scalar';
	const TYPE_ARRAY = 'array';
	const TYPE_OBJECT = 'object';
	
	
	protected static $_instances = array();
	
	
	/**
	 * Get a instance of a certain viewer that is persistant
	 * _data will always be of the type ARRAY
	 * with subsequent calls to instance, the data-array will complemented with the provided data
	 * create one if it didnt exist
	 * @param string $viewer
	 * @param array $data
	 * @return Viewer
	 */
	public static function instance($viewer,$data=array())
	{
		if(!isset(self::$_instances[$viewer])){
			// create a new viewer with the data type ARRAY
			$instance = self::factory($viewer,array());
			self::$_instances[$viewer] = $instance;
		} else {
			$instance = self::$_instances[$viewer];
		}
		
		if(is_array($data) || is_object($data)){
			// add data to array
			foreach($data as $key => $value){
				$instance->set($key,$value);
			}
		}
		return $instance;
	}
	
	

	/**
	 * Create a viewer
	 * @param mixed $viewer_or_data
	 * @param mixed $data
	 * @return Viewer 
	 */
	public static function factory($viewer_or_data=FALSE,$data=FALSE)
	{
		if($viewer_or_data === FALSE){
			// vanilla viewer without data
			$viewer = new Viewer(NULL);
		} elseif(is_string($viewer_or_data) && $data !== FALSE){
			// extended viewer
			$class = 'Viewer_'.ucfirst($viewer_or_data);
			$viewer = new $class($data);
		} elseif(is_string($viewer_or_data)) {
			// we are taking a guess: 
			// $viewer_or_data is a string, but there's no data given.
			// it's very likely the user meant to use $viewer_or_data as viewer, So:
			// Type viewer with no data
			$class = 'Viewer_'.ucfirst($viewer_or_data);
			$viewer = new $class(NULL);
		} else {
			// $viewer_or_data is no string, so it is data
			$viewer = new Viewer($viewer_or_data);
		}
		return $viewer;
	}
	
	/* settings set by settings() */
	protected $_settings = array();
	
	/* text set by text() */
	protected $_text = NULL;
	
	/* methods for viewer */
	//protected $_viewer_methods = array();
	
	/* data */
	protected $_data = NULL;
	
	/* datatype */
	protected $_data_type = NULL;
	
	/* methods for object */
	protected $_data_methods = array();
	
	/* Charset */
	protected $_charset = 'utf-8';
	
	
	/**
	 * constructor
	 * @param mixed type $data 
	 */
	protected function __construct($data = NULL)
	{
		// determine datattype
		if(is_object($data)){
			$this->_data = $data;
			$this->_data_type = Viewer::TYPE_OBJECT;
			$this->_data_methods = get_class_methods($data);
		} elseif(is_array($data)){
			$this->_data = $data;
			$this->_data_type = Viewer::TYPE_ARRAY;
		} elseif($data != NULL) {
			$this->_data = $data;
			$this->_data_type = Viewer::TYPE_SCALAR;
		} else {
			$this->_data_type = Viewer::TYPE_EMPTY;
		}
		
		// get own methods
		//$this->_viewer_methods = get_class_methods($this);
	}
	

	/**
	 * Get a property of the data
	 * 
	 * @param string $name 
	 * @param bool $raw HTML::chars or not
	 * @param string $viewer return objects as a specific viewer
	 * @return mixed
	 */
	protected function _viewer_get($name=FALSE,$args=array(),$raw=FALSE,$viewer=FALSE)
	{
		// start with nothing
		$result = NULL;
		
		if($name === FALSE){
			// no name given: to string
			return $this->_viewer_string();
		//} elseif(in_array($name,$this->_viewer_methods,TRUE) && $from_data===FALSE){
			// call viewer function
		//	$result = call_user_func_array(array($this,$name),$args);
		} elseif($this->_data_type === Viewer::TYPE_OBJECT){


			// object
			if(isset($this->_data->{$name})){
				// property
				$result = $this->_data->{$name};
			} elseif(in_array('__get',$this->_data_methods,TRUE)/* && $this->_data->{$name} !== NULL*/){
				// magic property
				$result = $this->_data->{$name};
			} elseif(in_array($name,$this->_data_methods,TRUE)){
				// method
				$result = call_user_func_array(array($this->_data,$name),$args);
			} elseif(in_array('__call',$this->_data_methods,TRUE)){
				// magic method
				$result = call_user_func_array(array($this->_data,$name),$args);
			}

		} elseif($this->_data_type === Viewer::TYPE_ARRAY){
			// array
			if(isset($this->_data[$name])){
				$result = $this->_data[$name];
			} 
		} elseif($this->_data_type === Viewer::TYPE_SCALAR) {
			// scalar
			$result = $this->_data;
		}
			
		// finish up and return
		return $this->_viewer_result($result,$raw,$viewer);
	}
	
	
	/**
	 * Get a string-representation of the Viewer
	 */
	protected function _viewer_string($raw=FALSE)
	{
		if($this->_data_type === Viewer::TYPE_OBJECT){
			return 'Object';
		} elseif($this->_data_type === Viewer::TYPE_ARRAY){
			return 'Array';
		} elseif($this->_data_type === Viewer::TYPE_SCALAR) {
			return (string)$this->_viewer_result($this->_data,$raw);
		} else {
			return '';
		}
	}

	
	/**
	 * Create a nice result
	 * Create a new Viewer for objects and arrays or if a $viewer was provided
	 * escape strings
	 * @param mixed $result
	 * @param boolean $raw
	 * @param string $viewer 
	 */
	protected function _viewer_result($result, $raw=FALSE, $viewer=FALSE)
	{
		if($raw===TRUE){
			// do no escaping or wrapping
			return $result;
		} else {
			if(is_string($result)){

	
				// escape string
				return htmlspecialchars( (string) $result, ENT_QUOTES, $this->_charset, FALSE);
			} else {
				// if a viewer is provided, always return a viewer
				// else, only return a viewer for objects and arrays
				if(is_string($viewer) || is_object($result) || is_array($result)){
					if(is_string($viewer)){
						// specific viewer
						$result = Viewer::factory($viewer,$result);
					} else {
						// vanilla viewer
						$result = Viewer::factory($result);
					}
				}
				return $result;
			}
		}
	}
	
	

	/**
	 * check if a value is set
	 * @param string $name
	 * @return booelan 
	 */
	protected function _viewer_isset($name)
	{
		$result = FALSE;
		
		if($this->_data_type === Viewer::TYPE_OBJECT){
			if(isset($this->_data->{$name})){
				$result = TRUE;
			} elseif(in_array($name,$this->_data_methods,TRUE)){
				$result = TRUE;
			}
		} elseif($this->_data_type === Viewer::TYPE_ARRAY){
			if(isset($this->_data[$name])){
				$result = TRUE;
			} 
		}
		return $result;
	}

	
	/**
	 * Set a piece of _data
	 * only works if the _data is EMPTY, ARRAY or OBJECT
	 * @param string $key
	 * @param mixed $value
	 */
	public function set($key,$value)
	{
		if($this->_data_type === Viewer::TYPE_EMPTY){
			$this->_data_type = Viewer::TYPE_ARRAY;
			$this->_data = array();
			$this->_data[$key] = $value;
		} elseif($this->_data_type === Viewer::TYPE_ARRAY){
			$this->_data[$key] = $value;
		} elseif($this->_data_type === Viewer::TYPE_OBJECT){
			$this->_data->{$key} = $value;
		}
		return $this;
	}
	
	
	/**
	 * get a specific property of the data object
	 * exposes _viewer_get for properties
	 * @param string $name
	 * @param bool $raw
	 * @param type $viewer
	 */
	public function get($name=FALSE,$raw=FALSE,$viewer=FALSE)
	{
		// call viewer_get with alst param to true, to force 
		return $this->_viewer_get($name,array(),$raw,$viewer,TRUE);
	}
	
	
	/**
	 * Set / Get settings
	 * @param array $settings
	 */
	public function settings($settings=FALSE)
	{
		if($settings === FALSE){
			return $this->_settings;
		} else {
			$this->_settings = $settings;
			return $this;
		}
	}
	
	/**
	 * Set text
	 * @param array $settings
	 */
	public function text($text)
	{
		$this->_text = $text;
	}
	
	
	/**
	 * Set a new charset
	 * @param string $charset 
	 */
	public function charset($charset)
	{
		$this->_charset = $charset;
	}
	
	
	/**
	 * Get the data without htmlspecialchars
	 * Or get the entire data object
	 * @param string $name
	 * @param array $args optional args when name is a function
	 * @return type 
	 */
	public function raw($name=FALSE,$args=array())
	{
		if($name === FALSE){
			return $this->_data;
		} else {
			return $this->_viewer_get($name,$args,TRUE);
		}
	}
	

	/**
	 * get the secified name as the specified viewer
	 * @param string $viewer
	 * @param string $name
	 * @param array $args optional arguments when $name is a method
	 * @return mixed 
	 */
	public function viewer($viewer, $name=FALSE, $args=array())
	{
		if($name === FALSE){
			// return the current data as the specified viewer
			return $this->_viewer_result($this->_data,TRUE,$viewer);
		} else {
			// get a named var as the specified viewer
			return $this->_viewer_get($name,$args,TRUE,$viewer);
		}
	}
	
	
	/**
	 * 
	 * Usage $item->invoke('methodname',array($arg1,$arg2,$arg3),$raw,$viewer)
	 * 
	 * Serves two purposes:
	 * 1. Helper method to call a method on the data that is only available through a magic __call. 
	 * The methods: count, rewind, next, current, key, valid, raw, yield, string, 
	 * The implementation of count, rewind, next, current, key, valid, raw, yield, string checks for an available function 
	 * in the data object first. 
	 * However: magic methods are not detected in this process, 
	 * so use this method to circumvent the problem
	 * 
	 * 2. if a call to a method in the data object is made, the result is always escaped
	 * Use this this method to pass a raw=TRUE.
	 * 
	 * @param string $method
	 * @param array $args
	 * @param bool $raw
	 * @param string $viewer new viewer-type for result
	 * @return type 
	 */
	public function invoke($name=FALSE,$args=array(),$raw=FALSE,$viewer=FALSE)
	{
		// call method
		$result = call_user_func_array(array($this->_data,$name),$args);
		return $this->_viewer_result($result,$raw,$viewer);
	}
	
	/**
	 * get the classname of the data
	 * @return string
	 */
	public function classname()
	{
		return get_class($this->_data);
	}
	
	/**
	 * magic get
	 * @param string $name
	 * @return mixed 
	 */
	public function __get($name)
	{
		return $this->_viewer_get($name,array(),FALSE,FALSE);
	}
	
	
	/**
	 * magic call
	 * @param string $name
	 * @return mixed 
	 */
	public function __call($method,$args=array())
	{
		if($this->_data_type === Viewer::TYPE_OBJECT && is_callable(array($this->_data,$method))){
			return $this->_viewer_result(call_user_func_array(array($this->_data,$method),$args));
		}
	}
	
	
	/**
	 * magic isset
	 * @param string $name
	 * @return bool 
	 */
	public function __isset($name)
	{
		return $this->_viewer_isset($name);
	}
	
	
	/**
	 * magic toString
	 * @return string 
	 */
	public function __toString()
	{
		return $this->_viewer_string();
	}
	
	
	
	
	
	/*--------------------
	 * implementation of countable
	 * implementation of ArrayAccess
	 * helper functions to make _data iterable as array with for loop
	 *-------------------*/
	public function count() 
	{
		if($this->_data_type === Viewer::TYPE_OBJECT && in_array('count',$this->_data_methods,TRUE)){
			// keep the original data method accessible
			return $this->_viewer_result(call_user_func_array(array($this->_data,'count'),func_get_args()));
		} else {
			return count($this->_data);
		}
    }
	
	
	public function offsetSet($offset, $value) 
	{
		if($this->_data_type === Viewer::TYPE_ARRAY){
			if (is_null($offset)) {
				$this->_data[] = $value;
			} else {
				$this->_data[$offset] = $value;
			}
		} 
	}
	
	
    public function offsetExists($offset) 
	{
		if($this->_data_type === Viewer::TYPE_ARRAY){
			return isset($this->_data[$offset]);
		} elseif($this->_data_type === Viewer::TYPE_OBJECT){
			return $this->_data->{$offset}!==null;
		} else {
			return FALSE;
		}
    }
	
	

    public function offsetUnset($offset) 
	{
		if($this->_data_type === Viewer::TYPE_ARRAY){
			unset($this->_data[$offset]);
		}
    }
	
	
    public function offsetGet($offset) 
	{
		if($this->_data_type === Viewer::TYPE_ARRAY || $this->_data_type === Viewer::TYPE_OBJECT){
			return $this->_viewer_get($offset);
		} else {
			return NULL;
		}
    }
	
	
	
	/*--------------------
	* implementation of Iterable
	 * helper functions to make _data iterable w foreach
	 *-------------------*/
	public function rewind()
	{
		if($this->_data_type === Viewer::TYPE_OBJECT && in_array('rewind',$this->_data_methods,TRUE)){
			// keep the original data method accessible
			return $this->_viewer_result(call_user_func_array(array($this->_data,'rewind'),func_get_args()));
		} else {
			if($this->_data_type === Viewer::TYPE_ARRAY){
				reset($this->_data);
			}
		}
	}

	
    public function current()
    {
		if($this->_data_type === Viewer::TYPE_OBJECT && in_array('current',$this->_data_methods,TRUE)){
			// keep the original data method accessible
			return $this->_viewer_result(call_user_func_array(array($this->_data,'current'),func_get_args()));
		} else {
			if($this->_data_type === Viewer::TYPE_ARRAY){
				return $this->_viewer_get(key($this->_data));
			} else {
				return NULL;
			}
		}
    }

	
    public function key()
    {
    	if($this->_data_type === Viewer::TYPE_OBJECT && in_array('key',$this->_data_methods,TRUE)){
			// keep the original data method accessible
			return $this->_viewer_result(call_user_func_array(array($this->_data,'key'),func_get_args()));
		} else {
			if($this->_data_type === Viewer::TYPE_ARRAY){
				return key($this->_data);
			} else {
				return NULL;
			}
		}
    }

	
    public function next() 
	{
		if($this->_data_type === Viewer::TYPE_OBJECT && in_array('next',$this->_data_methods,TRUE)){
			// keep the original data method accessible
			return $this->_viewer_result(call_user_func_array(array($this->_data,'next'),func_get_args()));
		} else {
			if($this->_data_type === Viewer::TYPE_ARRAY){
				next($this->_data);
			}
		}
    }

	
    public function valid()
    {
    	if($this->_data_type === Viewer::TYPE_OBJECT && in_array('valid',$this->_data_methods,TRUE)){
			// keep the original data method accessible
			return $this->_viewer_result(call_user_func_array(array($this->_data,'valid'),func_get_args()));
		} else {
			if($this->_data_type === Viewer::TYPE_ARRAY){
				return key($this->_data) !== null;
			} else {
				return FALSE;
			}
		}
    }
}