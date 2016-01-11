<?php
class Form_Default_User extends Form_Base
{
	protected function build()
	{
		$this->btn_group('submit','submit_back','back');
		

		$this->element('username','text');
		$this->element('email','text');
		$this->markup('section');
		$this->element('password','password');
		$this->element('password_confirm','password');

		//rules
		$this->rule('username','not_empty');
		//$this->rule('username','alpha_numeric');
		$this->rule('username','min_length',array(':value',4));
		$this->rule('username',array($this->_model,'username_unique'),array(':value'));
		
		$this->rule('email','not_empty');
		$this->rule('email','email');
		$this->rule('email',array($this->_model,'email_unique'),array(':value'));

		if($this->_request->action() == 'create'){
			$this->rule('password','not_empty');
		}
		
		$this->rule('password','min_length',array(':value',5));
		$this->rule('password_confirm','matches',array($this->values(), 'password_confirm', 'password'));
	}
}