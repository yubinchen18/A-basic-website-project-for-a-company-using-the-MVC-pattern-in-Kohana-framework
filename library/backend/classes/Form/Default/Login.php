<?php
class Form_Default_Login extends Form_Base
{
	protected function build()
	{
		$this->attributes(array(
			'class'=>'yf',
			'data-use'=>'backend.form.Login'
		));
		
		$this->element('username','text');
		$this->element('password','password');
		$this->btn_submit('login');

		
		// add rules
		$this->rule('username','not_empty');
		$this->rule('password','not_empty');
	}
}