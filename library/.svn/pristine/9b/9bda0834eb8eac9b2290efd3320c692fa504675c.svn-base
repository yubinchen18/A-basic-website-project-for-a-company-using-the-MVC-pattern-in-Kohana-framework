<?php

class Controller_Default_Link extends Controller_Item
{
	
	public function init()
	{	
		parent::init();

		// set website object for url creation
		call_user_func_array(
			array('Model_'.$this->_settings->get('model'),'website'),
			array(Website::instance())
		);
		
		// set alias object for url creation
		call_user_func_array(
			array('Model_'.$this->_settings->get('model'),'alias'),
			array(Alias::factory(Website::instance()->id()))
		);
		
		// set default route for url creation
		call_user_func_array(
			array('Model_'.$this->_settings->get('model'),'route'),
			array($this->_settings->get('route'))
		);
	}
	
	public function action_index(){}

	/**
	 * listeners
	 */ 
	protected function listeners()
	{
		parent::listeners();
		Event::listen($this,Event::AFTER_CREATE_FORM,array($this,'handle_link_after_form'));
		Event::listen($this,Event::AFTER_UPDATE_FORM,array($this,'handle_link_after_form'));
		
		Event::listen($this,Event::BEFORE_CREATE,array($this,'handle_link_before_update'));
		Event::listen($this,Event::BEFORE_UPDATE,array($this,'handle_link_before_update'));
	}
	
	
	/**
	 * add modules and requets from settings
	 * @param type $data
	 */
	public function handle_link_after_form($data)
	{
		$text = Text::instance();
		$modules = array();
		foreach($this->_settings->get('modules') as $module){
			$modules[$module] = $text->get($module.':module.name');
		}
		$requests = array();
		foreach($this->_settings->get('requests') as $request){
			$requests[$request] = $text->get('option.request.'.$request);
		}
		$data->form->modules($modules);
		$data->form->requests($requests);
	}
	
	
	/**
	 * Try to unwrap the params to an actual array
	 * Then in the model it will be serialized again
	 * @param type $data
	 */
	public function handle_link_before_update($data)
	{
		if(is_array(json_decode($data->model->params, TRUE))){
			$data->model->params = json_decode($data->model->params, TRUE);
		}
	}
}