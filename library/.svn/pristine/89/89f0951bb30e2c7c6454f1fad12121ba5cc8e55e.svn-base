<?php
class Form_Default_Item extends Form_Base
{
	protected function build()
	{
		$this->group_submit();
		
		$this->select_branch();
		
		$this->element('title','text');
		$this->element('alias','alias',array('source'=>'title','multiple'=>$this->_alias=='multiple'));
		
		$this->rule('alias','not_empty');
		$this->rule('title','not_empty');
	}
}