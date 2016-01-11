<?php
class Form_Default_Embed extends Form_Base
{
	protected $_controller;
	protected $_sizes;
	
	public function controller($controller)
	{
		$this->_controller = $controller;
	}
	
	public function sizes($sizes)
	{
		$this->_sizes = $sizes;
	}
	
	protected function build()
	{
		$this->btn_group('submit','submit_back','submit');
		
		$this->element('id','collection',array('view'=>'image','controller'=>$this->_controller,'max'=>1));
		
		if(count($this->_sizes)>1){
			$this->element('size','select',array('options'=>$this->_sizes));
		} else {
			$this->element('size','hidden');
			$this->value('size',$this->_sizes[0]);
		}
		
		$this->rule('id',array($this,'image_valid'),array(':validation'));
	}
	
	
	public function image_valid($validation)
	{
		if($this->value('id') == '0'){
			$validation->error('id','valid');
		}
	}
}