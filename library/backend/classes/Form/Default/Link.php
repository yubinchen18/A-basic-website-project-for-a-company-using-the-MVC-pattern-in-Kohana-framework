<?php
class Form_Default_Link extends Form_Base
{
	protected $_modules = array();
	protected $_requests = array();
	
	public function modules($modules)
	{
		$this->_modules = $modules;
	}
	
	public function requests($requests)
	{
		$this->_requests = $requests;
	}
	
	protected function build()
	{
		
		$this->btn_group('submit_back','back');
		
		$this->markup('column',array('attributes'=>array('class'=>'yf','data-use'=>'backend.form.group.Link')));
		
		$this->element('target','select',array('options'=>array('_self','_blank')));
		$this->element('type','select',array('options'=>array(Model_Link::TYPE_ITEM,Model_Link::TYPE_URL)));
	
		$this->markup('section',array('attributes'=>array('class'=>'yf-url')));
		$this->element('url','text');
		$this->markup('/section');
		
		$this->markup('section',array('attributes'=>array('class'=>'yf-item')));
		$this->item('item',$this->_modules,$this->_requests);
		
		$this->markup('/section');
		$this->markup('/column');
		
		$this->rule('item',array($this,'item_valid'),array(':validation'));
	}
	
	public function item_valid($validation)
	{
		if($this->value('type') == Model_Menu::TYPE_ITEM){
			$value = $this->value('item');
			$item_id = $value['item_id'];
			$request = $value['request'];
			if($item_id == '0' && $request == ''){
				$validation->error('item','valid');
			}
		}
	}
}