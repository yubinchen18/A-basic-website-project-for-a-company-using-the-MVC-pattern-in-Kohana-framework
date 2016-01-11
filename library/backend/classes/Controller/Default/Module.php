<?php

class Controller_Default_Module extends Controller_Auth 
{	
	
	// settings
	protected $_settings = FALSE;
	

	/**
	 * INIT
	 */
	public function init()
	{
		// call parent before
		parent::init();
		
		//create settings
		//read from website specific settings before general settings
		$this->_settings = Settings::factory($this->_controller,array(
			'settings'.DIRECTORY_SEPARATOR.$this->_website.DIRECTORY_SEPARATOR,
			'settings',
		));

		// set up listeners
		$this->listeners();
		
		// set up navigation
		if(Request::current()->is_initial() === TRUE){
			$navigation = Viewer::instance('Navigation');
			$navigation->breadcrumb(Text::instance()->get('section.start'),URL::to('Start'));
			$navigation->breadcrumb(Text::instance()->get('module.name'),URL::to($this->_controller));
			$navigation->title(Text::instance()->get('title.'.$this->_action));
		}
	}
	
	
	/**
	 * overwrite in extensions
	 */
	protected function listeners(){}

	
	
	//-------------------------------
	// ACTIONS
	//-------------------------------
	public function action_index()
	{	
		$this->action_list();
	}
	


	//-------------------------------
	// HELPERS
	//-------------------------------
	

	/**
	 * get param from request or session
	 * used to easily get params and store them 
	 * 
	 * $sourceOrValueOrRetain
	 * 'request' or null :get param from request ans store it in session
	 * true : get value from session and leave it there
	 * int/string : get value from session and replace it with given value
	 *
	 * @param string $name
	 * @param mixed $valueOrGetFromRequest
	 * @param boolean $storeValue
	 * @return int
	 */
	protected function param($name,$valueOrGetFromRequest = TRUE, $storeValue = TRUE)
	{
		// create key for param
		$key = 'active.'.$name;
		
		if($valueOrGetFromRequest === TRUE){
			// get value from get
			$value = Request::current()->param($name,FALSE);
			// store it
			if($storeValue === TRUE){
				$this->_state->set($key,$value);
			}
			// return it
			return $value;
		} elseif($valueOrGetFromRequest === FALSE) {
			// get id from active, leave it there
			$value = $this->_state->get($key);
			//return it
			return $value;
		} else {
			// get value from session
			$value = $this->_state->get($key);
			// set value to value
			$this->_state->set($key,$valueOrGetFromRequest);
			//return it
			return $value;
		}
	}
	
	
	
	/**
	 * Get arguments from the qs
	 * Qs form is argument=val;arrargument[]=val,val,val
	 * @param string $key
	 * @param mixed $default
	 * @return type
	 */
	protected function argument($key = FALSE, $default = NULL)
	{
		$string = $this->request->param('arguments',FALSE);
		if($string === FALSE || $string === ''){
			return $default;
		}
		
		$array = explode(';',$string);
		$arguments = array();
		foreach($array as $argument){
			$pair = explode('=',$argument);
			$var = $pair[0];
			$val = $pair[1];
			if(substr($var,-2) === '[]'){
				$var = substr($var,0,-2);
				$val = explode(',',$val);
			}
			$arguments[$var] = $val;
		}
		
		if($key !== FALSE){
			if(isset($arguments[$key])){
				return $arguments[$key];
			} else {
				return $default;
			}
		} else {
			return $arguments;
		}
	}
	
	
	
	
	/**
	 * Set an error message
	 * @param type $messageId
	 */
	protected function error_message($messageId=FALSE)
	{
		// leave a message
		if($messageId){
			$message = array(
				'status'=>'error',
				'message'=>Text::instance()->get('message.'.$messageId)
			);
			Session::instance('database')->set('message',$message);
		}
	}

	
	/**
	 * redirect to list
	 *
	 * @param string $messageId
	 * @param array $params 
	 */
	protected function redirect_done($messageId=FALSE,$params=array())
	{
		// leave a message
		if($messageId){
			$message = array(
				'status'=>'success',
				'message'=>Text::instance()->get('message.'.$messageId)
			);
			Session::instance('database')->set('message',$message);
		}
		
		// default controller
		if(!isset($params['website'])){
			$params['website'] = $this->_website;
		}
		
		// default controller
		if(!isset($params['controller'])){
			$params['controller'] = $this->_controller;
		}
			
		// default action
		if(!isset($params['action'])){
			$params['action'] = 'index';
		}

		// redirect
		$this->redirect(URL::to($params));
	}
}