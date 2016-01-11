<?php
class Event
{
	const BEFORE_INIT = 'before_init';
	const AFTER_INIT = 'after_init';
	
	const BEFORE_LIST = 'before_list';
	const AFTER_LIST = 'after_list';
	const BEFORE_LIST_RENDER = 'before_list_render';
	
	const AFTER_CREATE_FORM = 'after_create_form';
	const BEFORE_CREATE_FORM_PARSE = 'before_create_form_parse';
	const BEFORE_CREATE = 'before_create';
	const AFTER_CREATE = 'after_create';
	const BEFORE_CREATE_RENDER = 'before_create_render';
	
	const AFTER_UPDATE_FORM = 'after_update_form';
	const BEFORE_UPDATE_FORM_PARSE = 'before_update_form_parse';
	const BEFORE_UPDATE_VALUES = 'before_update_values';
	const BEFORE_UPDATE = 'before_update';
	const AFTER_UPDATE = 'after_update';
	const BEFORE_UPDATE_RENDER = 'before_update_render';
	
	const AFTER_STORE_FORM = 'after_store_form';
	const BEFORE_STORE_FORM_PARSE = 'before_store_form_parse';
	const BEFORE_STORE = 'before_store';
	const AFTER_STORE = 'after_store';
	const BEFORE_STORE_RENDER = 'before_store_render';
	
	const BEFORE_DELETE = 'before_delete';
	const AFTER_DELETE = 'after_delete';
	
	const BEFORE_COPY = 'before_copy';
	const AFTER_COPY = 'after_copy';
	
	const BEFORE_STATUS = 'before_status';
	const AFTER_STATUS = 'after_status';
	
	const BEFORE_NAVIGATION_RENDER = 'before_navigation_render';

	const BEFORE_UPLOAD = 'before_upload';
	const AFTER_UPLOAD = 'after_upload';
	const BEFORE_UPLOAD_RENDER = 'before_upload_render';

	const BEFORE_FORM_INIT = 'before_form_init';
	const AFTER_FORM_INIT = 'after_form_init';
	const BEFORE_FORM_ELEMENT = 'before_form_element';
	const AFTER_FORM_ELEMENT = 'after_form_element';
	const BEFORE_FORM_MARKUP = 'before_form_markup';
	const AFTER_FORM_MARKUP = 'after_form_markup';
	
	protected static $_listeners = array();
	
	
	
	/**
	 * add a listener
	 *
	 * @param mixed $raiser String classname or Object class istance
	 * @param string $event
	 * @param mixed $callback string: function, array(object,method), array(class,method), function
	 * @param booleans $priority listener is placed at the top of the stack instead of at the bottom
	 */
 	public static function listen($raiser,$event,$callback,$priority=FALSE)
	{
		if(is_object($raiser)){
			$raiser = get_class($raiser);
		} 
		
		if(!isset(self::$_listeners[$raiser])){
			self::$_listeners[$raiser] = array();
		}
		
		if(!isset(self::$_listeners[$raiser][$event])){
			self::$_listeners[$raiser][$event] = array();
		}
		
		if($priority){
			array_unshift(self::$_listeners[$raiser][$event],$callback);
		} else {
			self::$_listeners[$raiser][$event][]=$callback;
		}
	}
	
	
	/**
	 * raise an event and call a handler
	 *
	 * @param string $event
	 */
	public static function raise($raiserObject,$event,$data=array())
	{
		// get raiser
		if(is_object($raiserObject)){
			$raiser = get_class($raiserObject);
		} elseif(is_string($raiserObject)){
			$raiser = $raiserObject;
		} else {
			$raiser ='no_object';
		}

		$data = (object) $data;
		$data->raiser = $raiserObject;
		$data->event = $event;
		
		// check if there is a listener for this raiser/event
		if(isset(self::$_listeners[$raiser]) && isset(self::$_listeners[$raiser][$event])){
			// loop through registered listeners and call them all
			foreach(self::$_listeners[$raiser][$event] as $callback){
				if(is_callable($callback)){
					$cancel = call_user_func_array($callback,array($data));
					if($cancel === FALSE){
						// cancel event
						break;
					}
				}
			}
		}
	}
}