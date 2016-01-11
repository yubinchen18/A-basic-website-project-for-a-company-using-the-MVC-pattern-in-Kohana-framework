<?php
class Breadcrumbs
{
	protected static $_instance = FALSE;
	
	public static function instance()
	{
		if(self::$_instance === FALSE){
			self::$_instance = new Breadcrumbs();
		}
		return self::$_instance;
	}
	
	
	protected $_data = array();
	
	protected function __construct(){}
	
	public function add($href=FALSE,$label='',$attributes = array())
	{
		$this->_data[]=(object)array(
			'href'=>$href,
			'label'=>$label,
			'attributes'=>$attributes
		);
	}
	
	
	public function items($omit_last_link = TRUE)
	{
		$items = $this->_data;
		if($omit_last_link === TRUE){
			$item = $items[count($items)-1];
			$item->href = FALSE;
			$items[count($items)-1] = $item;
		}
		return $items;
	}
}
