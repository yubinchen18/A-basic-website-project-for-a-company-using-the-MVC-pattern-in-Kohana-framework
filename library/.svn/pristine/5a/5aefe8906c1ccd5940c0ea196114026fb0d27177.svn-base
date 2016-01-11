<?php
class Controller_Default_Base extends Controller
{	

	/**
	 * before handler
	 */ 
	public function before()
	{
		$this->init();
	}
	

	/**
	 * init
	 */
	public function init()
	{
		// raise event
		Event::raise($this,Event::BEFORE_INIT);
		
		// get website and feed it the current uri so we can figure out the ->id()
		$website = Website::instance()->uri(Request::initial()->uri());
		// set controller vars
		$this->_website = $website->id();
		$this->_directory = Request::current()->directory();
		$this->_controller = Request::current()->controller();
		$this->_action = Request::current()->action();
		$this->_language = isset(Identity::instance()->user) ? Identity::instance()->user->language : 'nl';
		
		// manually set website in Website
		// this will be used by alias
		Website::instance()->id($this->_website);
		
		// set state session
		// get state instance for this website / controller
		State::session(Session::instance('database'));
		$this->_state = State::instance($this->_website.'.'.$this->_controller);
		
		// set route in URL helper
		URL::route('backend');
		
		// Let Filereader cache results
		Reader::cache(Cache::instance('reader_backend'),'backend');
		
		// set default language
		Text::language($this->_language);
		
		// get that language's text instance and configure it
		Text::instance($this->_language)
		// load all the text files
		->load(array_keys(Settings::factory('modules')->as_array()))
		// set the current group
		->group($this->_controller)
		// set the current set of substitutes
		->substitutes('module');
		
		// set URL presets
		$base = URL::base();
		URL::set('base', $base);
		URL::set('library', $base.'library/');
		URL::set('vendor', $base.'vendor/');
		URL::set('files', $base.'files/');
		
		// set website in view
		View::set_global('_website',$this->_website);
		// set language in view
		View::set_global('_language',$this->_language);
	}
	
	
	/**
	 * after handler
	 */ 
	public function after()
	{
		// store active module in State
		State::instance()->set('active.module',$this->_controller);
	}		
}