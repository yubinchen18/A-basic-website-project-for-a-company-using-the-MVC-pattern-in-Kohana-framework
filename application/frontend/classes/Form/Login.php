<?php
class Form_Login extends Form
{
	public function build()
	{

		$this->element('name','text');
		$this->element('company','text');
		$this->element('email','text');
		$this->element('telephone','text');
		
		$this->element('response','radio', array('options'=>array('call_back','more_info', 'send_offer', 'answer')));
		$this->element('question','textarea');

		//submit
		$settings = array('attributes'=>array('class'=>'button'));
		$this->element('send','submit', $settings);

	}
}