<?php
class Controller_Default_Content extends Controller_Item
{

		
	protected function listeners()
	{
		parent::listeners();
		Event::listen($this,Event::BEFORE_LIST,array($this,'handle_content_before_list'));
		Event::listen($this,Event::BEFORE_LIST_RENDER,array($this,'handle_content_before_list_render'));
		Event::listen($this,Event::BEFORE_CREATE,array($this,'handle_content_before_create'));
	}
	
	
	/**
	 * Check if list action should be fowarded to create action
	 */
	public function action_list()
	{
		// get type
		$type = $this->argument('type','__none__');

		// check if this type is listable
		if($type !== '__none__' && !in_array($type,$this->_settings->get('list.list'))){
			// if not listable: go to create with this type as viewport item
			$this->redirect(URL::to($this->_controller.'@create:'.$type,array('viewport'=>'item')));
			exit;
		} else {
			// go ahead
			parent::action_list();
		}
	}
	
	
	/**
	 * Change filters when requesting a certain type
	 * @param type $data
	 */
	public function handle_content_before_list($data)
	{
		// get type
		$type = $this->argument('type',FALSE);
		
		if($type !== FALSE){
			// remove all filters from model
			$filters = $this->_state->get('filter');
			foreach($filters as $filter => $settings){
				$data->model->remove_filter($filter);
			}
			// remove all filters from state
			$this->_state->set('filter',array());
			
			// filter on type instead
			$data->model->filter('type',$type);
		} else {
			// add filters for listable items
			$list = $this->_settings->get('list.list');
			$data->model->in('type',$list);
		}
	}
	
	
	/**
	 * Change filter options and button options when requesting a certain type
	 * @param type $data
	 */
	public function handle_content_before_list_render($data)
	{
		// get type
		$type = $this->argument('type',FALSE);
		
		if($type !== FALSE){
			// remove all filter options from viewer
			$settings = $data->viewer->settings();
			$settings['filter'] = array();
			
			// remove all new options from viewer, except this type
			$settings['create'] = array($type);
			
			$data->viewer->settings($settings);
		}
	}
	
	
	/**
	 * Set type when adjusting
	 * @param type $data
	 */
	public function handle_content_before_create($data)
	{
		// set it in the model
		$data->model->type = $this->request->param('id','');
	}
}