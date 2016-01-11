<?php

class Form_Element
{
	// field key
	protected $_key = NULL;
	// element name
	protected $_name = NULL;
	// element type
	protected $_type = NULL;
	// element value
	protected $_value = NULL;
	// element attributes
	protected $_attributes = array();
	// multiple
	protected $_multiple = FALSE;
	// rules
	protected $_rules = array();
	// rules
	protected $_required = FALSE;
	// error
	protected $_error = NULL;
	// errors
	protected $_errors = array();
	// extra data
	protected $_data = array();
	

	//accessible fields by __get and __set
	protected $_accessible = array('key','name','type','value','attributes','multiple','rules','required','errors','error');

	
	/**
	 * constructor
	 *
	 * @param Form_Field $field
	 * @param string $type
	 * @param array $settings
	 */
	public function __construct($key, $type, Array $settings=array())
	{		
		// store settings
		foreach($settings as $var => $val){
			$this->__set($var,$val);
		}
		// store key
		$this->_key = $key;
		// store type
		$this->_type = $type;
		// store attributes
		$this->_attributes = isset($settings['attributes'])?$settings['attributes']:array();
		

		// store multiple
		if(
			(
				(isset($settings['multiple']) && $settings['multiple']==TRUE) 
				|| 
				($type == 'checkbox' && (!isset($settings['multiple']) || $settings['multiple'] == FALSE))
			)
			&&
			( !isset($settings['single']) || $settings['single'] == FALSE )
		){
			$this->_multiple = TRUE;
		}

		// set default value or values
		if(isset($settings['compound']) && $settings['compound'] == TRUE){
			$this->_value = array();
			$keys = isset($settings['keys']) ? $settings['keys'] : array();
			$defaults = isset($settings['default']) ? $settings['default'] : array();
			foreach($keys as $key){
				$this->_value[$key] = isset($defaults[$key]) ? $defaults[$key] : NULL;
			}
		} else {
			$this->_value = isset($settings['default']) ? $settings['default'] : NULL;
		}

	}
	

	/**
	 * Form_Element::value()
	 * get / set value
	 * 
	 * @param mixed $value
	 * @return
	 */
	public function value($value = FALSE)
	{	
		if($value === FALSE){

			/**
			 * get value
			 */
			 $value = $this->_value;
			 
			 if($this->_multiple === TRUE){
			 	if($value === NULL){
					$value = array();
				} elseif(!is_array($value)){
					// value as only element in array
					$arrayValue = array();
					$arrayValue[]=$value;
					$value = $arrayValue;
				} 
		 	} 
			return $value;	
		} else {
			/**
			 * set value
			 */
		 	if($this->_multiple === TRUE){
		 		if($value === NULL){
					$value = array();
				} elseif(!is_array($value)){
					// value as only element in array
					$arrayValue = array();
					$arrayValue[]=$value;
					$value = $arrayValue;
				}
			}

			$this->_value = $value;
		}
	}
	



	/**
	 * Form_Element::rule()
	 * 
	 * @param string $rule
	 * @param array $params
	 * @return void
	 */
	public function rule($rule, $params = NULL)
	{
		// add rule
		$this->_rules[] = array(
			'rule'=>$rule,
			'params'=>$params
		);
		// set required
		if($rule == 'not_empty'){
			$this->_required = TRUE;
		}
	}
	
	
	
	
	/**
	 * Form_Element::error()
	 * get / add error(s)
	 * @param bool $error
	 * @return
	 */
	public function error($error = FALSE)
	{
		if($error === FALSE){
			
			/**
			 * get error
			 */
			 return $this->_error;
			 
		 } else {
		 	/**
		 	 * add error
		 	 */
		 	 $this->_errors[] = $error;
		 	 $this->_error = $this->_errors[0];
	 	 }
	}
	
	
	/**
	 * Form_Element::valid()
	 * check if there are errors or not
	 * 
	 * @return boolean
	 */
	public function valid()
	{
		if($this->_error === NULL){
			return TRUE;
		} else {
			return FALSE;
		}	
	}
	
	
	/**
	 * getter
	 *
	 * @param string $var
	 */
	public function __get($var)
	{
		if(in_array($var,$this->_accessible)){
			return $this->{'_'.$var};
		} elseif (isset($this->_data[$var])){
			return $this->_data[$var];
		} else {
			return NULL;
		}
	}
	
	
	
	/**
	 * setter
	 *
	 * @param atring $var
	 * @param mixed $val
	 */
	public function __set($var,$val)
	{
		if(in_array($var,$this->_accessible)){
			$this->{'_'.$var} = $val;
		} else {
			$this->_data[$var] = $val;
		} 
	}
	
	

	/**
	 * access of protected vars by method
	 *
	 * @param atring $name
	 * @param mixed $args
	 */
	public function __call($name,$args=array())
	{
		if(is_array($args) && isset($args[0])){
			// set a protected var
			if(in_array($name,$this->_accessible)){
				$this->{'_'.$name} = $args[0];
			} else {
				$this->_data[$name] = $args[0];
			}
		} else {
			// get a protected var
			if(in_array($name,$this->_accessible)){
				return $this->{'_'.$name};
			} elseif (isset($this->_data[$name])){
				return $this->_data[$name];
			} else {
				return NULL;
			}
		}
	}
	
	
	
	/**
	 * magic handler for isset
	 *
	 * @param string $var
	 * @return boolean
	 */
	public function __isset($var){
		if(in_array($var,$this->_accessible)){
			return TRUE;
		} elseif (isset($this->_data[$var])){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
