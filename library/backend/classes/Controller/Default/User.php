<?php
class Controller_Default_User extends Controller_Item
{
	protected function listeners()
	{
		parent::listeners();
		Event::listen($this,Event::BEFORE_LIST,array($this,'handle_user_before_list'),TRUE);	
		Event::listen($this,Event::AFTER_CREATE_FORM,array($this,'handle_user_after_create_form'));
		Event::listen($this,Event::BEFORE_UPDATE_FORM_PARSE,array($this,'handle_user_before_update_form_parse'));
		Event::listen($this,Event::BEFORE_CREATE,array($this,'handle_user_before_create'));
		Event::listen($this,Event::BEFORE_UPDATE,array($this,'handle_user_before_update'));
	}
	

	/**
	 * add or remove roles from user
	 */ 
	public function action_roles()
	{
		$id = $this->param('id');
		$user = ORM::factory($this->_settings->get('model'),$id);
		$acl  = Acl::instance();
		$form = Form::factory('Roles');
		$form->urls(array(
			'submit'=>URL::to($this->request->controller().'@roles:'.$id,array('query'=>'after=roles')),
			'submit_back'=>URL::to($this->request->controller().'@roles:'.$id),
			'back'=>URL::to($this->request->controller()),
		));
		
		// get roles
		$roles = $acl->roles();
		sort($roles);
		$options = array();
		$text = Text::instance();
		foreach($roles as $role){
			$parts = explode('_',$role);
			if($parts[0] === 'manager'){
				$label = $text->get('option.roles.manager').' '.$parts[1];
			} else {
				$label = $text->get('option.roles.'.$role);
			}
			$options[$role] = $label;
		}
		// set all the available roles
		$form->roles($options);

		// set roles in form
		$form->value('roles',$user->roles);
		
		if($form->valid()){
			// filter out illegal attempts to upgrade roles
			$roles = array_intersect($form->value('roles'),$acl->roles());
			// set & save roles
			$user->roles = $roles;
			$user->save();
			
			$this->redirect_done('updated');
		}
		// create viewer
		$viewer = Viewer::factory('Form',$form)->text(Text::instance());
		// create view
		$view = View::factory($this->_settings->get('view.update'),array('viewer'=>$viewer));
		// response
		$this->response->body($view->render());	
	}
	
	
	public function action_hide()
	{
		$model = ORM::factory($this->_settings->get('model'),$this->request->param('id'));
		if($model->loaded()){
			$model->status = Model_User::STATUS_BLOCKED;
			$model->save();
		}
	}
	
	public function action_show()
	{
		$model = ORM::factory($this->_settings->get('model'),$this->request->param('id'));
		if($model->loaded()){
			$model->status = Model_User::STATUS_ACTIVE;
			$model->save();
		}
	}
	
	
	/**
	 * see all users, regardless of website
	 */ 
	public function handle_user_before_list($data)
	{
		$data->model->remove_filter('website_id');
	}
	
	
	/**
	 * add user to form
	 */ 
	public function handle_user_after_create_form($data)
	{
		// set a user instance to check for unique email
		$data->form->model(ORM::factory($this->_settings->get('model')));
	}
	
	
	/**
	 * set password to '' if none was filled in
	 */ 
	public function handle_user_before_update_form_parse($data)
	{
		// unset password in form
		$data->form->value('password','');
		$data->form->value('password_2','');
	}
	

	/**
	 * set encrypted password
	 */ 
	public function handle_user_before_create($data)
	{
		$model = $data->model;
		$model->password($model->password);
	}
	
	
	/**
	 * set encrypted password
	 */ 
	public function handle_user_before_update($data)
	{
		// get & unset password
		$password = $data->model->password;
		
		if($password != ''){
			// encrypt
			$data->model->password($password);
		} else {
			// not set: dont update
			unset($data->model->password);
		}
	}
}