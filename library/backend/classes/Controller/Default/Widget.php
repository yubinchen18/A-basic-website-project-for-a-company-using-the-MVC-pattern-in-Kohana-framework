<?php
class Controller_Default_Widget extends Controller_Item
{

	protected function listeners()
	{
		parent::listeners();
		Event::listen($this,Event::BEFORE_UPDATE_FORM_PARSE,array($this,'handle_widget_before_form_parse'));
		
		Event::listen($this,Event::BEFORE_CREATE,array($this,'handle_widget_before_update'));
		Event::listen($this,Event::BEFORE_UPDATE,array($this,'handle_widget_before_update'));
	}
	
	
	
	public function handle_widget_before_form_parse($data)
	{
		$value = $data->form->element('template')->value;
		$value = str_replace('</textarea>','&lt;/textarea&gt;',$value);
		$data->form->element('template')->value($value);
	}
	
	
	public function handle_widget_before_update($data)
	{
		$value = $data->model->template;
		$value = str_replace('&lt;/textarea&gt;','</textarea>',$value);
		$data->model->template = $value;
		
		// compile
		$data->model->compile();
		
	}
}