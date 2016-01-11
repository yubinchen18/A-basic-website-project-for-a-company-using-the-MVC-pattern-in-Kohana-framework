<?php
class Controller_Default_Start extends Controller_Module
{
	public function action_index()
	{
		// get acl
		$acl = Acl::instance();
		
		// get modules		
		$modules = Settings::factory('modules')->as_array();

		// get navigation
		$settings = Settings::factory('navigation',array(
			'settings'.DIRECTORY_SEPARATOR.Website::instance()->id().DIRECTORY_SEPARATOR,
			'settings',
		));
		$navigation = $settings->get('menu');
		
		// filter out allowed modules
		$allowedModules = array();
		foreach($modules as $module=>$data){
			if($acl->allowed($module,'access')){
				$allowedModules[$module]=$data;
			}
		}
		
		// fill up sections
		$sections = array();
		foreach($navigation as $section=>$modules){
			foreach($modules as $module){
				if(isset($allowedModules[$module])){
					// section has a allowed module, so include it
					if(!isset($sections[$section])){
						$sections[$section] = array();
					}
					// add module to section
					$sections[$section][$module]=$allowedModules[$module];
				}
			}
		}

		$view = View::factory('start',array('sections'=>$sections));
		
		
		$this->response->body($view->render());
	}
}