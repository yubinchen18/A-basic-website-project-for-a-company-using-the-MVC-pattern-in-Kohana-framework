<?php
class Form_Default_Form extends Form_Base
{
	protected $_domain;
	
	public function domain($domain)
	{
		$this->_domain = $domain;
	}
	
	protected function build()
	{
		$this->attributes = array(
			'class'=>'yf',
			'data-use'=>'backend.form.group.Form',
			'data-template'=>'form-element,form-option,form-rule,form-email,form-email-option-manual',
			'data-element_prefix'=>$this->_text->get('label.element_prefix',array(),FALSE),
			'data-email_prefix'=>$this->_text->get('label.email_prefix',array(),FALSE),
			'data-email_alert'=>$this->_text->get('message.email_alert')
		);
		
		$this->btn_group('submit','submit_back','back','preview');
									
		$this->markup('tab.elements','tab');
		$this->element('title','text');
		$this->element('elements','form/elements',array(
			'element_types'=>array(
				'input',
				'input_small',
				'textarea',
				'checkbox',
				'select',
				'confirm',
				'email',
			),
			'rule_types'=>array('not_empty','email','not_is')
		));
		$this->element('button','text');
		

		$this->markup('tab.emails','tab');
		$this->element('emails','form/emails',array(
			'from_domain'=>$this->_domain
		));
		
		
		$this->markup('tab.text','tab');
		$this->element('after','tinymce');

	}
}