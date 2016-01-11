<?php
class Form_Default_Settings extends Form_Base
{
	protected $_user = NULL;
	
	public function user($user)
	{
		$this->_user = $user;
	}
	
	protected function build()
	{
		$this->btn_group('submit','back');
		$this->element('email','text');
		$this->element('password','password');
		$this->element('password_confirm','password');
		$this->element('language','select',array('options'=>array('nl','en')));
		
		$this->rule('email',array($this->_user,'email_unique'));
		$this->rule('password','min_length',array(':value',6));
		$this->rule('password_confirm','matches',array($this->values(),'password_confirm','password'));
	}
}
