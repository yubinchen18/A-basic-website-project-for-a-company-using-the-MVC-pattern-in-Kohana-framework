<?php

/**
 * Class extends Kohana form to enable Form::input() etc. 
 * So only adds the static functions of Kohana's Form
 */
class Form extends Kohana_Form
{

	// form instance num
	protected static $_instance_num=0;
	
	/**
	 * factory
	 *
	 */
	public static function factory($form=FALSE)
	{		
		// Set class name
		if($form === FALSE){
			$form = 'Form';
		} else {
			$form = 'Form_'.ucfirst($form);
		}
		
		// internal instancenum
		self::$_instance_num++;
		
		// return an instance
		return new $form();
	}
	
	
	// form id
	protected $_id=0;
	
	// whether build() was called
	protected $_built = FALSE;
	
	// form action
	protected $_action='';
	
	// form method
	protected $_method='POST';
	
	// form enctype
	protected $_enctype='multipart/form-data';

	// form attributes
	protected $_attributes=array();
	
	//list of fields
	protected $_fields=array();
	
	// form elements
	protected $_elements=array();
	
	// values
	protected $_values=array();

	// properties that can be accessed by __get() and __set()
	protected $_accessible = array('id','action','enctype','attributes','method','elements','groups');
	
	
	/**
	 * constructor
	 */
	public function __construct()
	{
		// set id
		$this->_id = self::$_instance_num;
	}

	
	/**
	 * init a form
	 * calls build, but only once
	 */
	protected final function init()
	{
		if($this->_built === FALSE){
			// make sure it is only done once
			$this->_built = TRUE;
			
			// put hidden field with form id
			$this->element('form_'.$this->_id.'_submitted','hidden');
			$this->value('form_'.$this->_id.'_submitted','1');
			
			// call the user defined build function
			$this->build();
		}
	}
	
	/**
	 * Overwrite this function in extensions
	 * Use this function to add elements/markup/groups/rules to the form
	 */
	protected function build(){}

	
	/**
	 * Get or set the id
	 */
	public function id($id = FALSE)
	{
		if($id === FALSE){
			return $this->_id;
		} else {
			$this->_id = $id;
			return $this;
		}
		
	}
	
	
	/**
	 * Get or set the action
	 */
	public function action($action = FALSE)
	{
		if($action === FALSE){
			return $this->_action;
		} else {
			$this->_action = $action;
			return $this;
		}
	}
	
	/**
	 * Get or set the method
	 */
	public function method($method = FALSE)
	{
		if($method === FALSE){
			return $this->_method;
		} else {
			$this->_method = strtoupper($method);
			return $this;
		}
	}
	
	/**
	 * Get or set the enctype
	 */
	public function enctype($enctype = FALSE)
	{
		if($enctype === FALSE){
			return $this->_enctype;
		} else {
			$this->_enctype = $enctype;
			return $this;
		}
	}
	
	/**
	 * Get or set the attributes
	 */
	public function attributes($attributes = FALSE)
	{
		if($attributes === FALSE){
			// getter
			return $this->_attributes;
		} else {
			// merge class attribute
			if(isset($this->_attributes['class']) && isset($attributes['class'])){
				$attributes['class'] = $this->_attributes['class'].' '.$attributes['class'];
			}
			// merge all attrbiutes
			$this->_attributes = array_merge($this->_attributes,$attributes);
			return $this;
		}
	}
	
	
	/**
	 * Form::element()
	 * get or create an element
	 * 
	 * @param string $key
	 * @param mixed $mixedTypeIndex FALSE/ int : get element, string: create element
	 * @param array $settings
	 * @return Form_Element
	 */
	public function element($key,$mixedTypeIndex = FALSE,$settings = array())
	{
		if($mixedTypeIndex===FALSE){
			/**
			 *  get element
			 */
			if(isset($this->_fields[$key])){
				if($this->_fields[$key]['group'] === TRUE){
					// return array(group)
					return $this->_fields[$key]['elements'];
				} else {
					// return first element (not group)
					return $this->_fields[$key]['elements'][0];	
				}
			} else {
				return FALSE;
			}
		} elseif(is_int($mixedTypeIndex)){
			
			/**
			 * get n'th element
			 */
 			if(isset($this->_fields[$key]) && isset($this->_fields[$key]['elements'][$mixedTypeIndex])){
				return $this->_fields[$key]['elements'][$mixedTypeIndex];
			} else {
				return FALSE;
			}
			 
		} else {
			
			/**
			 *  add element
			 */
			 
			// raise event
			Event::raise($this,Event::BEFORE_FORM_ELEMENT,array('form'=>$this,'key'=>$key,'type'=>$mixedTypeIndex,'settings'=>$settings));
			
			// create the element
			$element = new Form_Element($key,$mixedTypeIndex,$settings);
			
			// get field
			if(isset($this->_fields[$key])){
				// get existing field
				$field = $this->_fields[$key];
				// check if existing elementnames should be updated
				if($field['group'] === FALSE){
					$updateName = TRUE;
				} else {
					$updateName = FALSE;
				}
				// set group property to true
				$field['group'] = TRUE;
			} else {
				// create new field
				$field = array(
					'group'=>FALSE,
					'multiple'=>FALSE,
					'elements'=>array(),
					'rules'=>array(),
					'processors'=>array(),
					'default'=>NULL,
					'compound'=>FALSE,
					'keys'=>array(),
				);
				$updateName = FALSE;
			}
			
			// check & set compound
			if(isset($settings['compound']) && $settings['compound'] == TRUE){
				$field['compound'] = TRUE;
			}
				
			// check $ set compound keys
			if(isset($settings['keys'])){
				$field['keys'] = $settings['keys'];
			} 
			
			// check if a default was given & set default
			if(isset($settings['default'])){
				$field['default'] = $settings['default'];
			}

			// check if the group property is explicitly set 
			if(isset($settings['group']) && $settings['group'] == TRUE){
				$field['group'] = TRUE;
			}

			// check if it is multiple
			$field['multiple'] = $element->multiple();
			
			// create name
			$name = $key;
			
			if($field['group']===TRUE){
				$name.='[]';
			}
			
			if($field['multiple']===TRUE){
				$name.='[]';
			}
			
			// set name of this element
			$element->name($name);
			
			// update existing elements if necesary
			if($updateName === TRUE){
				$this->_fields[$key]['elements'][0]->name($name);
			}
			
			// store element
			$field['elements'][]=$element;
			
			// store field
			$this->_fields[$key] = $field;
			
			// store element in list
			$this->_elements[]=$element;
			
			// raise hook
			Event::raise($this,Event::AFTER_FORM_ELEMENT,array('form'=>$this,'element'=>$element));

			// return element
			return $element;
		}
	}
	
	
	
	/**
	 * Form::markup()
	 * add non functioning element to elements list
	 * used for markup in the view
	 * 
	 * @param string $type
	 * @param array $attributes
	 * @return
	 */
	public function markup($keyOrType,$typeOrSettings=array(),$settings = array())
	{
		// normalize
		if(is_array($typeOrSettings)){
			$key = FALSE;
			$type = $keyOrType;
			$settings = $typeOrSettings;
		} else{
			$key = $keyOrType;
			$type = $typeOrSettings;
		}
		
		// raise hook
		Event::raise($this,Event::BEFORE_FORM_MARKUP,array('form'=>$this,'key'=>$key,'type'=>$type,'settings'=>$settings));
			
		// create element
		$element = new stdClass();
		
		// store settings
		foreach($settings as $var => $val){
			$element->{$var}=$val;
		}

		// set default values
		$element->key = $key;
		$element->type = $type;
		$element->required = FALSE;
		$element->error = FALSE;
		$element->attributes = isset($settings['attributes'])?$settings['attributes']:array();
		$element->attributes['class'] = isset($element->attributes['class'])?$element->attributes['class']:'';
		
		// store element in list
		$this->_elements[]=$element;
		
		// rais hook	
		Event::raise($this,Event::AFTER_FORM_MARKUP,array('form'=>$this,'element'=>$element));
		
		// return it
		return $element;
	}
	

	/**
	 * Form::rule()
	 * add rule
	 * 
	 * @param mixed $key
	 * @param bool $rule
	 * @param mixed $params
	 * @return void
	 */
	public function rule($key, $rule, $params = NULL)
	{
		if(isset($this->_fields[$key])){
			$this->_fields[$key]['rules'][]=array(
				'rule'=>$rule,
				'params'=>$params
			);
		}
		// set required on the first element
		if($rule == 'not_empty'){
			$this->_fields[$key]['elements'][0]->required(TRUE);
		}
	}
	
	
	/**
	 * Form::processor()
	 * 
	 * @param string $key
	 * @param array $processor
	 * @param array $settings
	 * @return void
	 */
	public function processor($key, $processor, $settings = array())
	{
		if(isset($this->_fields[$key])){
			$this->_fields[$key]['processors'][]=array(
				'processor'=>$processor,
				'settings'=>$settings
			);
		}
	}
	
	
	/**
	 * check if the form is submitted
	 *
	 * @return boolean
	 */
	public function submitted()
	{
		$this->init();
		
		$submitted = FALSE;
		
		if(strtoupper($this->_method) == 'POST'){
			if(isset($_POST['form_'.$this->_id.'_submitted'])&&$_POST['form_'.$this->_id.'_submitted']=='1'){
				$submitted = TRUE;
			}
		} else {
			if(isset($_GET['form_'.$this->_id.'_submitted'])&&$_GET['form_'.$this->_id.'_submitted']=='1'){
				$submitted = TRUE;
			}
		}
		return $submitted;
	}
	
	
	/**
	 * Form::values()
	 * get or set values
	 * 
	 * @param bool $values
	 * @return
	 */
	public function values($values = FALSE, $nestedCompoundValues = FALSE)
	{
		$this->init();
	
		if($values === FALSE){
			
			/**
			 * get values
			 */
			$values = array();
			foreach($this->_fields as $key => $field){
				// get value
				$value = $this->value($key);
				
				// set compund keys as regular keys
				if($field['compound']===TRUE && $nestedCompoundValues == FALSE){
					foreach($value as $compoundKey=>$compoundValue){
				 		$values[$compoundKey] = $compoundValue;
					}
				} 
				
				$values[$key] = $value;
				
			}

			// return them
			return $values;
		} else {
			/**
			 * set values
			 */
		 	foreach($this->_fields as $key=>$field){
		 		
		 		// only set values if one was given
		 		$setValue = FALSE;
		 		if($field['compound']===TRUE && $nestedCompoundValues == FALSE){
					
		 			// if it is a compound key, create a assoc array as the value from the flat value
		 			$value = array();
		 			foreach($field['keys'] as $compoundKey){
		 				if(isset($values[$compoundKey])){
		 					// at least one compund key was set: set the value
		 					$setValue = TRUE;
		 					$value[$compoundKey] = $values[$compoundKey];
	 					}
	 				}
	 			} else {
	 				if(isset($values[$key])){
	 					// normal: get the value as value
	 					$setValue = TRUE;
	 					$value = $values[$key];
 					}
 				}
 				// set the value
 				if($setValue){
					// set the value
 					$this->value($key,$value);
				}
	 		}
		}
	}
	

	/**
	 * Form::value()
	 * get or set a value
	 * 
	 * @param mixed $key
	 * @param bool $value
	 * @return
	 */
	public function value($key, $value = FALSE)
	{
		$this->init();
		if($value===FALSE){
			/**
			 * get value
			 */
			if(isset($this->_fields[$key])  && $this->submitted() === TRUE){
				

				// get value from request
				if(strtoupper($this->_method) == 'POST'){
					$requestValues = $_POST;
				} else {
					$requestValues = $_GET;
				}

				// get raw value from request
				$value = isset($requestValues[$key]) ? $requestValues[$key] : NULL;
				
				// if it is NULL check for defaults
				if($this->_fields[$key]['compound'] === TRUE){
					// make sure a compound element is an array
					if($value === NULL){
						$value = array();
					}
					// check for compound defaults
					foreach($this->_fields[$key]['keys'] as $compoundKey){
						if(!isset($value[$compoundKey]) || $value[$compoundKey]===NULL){
							if(isset($this->_fields[$key]['default']) && isset($this->_fields[$key]['default'][$compoundKey])){
								// use a default value when there is one
								$value[$compoundKey] = $this->_fields[$key]['default'][$compoundKey];
							} else {
								// set to NULL if there is none
								$value[$compoundKey] = NULL;
							}	
						} 
					}
				} elseif($value === NULL && isset($this->_fields[$key]['default'])){
					// check for normal elements
					$value = $this->_fields[$key]['default'];
				}
				
				// parse it
				$value = $this->parse($value, $this->_fields[$key]['group'], $this->_fields[$key]['multiple']);
				
				//store it for later use
				$this->_values[$key] = $value;
				
				// set the value in the element also
				if($this->_fields[$key]['group'] === TRUE){
					// group elements
					for($i=0;$i<count($value); $i++){
						$this->_fields[$key]['elements'][$i]->value($value[$i]);
					}
				} else {
					// normal element
					$this->_fields[$key]['elements'][0]->value($value);
				}
				
				// call postprocessors on value
				foreach($this->_fields[$key]['processors'] as $processor){			
					if(is_callable($processor['processor'])){
						$params = array($value,$processor['settings']);
						$value = call_user_func_array($processor['processor'],$params);
					}
				}
				
				// return it
				return $value;
				
			} else {
				
				// not submitted or no valid field
				return NULL;
			}
		} else {
			/**
			* set value: only in elements!!
			*/
			if(isset($this->_fields[$key])){

				// parse the value
				$value = $this->parse($value, $this->_fields[$key]['group'], $this->_fields[$key]['multiple']);
				
				// set the value in the element
				if($this->_fields[$key]['group'] === TRUE){
					// group elements
					for($i=0;$i<count($value); $i++){
						$this->_fields[$key]['elements'][$i]->value($value[$i]);
					}
				} else {
					// normal element
					$this->_fields[$key]['elements'][0]->value($value);
				}
			}
		}
	}
	

	/**
	 * Form::valid()
	 * check if the form is
	 * - submitted
	 * - valid
	 * 
	 * then:
	 * - get errors
	 * - distribute errors over elements
	 * 
	 * @return boolean
	 */
	public function valid()
	{
		$this->init();
		
		// set valid to false
		$valid = FALSE;

		// check if submitted
		if($this->submitted()){

			// get parsed valeus
			$values = $this->values();
			
			/**
			 * collect values
			 */
			 // values to validate
			$validateValues = array();
			
			foreach($this->_fields as $key=>$field){
				// set the whole field value (group or not)
				// to test rules set on form
				$validateValues[$key]=$values[$key];
				
				// set element values separately, 
				// to test for rules set on element
				for($i=0; $i<count($field['elements']); $i++){
					$validateValues[$key.'__element__'.$i] = $field['elements'][$i]->value();
				}
			}
			
			/**
			 * create validator
			 */
			$validator = Kohana_Validation::factory($validateValues);
			
			/**
			 * collect rules
			 */
			foreach($this->_fields as $key=>$field){
				
				// add rules to the whole field, group or not
				foreach($field['rules'] as $rule){
					$validator->rule($key,$rule['rule'],$rule['params']);
				}
				
				// add element rules separately
				// for the separate values declared earlier
				for($i=0; $i<count($field['elements']); $i++){
					$rules = $field['elements'][$i]->rules();
					foreach($rules as $rule){
						$validator->rule($key.'__element__'.$i,$rule['rule'],$rule['params']);
					}
				}
			}

			/**
			 * validate
			 */
			$valid = $validator->check();
			
			/**
			 * distribute errors
			 */
			if($valid === FALSE){
				$errors = $validator->errors();
						
				foreach($errors as $key => $error){
					// key parts
					$explode = explode('__',$key);
					
					if(isset($explode[1]) &&  $explode[1] == 'element'){
						// if it is an error on an element only
						$this->_fields[$explode[0]]['elements'][$explode[2]]->error($error[0]);
					} else {
						// set field errors on the first element
						$this->_fields[$key]['elements'][0]->error($error[0]);
					}
				}
			}
		} 
		return $valid;	
	}
	
	
	
	

	/**
	 * Form::parse()
	 * Helper: ensures the correct type of arrays 
	 * 
	 * @param mixed $key
	 * @param bool $value
	 * @return
	 */
	protected function parse($value = FALSE, $group = FALSE , $multiple = FALSE, $compound = FALSE)
	{
		// create multiple values
		if($group === TRUE){
			// get group value
			$value = $this->force_array($value);
			// get multiple value
			if($multiple === TRUE){
				for($i=0; $i<count($value);$i++){
					$value[$i] = $this->force_array($value[$i]);
				}
			}
		} elseif($multiple === TRUE) {
			// get multiple value
			$value = $this->force_array($value);
		} 
		return $value;
	}
	

	/**
	 * Helper: ensure an array is created
	 * 
	 * @param mixed $value
	 * @return
	 */
	protected function force_array($value)
	{
		if($value === NULL){
			// empty array 
			return array();
		} elseif(!is_array($value) || Arr::is_assoc($value)){
			// value as only element in array
			$arrayValue = array();
			$arrayValue[]=$value;
			return $arrayValue;
		} else {
			// value is an array allready
			return $value;
		}
	}
	
	
	/**
	 * getter
	 *
	 * @param string $var
	 * @return mixed
	 */
	public function __get($var)
	{
		if(in_array($var,$this->_accessible)){
			return $this->{'_'.$var};
		} else {
			return FALSE;
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
			if($var=='atributes'){
				$this->attributes($val);
			} else {
				$this->{'_'.$var} = $val;
			}
		}
	}
	
	
	/**
	 * isset magic
	 * @param string $var
	 * @return boolean
	 */
	public function __isset($var)
	{
		if(in_array($var,$this->_accessible)){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
	
