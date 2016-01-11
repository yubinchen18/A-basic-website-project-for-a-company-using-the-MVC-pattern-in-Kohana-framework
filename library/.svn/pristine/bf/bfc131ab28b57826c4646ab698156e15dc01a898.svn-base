<?php
class Form_Default_Roles extends Form_Base
{
	protected $_roles = array();
	
	
	public function roles($roles)
	{
		$this->_roles = $roles;
	}
	
	protected function build()
	{
		$this->btn_group('submit_back','back');
		$this->element('roles','checkbox',array('options'=>$this->_roles));
	}
}
