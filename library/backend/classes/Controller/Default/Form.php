<?php

class Controller_Default_Form extends Controller_Item
{
	
	protected function listeners()
	{
		Event::listen($this,Event::AFTER_CREATE_FORM,array($this,'handle_form_after_form'));
		Event::listen($this,Event::AFTER_UPDATE_FORM,array($this,'handle_form_after_form'));
		parent::listeners();
	}
	
	
	public function handle_form_after_form($data)
	{
		$data->form->domain($this->_settings->get('domain'));
	}
}