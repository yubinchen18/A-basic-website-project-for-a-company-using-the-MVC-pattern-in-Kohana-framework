<?php
class Controller_Default_Menu extends Controller_Branch
{
	protected function listeners()
	{
		parent::listeners();
		Event::listen($this,Event::AFTER_CREATE_FORM,array($this,'handle_menu_after_form'));
		Event::listen($this,Event::AFTER_UPDATE_FORM,array($this,'handle_menu_after_form'));
	}
	
	
	/**
	 * add modules and requets from settings
	 * @param type $data
	 */
	public function handle_menu_after_form($data)
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
}