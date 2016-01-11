<?php

/**
 * a widget is an entity that:
 * 
 * has a view that can be modified by the user (from db)
 * has optinal stand-alone business logic
 *
 * on init it runs the business logic and fills _data with output results
 * 
 */
class Widget
{
	protected $_data = array();
	
	
	/**
	 * factory for text objects
	 *
	 * @param string $text
	 * @return Text
	 */
	public static function factory($widget)
	{
		// Set class name
		$class = 'Widget_'.ucfirst($widget);
		// create widget
		$widget = new $class();
		// call init
		$widget->init();
		// return an instance
		return $widget;
	}
	
	

	protected function init()
	{
		// business logic
		
		// output to _data
	}
	
	
	
	public function execute()
	{
		// business logic
		
		// output to _data
		
		return $this;
	}
	
	
	/**
	 * Widget::data()
	 * get ot set data
	 * 
	 * @param bool $var
	 * @param bool $val
	 * @return
	 */
	public function data($var=FALSE,$val=FALSE)
	{
		if($var===FALSE){
			//get data
			return $this->_data;
		} else {
			// set data
			$this->_data[$var] = $val;
		}
	}
}