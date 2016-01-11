<?php
class Form_Default_Menu extends Form_Branch
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
		$this->btn_group('submit','submit_back','back');
		
		$this->markup('column',array('attributes'=>array('class'=>'yf','data-use'=>'backend.form.Menu')));
		$this->markup('section');
		$this->select_branch();
		$this->element('type','select',array('options'=>array(Model_Menu::TYPE_NONE,Model_Menu::TYPE_LINK,Model_Menu::TYPE_CONTROLLER,Model_Menu::TYPE_ITEM)));
		$this->markup('/section');
		
		$this->markup('section',array('attributes'=>array('class'=>'yf-title')));				
		$this->element('title','text');
		$this->markup('/section');

		$this->markup('section',array('attributes'=>array('class'=>'yf-link')));				
		$this->element('link_id','link',array('default'=>0));
		$this->markup('/section');
		
		$this->markup('section',array('attributes'=>array('class'=>'yf-controller')));
		$this->element('controller','select',array('options'=>$this->_modules));
		$this->markup('/section');
		
		$this->markup('section',array('attributes'=>array('class'=>'yf-item')));
		$this->item('item',$this->_modules,$this->_requests);
		$this->markup('/section');
		

		$this->rule('title',array($this,'title_not_empty'),array(':validation'));
		$this->rule('link_id',array($this,'link_valid'),array(':validation'));
		$this->rule('controller',array($this,'controller_valid'),array(':validation'));
		$this->rule('item',array($this,'item_valid'),array(':validation'));
	}
	

	public function title_not_empty($validation)
	{
		if($this->value('type') != Model_Menu::TYPE_ITEM){
			if($this->value('title')==NULL || $this->value('title')==''){
				$validation->error('title','not_empty');
			}
		}
	}
	
	
	public function link_valid($validation)
	{
		if($this->value('type') == Model_Menu::TYPE_LINK){
			if($this->value('link_id') == '0'){
				$validation->error('link_id','valid');
			}
		}
	}
	
	
	public function controller_valid($validation)
	{
		if($this->value('type') == Model_Menu::TYPE_CONTROLLER ){
			if($this->value('controller') == NULL || $this->value('controller') == ''){
				$validation->error('controller','valid');
			}
		}
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