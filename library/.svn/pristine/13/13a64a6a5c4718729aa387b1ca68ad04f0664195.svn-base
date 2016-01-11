<?php
class Controller_Default_Default extends Controller_Module
{	

	/**
	 * first determine website, then go on to index
	 */ 
	public function action_redirect_website()
	{
		// get acl
		$acl = Acl::instance();
		
		// get first allowed website
		$websites = Kohana::$config->load('websites.websites');
		$websites = array_keys($websites);
		$website = FALSE;
		foreach($websites as $website){
			if($acl->allowed('Environment','access',FALSE,$website)){
				break;
			}
		}
		// set website
		$this->_website = $website;
		
		// go to index
		$this->action_index();
	}
	
	
	
	
	/**
	 * Default action in default controller
	 */ 
	public function action_index()
	{

		// get acl
		$acl = Acl::instance();
		
		// get first allowed module
		// get modules
		$modules = Settings::factory('modules')->as_array();
		$modules = array_keys($modules);

		$module = State::instance()->get('active.module');

		if($module !== FALSE && $module!=='Default'){
			if($acl->allowed($module,'access',FALSE,$this->_website) === TRUE){
				$url = URL::to($module,array('website'=>$this->_website));
				$this->redirect($url);
				exit();
			}
		}
		
		// find the first allowed module & redirect
		foreach($modules as $module){
			if($acl->allowed($module,'access',FALSE,$this->_website) === TRUE){
				$url = URL::to($module,array('website'=>$this->_website));
				$this->redirect($url);
				exit();
			}
		}
	}
}