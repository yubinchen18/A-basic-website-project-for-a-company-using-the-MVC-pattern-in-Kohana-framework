<?php
class Controller_Default_Group extends Controller_Branch
{
	protected function listeners()
	{
		Event::listen($this,Event::BEFORE_LIST,array($this,'handle_group_before_list'));
		Event::listen($this,Event::BEFORE_CREATE,array($this,'handle_group_before_create'));
		Event::listen($this,Event::AFTER_DELETE,array($this,'handle_group_after_delete'));
		parent::listeners();
	}
	
	public function handle_group_before_list($data)
	{
		$module = $this->argument('module');
		$data->model->filter('module_id',$module);
	}
	
	public function handle_group_before_create($data)
	{
		$module = $this->argument('module');
		$data->model->module_id = $module;
	}
	
	public function handle_group_after_delete($data)
	{
		// get module name
		$module = $this->argument('module');
		// create a group object
		$group = ORM::factory('Group');
		// creat a model
		$model = ORM::factory($module);
		// set all the items to group 0 where it was in deleted group
		foreach($data->deleted as $deleted){
			// ungroup the items from this group
			$group->ungroup($deleted->id, $model);
		}
	}
}