<?php

class Controller_Default_Item extends Controller_Module
{
	
	/**
	 * Define listeners
	 */
	protected function listeners()
	{
		parent::listeners();
		Event::listen($this,Event::BEFORE_CREATE,array($this,'handle_item_before_create'));
		Event::listen($this,Event::BEFORE_UPDATE_FORM_PARSE,array($this,'handle_item_before_update_form_parse'));
		Event::listen($this,Event::BEFORE_UPDATE,array($this,'handle_item_before_update'));
		Event::listen($this,Event::AFTER_CREATE,array($this,'handle_item_after_create'));
		Event::listen($this,Event::AFTER_UPDATE,array($this,'handle_item_after_update'));
		Event::listen($this,Event::AFTER_DELETE,array($this,'handle_item_after_delete'));
		Event::listen($this,Event::BEFORE_COPY,array($this,'handle_item_before_copy'));
		Event::listen($this,Event::AFTER_COPY,array($this,'handle_item_after_copy'));
	}

	
	/**
	 * index
	 */
	public function action_index()
	{
		$this->action_list();
	}


	/**
	 * view
	 */
	public function action_json()
	{
		// get id
		$id = $this->request->param('id');
		// check if multiple ids
		$ids = explode('-',$id);
		// get models
		if(count($ids)>1){
			// get items
			$items = ORM::factory($this->_settings->get('model'))->in($ids)->items();
			// get right order and doubles
			$data = array();
			foreach($ids as $id){
				foreach($items as $item){
					if($item->id == $id){
						$data[]=$item;
						break;
					}
				}
			}
		} else {
			$data = ORM::factory($this->_settings->get('model'),$id);
		}
		
		// get and return json
		$this->response->body($this->json($data));
	}


	/**
	 * list
	 */
	public function action_list()
	{
		// create model
		$model = ORM::factory($this->_settings->get('model'));
		// sortable
		$model->sortable($this->_settings->get('list.sortable'));
		// filter website
		$model->filter('website_id',$this->_website);
		
		// raise event
		Event::raise($this,Event::BEFORE_LIST,array('model'=>$model));
		
		// sorting
		$this->sort($model,$this->_settings->get('list.sort'));
		// filtering
		$this->filter($model);
		//grouping
		if($this->_settings->get('group')){
			// create a group and feed it the current search results (so without paginanation and grouping)
			$group = ORM::factory('Group')
			->filter('website_id',$this->_website)
			->filter('module_id',$this->_controller)
			->grouped($model->items());
			// do group filtering
			$this->group($model);
		}
		// pagination
		$this->pagination($model,$this->_settings->get('list.pagination'));
		
		// get list
		$data = $model->items();
		
		// raise event
		Event::raise($this,Event::AFTER_LIST,array('model'=>$model,'data'=> & $data));
		
		// create viewer
		$viewer = Viewer::factory('List',$data);
		
		// add group to viewer
		if($this->_settings->get('group')){
			$viewer->group($group);
		}
		// set data on viewer
		$viewer->settings($this->_settings->get('list'));
		$viewer->route($this->_settings->get('route', FALSE));
		$viewer->controller($this->_controller);
		$viewer->acl(Acl::instance());
		$viewer->state($this->_state);
		$viewer->task($this->request->param('task',FALSE));
		$viewer->callback($this->request->param('callback',FALSE));
		
		// create view
		$view = View::factory($this->_settings->get('view.list'),array('viewer'=>$viewer));
		// raise event
		Event::raise($this,Event::BEFORE_LIST_RENDER,array('data'=>$data,'model'=>$model,'viewer'=>$viewer,'view'=>$view));
		// response
		$this->response->body($view->render());
		// set back url globally
		State::instance()->set('url.back',URL::full());
	}
	
	
	/**
	 * create
	 */
	public function action_create()
	{
		// get id for url
		$type = $this->request->param('id',FALSE) ? ':'.$this->request->param('id') : '';
		// create form
		$form = Form::factory($this->_settings->get('form'));
		// add request to form
		$form->request($this->request);
		// add text to form
		$form->text(Text::instance());
		// add alias settings to form
		$form->alias($this->_settings->get('alias.global') ? 'multiple' : 
			($this->_settings->get('alias.module') ? 'single' : FALSE));
		// get viewport
		$viewport = $this->request->param('viewport');
		// add urls
		if($viewport === 'item'){
			// urls when creating in a dialog
			$form->urls(array(
				'submit'=>URL::to($this->request->controller().'@create'.$type,array('query'=>'after=update')),
				'submit_back'=>URL::to($this->request->controller().'@create'.$type,array('query'=>'after=close')),
				'back'=>URL::to($this->request->controller().'@close'),
			));
		} else {
			// default urls
			// back url: remove it after it has been 'consumed'
			$url_back = State::instance()->get('url.back',FALSE);
			State::instance()->set('url.back',FALSE);
			$form->urls(array(
				'submit'=>URL::to($this->request->controller().'@create'.$type,array('query'=>'after=update')),
				'submit_back'=>URL::to($this->request->controller().'@create'.$type),
				'back'=>$url_back ? $url_back : URL::to($this->request->controller()),
			));
		}
		// raise event
		Event::raise($this,Event::AFTER_CREATE_FORM,array('form'=>$form));
		// create new model, set is item
		$model = ORM::factory($this->_settings->get('model'));
		// set group if one is active
		if($group = $this->_state->get('group',FALSE) ){
			$model->group_id = $group;
		}
		// do the action
		if($id = $this->create($model,$form)){
			// store newly created id
			$this->param('id',$id);
			// remove total for pagination
			$this->_state->set('pagination.total',FALSE);
			// get after
			if($this->request->query('after') === 'update'){
				$params = array(
					'controller'=>$this->request->controller(),
					'action'=>'update',
					'id'=>$id
				);
			} elseif($this->request->query('after') === 'close'){
				$params = array(
					'controller'=>$this->request->controller(),
					'action'=>'close',
					'id'=>$id
				);
			} else {
				$params = array();
			}
			// redirect
			$this->redirect_done('created',$params);
		}
	}
	

	/**
	 * update
	 */
	public function action_update()
	{
		// get id
		$id = $this->param('id');
		// create new model
		$model = ORM::factory($this->_settings->get('model'),$id);
		// add item to navigation
		Viewer::instance('Navigation')->item($model);
		// create form
		$form = Form::factory($this->_settings->get('form'));
		// add request to form
		$form->request($this->request);
		// add text to form
		$form->text(Text::instance());
		// add alias settings to form
		$form->alias($this->_settings->get('alias.global') ? 'multiple' : 
			($this->_settings->get('alias.module') ? 'single' : FALSE));
		// add model to form
		$form->model($model);
		// get viewport
		$viewport = $this->request->param('viewport');
		// add urls
		if($viewport === 'item'){
			// urls when directly updating in a dialog
			$form->urls(array(
				'submit'=>URL::to($this->request->controller().'@update:'.$id,array('query'=>'after=update')),
				'submit_back'=>URL::to($this->request->controller().'@update:'.$id,array('query'=>'after=close')),
				'back'=>URL::to($this->request->controller().'@close'),
				'preview'=>URL::to($this->request->controller().'@preview:'.$id),
			));
		} else {
			// default urls
			$url_back = State::instance()->get('url.back',FALSE);
			State::instance()->set('url.back',FALSE);
			$form->urls(array(
				'submit'=>URL::to($this->request->controller().'@update:'.$id,array('query'=>'after=update')),
				'submit_back'=>URL::to($this->request->controller().'@update:'.$id),
				'back'=>$url_back ? $url_back : URL::to($this->request->controller()),
				'preview'=>URL::to($this->request->controller().'@preview:'.$id),
			));
		}
		// raise event
		Event::raise($this,Event::AFTER_UPDATE_FORM,array('form'=>$form,'model'=>$model));
		// do the action
		if($this->update($model,$form)){
			// get after
			if($this->request->query('after') === 'update'){
				$params = array(
					'controller'=>$this->request->controller(),
					'action'=>'update',
					'id'=>$id
				);
			} elseif($this->request->query('after') === 'close'){
				$params = array(
					'controller'=>$this->request->controller(),
					'action'=>'close',
					'id'=>$id
				);
			} else {
				$params = array();
			}
			//redirect	
			$this->redirect_done('updated',$params);
		}
	}
	

	/**
	 * delete
	 */
	public function action_delete()
	{
		// get model
		$model = ORM::factory($this->_settings->get('model'),$this->param('id'));
		// forget id
		$this->param('id',null);
		// remove total for pagination
		$this->_state->set('pagination.total',FALSE);
		// delete
		$this->delete($model);
		// response
		if(Request::current()->is_ajax()){
			// response
			$this->response->body(json_encode(array('success'=>TRUE)));
		} else {	
			$this->redirect_done('deleted');
		}
	}
	

	/**
	 * show
	 */
	public function action_show()
	{
		// create model
		$model = ORM::factory($this->_settings->get('model'),$this->param('id'));
		// set status
		$this->update_status($model,'show');	
		// response
		$this->response->body(json_encode(array('success'=>TRUE)));
	}
	
	
	/**
	 * hide
	 */
	public function action_hide()
	{
		// create model
		$model = ORM::factory($this->_settings->get('model'),$this->param('id'));
		// set status
		$this->update_status($model,'hide');	
		// response
		$this->response->body(json_encode(array('success'=>TRUE)));
	}
	
	
	/**
	 * preview
	 */
	public function action_preview()
	{
		$this->redirect(Route::url('frontend',array(
			'website'=>$this->_website,
			'controller'=>$this->_controller,
			'action'=>'preview',
			'id'=>$this->param('id',TRUE,FALSE),
			'param1'=>ORM::factory('Token')->generate(0,'preview')
		)));
	}
	
	
	/**
	 * move
	 */
	public function action_move()
	{
		// check update rights
		if(!Acl::instance()->allowed($this->_controller,'update')){
			throw HTTP_Exception::factory(403,'Update not allowed on :controller',array(
				':controller'=>$this->_controller,
			));
		}
		// create model
		$model = ORM::factory($this->_settings->get('model'),$this->param('id'));
		// set filter
		$model->filter('website_id',$this->_website);
		//move
		$model->move($this->param('param1')?$this->param('param1'):FALSE,$this->param('param2')?$this->param('param2'):FALSE);
		// response
		$this->response->body(json_encode(array('success'=>TRUE)));
	}
	
	
	/**
	 * copy
	 */ 
	public function action_copy()
	{
		// create model
		$model = ORM::factory($this->_settings->get('model'),$this->param('id'));
		// copy
		$copy = $this->copy($model);
		// set as active id
		$this->param('id',$copy->id);
		// done
		$this->redirect_done('copied');
	}

	
	/**
	 * revert
	 */ 
	public function action_revert()
	{
		// create model
		$model = ORM::factory($this->_settings->get('model'),$this->param('id'));
		// get wanted version
		$revision = $this->param('param1');
		// revert
		$this->revert($model,$revision);
		// done
		$this->redirect_done('reverted');
	}
	
	
	/**
	 * version
	 */ 
	public function action_version()
	{
		// create model
		$model = ORM::factory($this->_settings->get('model'),$this->param('id'));
		// get history
		$data = Version::factory($model)->history();
		// create viewmodel
		$viewModel = Model::factory('View_List')
			->data($data)
			->type('item')
			->keys($this->_settings->get('list.keys_version'))
			->tools($this->_settings->get('list.tools_version'))
			->sortable(FALSE)
			->root_fixed(TRUE);
		// create view
		$view = View::factory($this->_settings->get('view.version'),array('list'=>$viewModel));
		// response
		$this->response->body($view->render());
	}
	
	
	/**
	 * change group
	 */
	public function action_group()
	{
		// create model
		$model = ORM::factory($this->_settings->get('model'),$this->request->param('id',FALSE));
		// set group id
		if($model->loaded() === TRUE){
			$model->group_id = $this->request->param('param1',0);
			$model->save();
		}
	}
	
	
	/**
	 * close the current dialog
	 */
	public function action_close()
	{
		// get id
		$id = $this->request->param('id',FALSE);
		if($id!==FALSE){
			// create new model and get its data
			$model = ORM::factory($this->_settings->get('model'),$id);
			$data = $model->as_array();
			// set allow update
			$data['allow_update'] = Acl::instance()->allowed($model->model(),'update',$model->owner_id,$model->website_id);
			// add route to data if available
			if($route = $this->_settings->get('route')){
				$data['route'] = $route;
			}
		} else {
			// no id: close without data
			$data = FALSE;
		}
		$callback = $this->request->param('callback','');
		// get view
		$view = View::factory($this->_settings->get('view.close'),array('data'=>$data,'callback'=>$callback));
		//render resonse
		$this->response->body($view->render());
	}
	
	
	//-------------------------------
	// HELPERS
	//-------------------------------
	
	
	/**
	 * Get one or more items as json
	 * @param type $modelOrModels
	 * @return type
	 */
	protected function json($modelOrModels)
	{
		$acl = Acl::instance();
		if(is_array($modelOrModels)){
			$data = array();
			foreach($modelOrModels as $model){
				$values = $model->as_array();
				$values['allow_update'] = $acl->allowed($model->model(),'update',$model->owner_id,$model->website_id);
				if($route = $this->_settings->get('route')){
					$values['route'] = $route;
				}
				$data[]= $values;
			}
		} else {
			if($modelOrModels->loaded() === TRUE){
				$data = $modelOrModels->as_array();
				$data['allow_update'] = $acl->allowed($modelOrModels->model(),'update',$modelOrModels->owner_id,$modelOrModels->website_id);
				if($route = $this->_settings->get('route')){
					$data['route'] = $route;
				}
			} else {
				$data= FALSE;
			}
		}

		// return as json
		return json_encode($data);
	}
	
	
	/**
	 * Sort list
	 * @param Model_Item $model
	 * @param Array $settings
	 */
	protected function sort($model,$settings)
	{
		// get sort from state
		$sort = $this->_state->get('sort',array());
		// complement with settings
		foreach($settings as $field => $direction){
			if(!isset($sort[$field])){
				$sort[$field] = $direction;
			}
		}
		// get extra sort from query
		if($this->request->query('sort') != NULL && $this->request->query('direction') != NULL){
			// add the requested sort to the front of the array (unset / array_merge)
			unset($sort[$this->request->query('sort')]);
			$sort = array_merge(array($this->request->query('sort') => $this->request->query('direction')), $sort);
			// also reset pagination offset. Total can still be used
			$this->_state->set('pagination.offset',0);
		}
		// only use first sorter, as it will get superslow
		$sort = array_slice($sort,0,1);
		//store sort in state
		$this->_state->set('sort',$sort);
		// set the sorters on the model
		$model->sort($sort);
	}	
	
	
	
	/**
	 * filter the model
	 * @param Model_Item $model
	 * @param array $default
	 */
	protected function filter($model)
	{
		// get filter from state
		$filter = $this->_state->get('filter',array());
		
		// get extra filter from query
		$field = $this->request->query('filter');
		$operator = $this->request->query('operator');
		$value = $this->request->query('value');
		if($field != NULL && $operator != NULL && $value != NULL){
			$exists = FALSE;
			foreach($filter as $data){
				if($data['field'] == $field && $data['operator'] == $operator  && $data['value'] == $value){
					$exists = TRUE;
					break;
				}
			}
			if($exists === FALSE){
				$filter[] = array(
					'field' => $field,
					'operator' => $operator,
					'value' => $value
				);
			}
			// also reset pagination offset & total
			$this->_state->set('pagination.offset',0);
			$this->_state->set('pagination.total',FALSE);
		}
		// remove request from query
		if($this->request->query('unfilter') != NULL){
			unset($filter[$this->request->query('unfilter')]);
			// also reset pagination offset & total
			$this->_state->set('pagination.offset',0);
			$this->_state->set('pagination.total',FALSE);
		}
		
		
		//store filter in state
		$this->_state->set('filter',$filter);
		
		// set the filters on the model
		foreach($filter as $data){
			if($data['operator'] === 'LIKE'){
				$data['value'] = '%'.$data['value'].'%';
			}
			$model->filter($data['field'],$data['operator'],$data['value']);
		}
	}	

	/**
	 * filter the model on specific group
	 * @param Model_Item $model
	 */
	protected function group($model)
	{
		// get group from state
		$group = $this->_state->get('group',FALSE);
		
		// get group from query
		if($this->request->query('group') != NULL){
			$group = $this->request->query('group');
			// reset pagination offset & total
			$this->_state->set('pagination.offset',0);
			$this->_state->set('pagination.total',FALSE);
		}
		// remove request from query
		if($this->request->query('ungroup') != NULL){
			$group = FALSE;
			// reset pagination offset & total
			$this->_state->set('pagination.offset',0);
			$this->_state->set('pagination.total',FALSE);
		}
		//store filter in state
		$this->_state->set('group',$group);

		// add filter to model
		if($group!==FALSE){
			$model->filter('group_id',$group);
		}
	}
	
	
	/**
	 * Pagination
	 * @param Model_Item $model
	 * @param Array $settings
	 */
	protected function pagination($model,$settings)
	{
		// dont paginate
		if($settings === FALSE || !isset($settings['step'])){
			return;
		}
		// get offset from state
		$offset = $this->_state->get('pagination.offset',0);
		// override offset from request
		if($this->request->query('offset') != NULL){
			$offset = $this->request->query('offset');
		}
		// store offset
		$this->_state->set('pagination.offset',$offset);
		// get total from state
		$total = $this->_state->get('pagination.total',FALSE);	
		
		// if no total is known (or 0), fire a query
		if(!$total){
			// get the total
			$total = $model->count();
			// store  total
			$this->_state->set('pagination.total',$total);
		}
		// set limit and offset on the model
		$model->amount($settings['step']);
		$model->skip($offset);
	}

	/**
	 * Create item
	 *
	 * @param array $init_values
	 * @param array $form_data
	 * @return mixed id/false
	 */
	protected function create($model,$form)
	{
		if(!Acl::instance()->allowed($this->_controller,'create')){
			throw HTTP_Exception::factory(403,'Create not allowed on :controller',array(
				':controller'=>$this->_controller,
			));
		}
		
		// raise event
		Event::raise($this,Event::BEFORE_CREATE_FORM_PARSE,array('model'=>$model,'form'=>$form));
		// check if valid
		if($form->valid()){
			// fill up model
			$model->values($form->values());
			$model->created = date('Y-m-d H:i:s',time());
			$model->owner_id = Identity::instance()->id;
			$model->editor_id = Identity::instance()->id;
			$model->website_id = $this->_website;
			// call hook
			Event::raise($this,Event::BEFORE_CREATE,array('model'=>$model,'form'=>$form));
			// save
			$model->save();
			// call hook
			Event::raise($this,Event::AFTER_CREATE,array('model'=>$model,'form'=>$form));
			// return created id
			return $model->id;
		} else {
			// set message if form was submitted (there's an error)
			if($form->submitted() === TRUE){
				$this->error_message('invalid');
			}
			// create viewer
			$viewer = Viewer::factory('Form',$form)->text(Text::instance());
			// create view
			$view = View::factory($this->_settings->get('view.create'),array('viewer'=>$viewer));
			// raise event
			Event::raise($this,Event::BEFORE_CREATE_RENDER,array('model'=>$model,'form'=>$form,'viewer'=>$viewer,'view'=>$view));
			// response
			$this->response->body($view->render());
			return FALSE;
		}
	}
	
	
	/**
	 * update items
	 *
	 * @param int $id
	 * @param array $addit_values
	 * @param array $form_data
	 * @return boolean
	 */
	protected function update($model,$form)
	{
		if(!Acl::instance()->allowed($this->_controller,'update',$model->owner_id,$model->website_id)){
			throw HTTP_Exception::factory(403,'Update not allowed on :controller :id',array(
				':controller'=>$this->_controller,
				':id'=>$model->id,
			));
		}
		if(isset($model->updatable) && $model->updatable == 0){
			throw HTTP_Exception::factory(403,'Update not allowed on :controller :id',array(
				':controller'=>$this->_controller,
				':id'=>$model->id,
			));
		}
		
		//populate fields from db
		$form->values($model->as_map());

		// call hook
		Event::raise($this,Event::BEFORE_UPDATE_FORM_PARSE,array('model'=>$model,'form'=>$form));
		// check if valid
		if($form->valid()){
			Event::raise($this,Event::BEFORE_UPDATE_VALUES,array('model'=>$model,'form'=>$form));
			// set values
			$model->values($form->values());
			// set editor id
			$model->editor_id = Identity::instance()->id;
			// call hook
			Event::raise($this,Event::BEFORE_UPDATE,array('model'=>$model,'form'=>$form));
			//save
			$model->save();
			// call hook
			Event::raise($this,Event::AFTER_UPDATE,array('model'=>$model,'form'=>$form));
			// done
			return TRUE;
		} else {
			// set message if form was submitted (there's an error)
			if($form->submitted() === TRUE){
				$this->error_message('invalid');
			}
			// create viewer
			$viewer = Viewer::factory('Form',$form)->text(Text::instance());
			// create view
			$view = View::factory($this->_settings->get('view.update'),array('viewer'=>$viewer));
			// raise event
			Event::raise($this,Event::BEFORE_UPDATE_RENDER,array('model'=>$model,'form'=>$form,'viewer'=>$viewer,'view'=>$view));
			// response
			$this->response->body($view->render());
			// not done
			return FALSE;
		}
	}
	
	
	/**
	 * delete item
	 *
	 * @param int $id
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
		if(isset($model->deletable) && $model->deletable == 0){
			throw HTTP_Exception::factory(403,'Delete not allowed on :controller :id',array(
				':controller'=>$this->_controller,
				':id'=>$model->id,
			));
		}

		// call hook
		Event::raise($this,Event::BEFORE_DELETE,array('model'=>$model));
		// save deleted
		$deleted = clone($model);
		//delete
		 $model->delete();
		// call hook
		Event::raise($this,Event::AFTER_DELETE,array('deleted'=>$deleted));
	}
	
	
	/**
	 * set status
	 *
	 * @param int $id
	 * @param string $action 'show'/'hide'
	 */
	protected function update_status($model,$action)
	{
		// check rights
		if(!Acl::instance()->allowed($this->_controller,$action,$model->owner_id,$model->website_id)){
			throw HTTP_Exception::factory(403,':action not allowed on :controller :id',array(
				':action'=>ucfirst($action),
				':controller'=>$this->_controller,
				':id'=>$model->id,
			));
		}
		
		$status = array(
			'show' => Model_Item::STATUS_LIVE,
			'hide' => Model_Item::STATUS_EDIT
		);
		
		Event::raise($this,Event::BEFORE_STATUS,array('model'=>$model));
		$model->status = $status[$action];
		$model->save();
		Event::raise($this,Event::AFTER_STATUS,array('model'=>$model));
	}
	
	
	/**
	 * copy
	 * 
	 */
 	protected function copy($model)
	{
		// check rights
		if(!Acl::instance()->allowed($this->_controller,'copy',$model->owner_id,$model->website_id)){
			throw HTTP_Exception::factory(403,'Copy not allowed on :controller :id',array(
				':controller'=>$this->_controller,
				':id'=>$model->id,
			));
		}
		// create copied values
		$values = $model->as_array();
		unset($values['id']);
		$values['title'] = 'Copy '.$values['title'];
		$values['owner_id'] = Identity::instance()->id;
		$values['editor_id'] = Identity::instance()->id;
		// create copy
		$copy = ORM::factory($this->_settings->get('model'));
		$copy->values($values);
		// call hook
		Event::raise($this,Event::BEFORE_COPY,array('model'=>$model,'copy'=>$copy));
		// save copy
		$copy->save();
		// call hook
		Event::raise($this,Event::AFTER_COPY,array('model'=>$model,'copy'=>$copy));
		// return copy
		return $copy;
	}
	

	/**
	 * revert
	 */ 
	protected function revert($model,$revision)
	{
		// check rights
		if(!Acl::instance()->allowed($this->_controller,'update',$model->owner_id,$model->website_id)){
			throw HTTP_Exception::factory(403,'Revert item not allowed on :controller :id',array(
				':controller'=>$this->_controller,
				':id'=>$model->id,
			));
		}
		// revert
		Version::factory($model)->revert($revision);
	}


		
	
	
	//-------------------------------
	// Called by Hook handlers
	//-------------------------------
	
	
	/**
	 * create a list for images, files, etc.
	 *
	 */
	protected function create_collections($model,$form)
	{
		// save the model to be sure we have an id for has_many relations
		$model->save();
		
		foreach($model->collections() as $info){
			// get ids from form
			$ids = $form->value($info['key']) != NULL ?  $form->value($info['key']) : array();
			if($info['type'] === 'collection'){
				// real collection
				// fill collection (a new one is autmatically created)
				$collection = ORM::factory('Collection_'.$info['collection']);
				$collection->fill($ids);
				// add collection id to the model
				$model->{$info['column']} = $collection->id;
			} else {
				if($form->element($info['key']) && !empty($ids) ){
					// has_many through
					$model->add($info['key'],$ids);
				}
			}
		}
	}
	
	
	/**
	 * update a list for images, files, etc.
	 */
	protected function update_collections($model,$form)
	{
		$collections = $model->collections();
		foreach($collections as $info){
			// get ids from form
			$ids = $form->value($info['key']) != NULL ?  $form->value($info['key']) : array();
			if($info['type'] === 'collection' && $form->element($info['key'])){
				// real collection
				// refill collection
				$collection = ORM::factory('Collection_'.$info['collection'],$model->{$info['column']});
				$collection->refill($ids);
				// set collection id in the model (in case of non existing collection)
				$model->{$info['column']} = $collection->id;
			} else {
				// has_many through
				if($form->element($info['key'])){
					// remove
					$model->remove($info['key']);
					if( !empty($ids) ){
						// add
						$model->add($info['key'],$ids);
					}
				}
			}
		}
	}
	
	
	/**
	 * delete a list for images, files, etc.
	 */
	protected function delete_collections($model)
	{
		$collections = $model->collections();
		
		foreach($collections as $info){
			if($info['type'] === 'collection'){
				// real collection
				// delete the collection
				$collection = ORM::factory('Collection_'.$info['collection'],$model->{$info['column']});
				$collection->delete();
			} else {
				// has_many through
				// Turn this off for now: when pivot has a compound key -> too much will be deleted
				// $model->remove($info['key']);
			}
		}
	}
	
	
	/**
	 * create an alias or multiple aliases
	 */
	protected function create_alias($model,$formOrUri)
	{
		// get uris from form or string
		$uri = is_string($formOrUri) ? $formOrUri : $formOrUri->value('alias');

		// create local alias
		if($this->_settings->get('alias.module')== TRUE){
			if(is_array($uri)){
				$uriLocal = isset($uri[0])?$uri[0]:'';
			} else {
				$uriLocal = $uri;
			}
			Alias::factory(Website::instance()->id(),$model)->create($uriLocal);
			// save model again, with local alias
			$model->save();
		}

		// create global alias
		if($this->_settings->get('alias.global')== TRUE){
			if(is_array($uri)){
				$uris = $uri;
			} else {
				$uris = array(0=>$uri);
			}
			foreach($uris as $uriGlobal){
				Alias::factory(Website::instance()->id())->create(
					$uriGlobal,
					array(
						'controller'=>$this->_controller,
						'action'=>'view',
						'id'=>$model->id
					)
				);
			}
		}
	}
	
	
	/**
	 * update an alias or multiple aliases
	 *
	 */
	protected function update_alias($model,$formOrUri)
	{
		// get uri from form or string
		$uri = is_string($formOrUri) ? $formOrUri : $formOrUri->value('alias');

		// update local alias
		if($this->_settings->get('alias.module')== TRUE){
			if(is_array($uri)){
				$uriLocal = isset($uri[0])?$uri[0]:'';
			} else {
				$uriLocal = $uri;
			}
			Alias::factory(Website::instance()->id(),$model)->update($uriLocal);
		}
		
		// update global alias
		if($this->_settings->get('alias.global')== TRUE){
			if(is_array($uri)){
				$uris = $uri;
			} else {
				$uris = array(0=>$uri);
			}
			// remove all uris for this request
			Alias::factory(Website::instance()->id())->delete(array(
				'controller'=>$this->_controller,
				'action'=>'view',
				'id'=>$model->id
			));
			// create new ones
			foreach($uris as $uriGlobal){
				Alias::factory(Website::instance()->id())
				->create(
					$uriGlobal,
					array(
						'controller'=>$this->_controller,
						'action'=>'view',
						'id'=>$model->id
					)
				);
			}
		}
	}
	
	
	/**
	 * delete an alias
	 *
	 */
	protected function delete_alias($model)
	{
		// delete global alias
		if($this->_settings->get('alias.global')== TRUE){
			Alias::factory(Website::instance()->id())->delete(
				array(
					'controller'=>$this->_controller,
					'action'=>'view',
					'id'=>$model->id
				)
			);
		}
	}
	
	
	
	//-------------------------------
	// Event Handlers
	//-------------------------------
	/**
	 * before create
	 *
	 * @param Model $model
	 * @param Form $form
	 */
	public function handle_item_before_create($data)
	{	
		// create collections
		$this->create_collections($data->model,$data->form);
		// empty alias for now. If it is needed, it will be filled again in handle_item_after_create()
		if(isset($data->model->alias)){
			$data->model->alias = '';
		}
	}
	
	
	/**
	 * after create
	 *
	 * @param Model $model
	 * @param Form $form
	 */
	public function handle_item_after_create($data)
	{
		// create alias. After create because we need an id
		$this->create_alias($data->model,$data->form);
		// create version
		if($this->_settings->get('version') == TRUE){
			Version::factory($data->model->reload())->commit();
		}
		// move to last position if sortable
		if($data->model->sortable()){
			$data->model->move(TRUE);
		}
	}
	
	
	/**
	 * beofre update 
	 *
	 * @param Model $model
	 * @param Form $form
	 */
	public function handle_item_before_update($data)
	{
		// update collections
		$this->update_collections($data->model,$data->form);
		// update alias
		$this->update_alias($data->model,$data->form);
	}
	
	
	/**
	 * after update 
	 *
	 * @param Model $model
	 * @param Form $form
	 */
	public function handle_item_after_update($data)
	{
		// update version
		if($this->_settings->get('version') == TRUE){
			Version::factory($data->model)->commit();
		}
	}
	
	
	/**
	 * before parse form
	 *
	 * @param Model $model
	 * @param Form $form
	 */
	public function handle_item_before_update_form_parse($data)
	{
		// if there is only a global alias
		// get that an show it in the form
		if($this->_settings->get('alias.global') == TRUE){
			$data->form->value('alias',Alias::factory(Website::instance()->id())->uris(array(
				'controller'=>$this->_controller,
				'action'=>'view',
				'id'=>$data->model->id
			),FALSE));
		}	
	}
	
	
	/**
	 * After delete
	 *
	 * @param Model $model
	 */
	public function handle_item_after_delete($data)
	{
		// delete collections
		$this->delete_collections($data->deleted);
		// delete alias
		$this->delete_alias($data->deleted);
		// delete version
		if($this->_settings->get('version') == TRUE){
			Version::factory($data->deleted)->delete();
		}
	}
	
	
	/**
	 * copy collections, requests and alias
	 */ 
	public function handle_item_before_copy($data)
	{
		$model = $data->model;
		$copy = $data->copy;
		// copy collections
		$collections = $model->collections();
		foreach($collections as $collection){
			if($info['type'] === 'collection'){
				// real collection
				$collectionCopy = ORM::factory($collection['collection']);
				$collectionCopy->fill($model->{$collection['key']}->as_array());
				$copy->{$collection['key']} = $collectionCopy;
			} else {
				// has_many through
				// TODO
			}
		}
	}
	
	
	/**
	 * copy alias
	 */
	public function handle_item_after_copy($data)
	{
		// get copy
		$copy = $data->copy;
		
		// create new alias
		if($this->_settings->get('alias.global') == TRUE || $this->_settings->get('alias.module') == TRUE){
			$this->create_alias($copy,$copy->alias);
		}

		// create version fo copy
		if($this->_settings->get('version')== TRUE){
			Version::factory($copy)->commit();
		}
	}
}