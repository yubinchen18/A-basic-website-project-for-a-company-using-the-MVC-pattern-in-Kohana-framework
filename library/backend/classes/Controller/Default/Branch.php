<?php

class Controller_Default_Branch extends Controller_Item
{
	
	protected function listeners()
	{
		Event::listen($this,Event::AFTER_CREATE_FORM,array($this,'handle_branch_after_create_form'));
		Event::listen($this,Event::AFTER_UPDATE_FORM,array($this,'handle_branch_after_update_form'));
		Event::listen($this,Event::BEFORE_CREATE_FORM_PARSE,array($this,'handle_branch_before_create_form_parse'));
		parent::listeners();
	}
	
	
	/**
	* Overwrite delete
	 * dont check on owner id, as the entire tree will be gone
	 * deleted is an array with items
	 */
	protected function delete($model)
	{
		// check rights
		if(!Acl::instance()->allowed($this->_controller,'delete',$model->owner_id,$model->website_id)){
			throw HTTP_Exception::factory(403,'Delete not allowed on :controller :id',array(
				':controller'=>$this->_controller,
				':id'=>$model->id,
			));
		}
		// call hook
		Event::raise($this,Event::BEFORE_DELETE,array('model'=>$model));
		//delete
		$deleted = $model->delete();
		// call hook
		Event::raise($this,Event::AFTER_DELETE,array('deleted'=>$deleted));
	}
	
	
	
	/**
	 * inject tree into form
	 * @param type $data
	 */
	public function handle_branch_after_create_form($data)
	{
		// create model
		$tree = ORM::factory($this->_settings->get('model'))
			->sortable($this->_settings->get('list.sortable'))
			->filter('website_id',$this->_website)
			->branch()
			->items();
		
		// add it to the form
		$data->form->tree($tree);
	}
	
	
	/**
	 * preset a given id as parent id (used for create node in...)
	 */
	public function handle_branch_before_create_form_parse($data)
	{
		$id = $this->request->param('id',FALSE);
		if($id){
			$data->form->value('parent_id',$id);
		}
	}
	
	
	/**
	 * inject tree into form and cut item itself
	 * @param type $data
	 */
	public function handle_branch_after_update_form($data)
	{
		// create model
		$tree = ORM::factory($this->_settings->get('model'))
			->sortable($this->_settings->get('list.sortable'))
			->filter('website_id',$this->_website)
			->branch()
			->cut($data->model->id)
			->items();
		
		// add it to the form
		$data->form->tree($tree);
	}


	/**
	 * overwrite after delete handler to go though multiple deleted items
	 * @param type $data
	 */
	public function handle_item_after_delete($data)
	{
		foreach($data->deleted as $model){
			// delete collections
			$this->delete_collections($model);
			// delete alias
			$this->delete_alias($model);
			// delete version
			if($this->_settings->get('version')== TRUE){
				Version::factory($model)->delete();
			}
		}
	}
}