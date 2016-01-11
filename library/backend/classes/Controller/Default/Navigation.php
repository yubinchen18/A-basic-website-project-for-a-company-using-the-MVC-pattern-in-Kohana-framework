<?php
class Controller_Default_Navigation extends Controller
{
	/**
	 * create the top navigation
	 */
	public function action_top()
	{		
		// get acl
		$acl = Acl::instance();
		
		// get websites
		$websites = array();
		foreach(Kohana::$config->load('websites')->websites as $key => $website){
			if($acl->allowed('Environment','access',FALSE,$key)){
				$websites[$key]=$website;
			}
		}

		// get modules		
		$modules = Settings::factory('modules')->as_array();

		// get settings
		$settings = Settings::factory('navigation',array(
			'settings'.DIRECTORY_SEPARATOR.Website::instance()->id().DIRECTORY_SEPARATOR,
			'settings',
		));
		
		// get navigation
		$navigation = $settings->get('menu');

		// get current controller
		$controller = Request::initial()->controller();
				
		// filter out allowed modules
		$allowedModules = array();
		foreach($modules as $module=>$data){
			if($acl->allowed($module,'access')){
				$allowedModules[$module]=TRUE;
			}
		}

		// create a nested array with sections => modules
		// catch active section
		$sections = array();
		$sectionActive = FALSE;
		foreach($navigation as $section=>$modules){
			foreach($modules as $module){
				if(isset($allowedModules[$module])){
					// section has a allowed module, so include it
					if(!isset($sections[$section])){
						$sections[$section] = array();
					}
					// add module to section
					$sections[$section][]=$module;
					
					// check if this is the active section
					if($module === $controller){
						$sectionActive = $section;
					}
				}
			}
		}
		// store active section
		if($sectionActive){
			// get current website
			State::instance()->set('active.section',$sectionActive);
		}

		// check if frontendlink should be shown
		if($settings->get('frontend')){
			$frontend = URL::to('',array('website'=>Website::instance()->id(),'query'=>'edit=1'),'frontend',Website::instance());
		} else {
			$frontend = FALSE;
		}
		
		// create view
		$view = View::factory('navigation/top',array(
			'acl'=>$acl,
			'websites'=>$websites,
			'sections'=>$sections,
			'active'=>$sectionActive,
			'website'=>Website::instance()->id(),
			'frontend'=>$frontend,
		));
		
		// render view
		$this->response->body($view->render());
	}
	
	
	/**
	 * Get module navigation
	 */
	public function action_module()
	{
		// get request
		$request = Request::initial();
		
		// get settings
		$settings = Settings::factory($request->controller());
		
		// navigation viewer
		$navigation = Viewer::instance('Navigation')
		->settings($settings->get('navigation'))
		->request(Request::initial())
		->acl(Acl::instance());

		// create view
		$view = View::factory($settings->get('view.navigation'),array('navigation'=>$navigation));

		// raise event
		Event::raise($this,Event::BEFORE_NAVIGATION_RENDER,array('navigation'=>$navigation));
		
		// render view
		$this->response->body($view->render());
	}
}