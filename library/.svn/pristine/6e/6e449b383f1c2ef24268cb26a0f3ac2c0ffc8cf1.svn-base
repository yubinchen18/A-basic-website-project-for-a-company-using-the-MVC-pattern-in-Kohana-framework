<?php
class Controller_Default_Settings extends Controller_Single
{
	protected function listeners()
	{
		parent::listeners();
		Event::listen($this,Event::BEFORE_UPDATE_FORM_PARSE,array($this,'handle_settings_before_update_form_parse'));
		Event::listen($this,Event::BEFORE_UPDATE,array($this,'handle_settings_before_update'));
	}
	
	
	/**
	 * update
	 */
	public function action_update()
	{
		// get model
		$model = Identity::instance()->user;
		// create form
		$form = Form::factory($this->_settings->get('form'));
		// add request to form
		$form->request($this->request);
		// add model to form
		$form->model($model);
		// add text to form
		$form->text(Text::instance());
		// add urls
		$form->urls(array(
			'submit'=>URL::to($this->request->controller().'@update'),
			'back'=>URL::to($this->request->controller()),
		));
		$form->user($model);
		
		// do the action
		if($this->update($model,$form)){
			//redirect	
			$this->redirect_done('updated');
		} 
	}

	
	public function handle_settings_before_update_form_parse($data)
	{
		// unset password in form
		$data->form->value('password','');
		$data->form->value('password_2','');
	}
	
	
	public function handle_settings_before_update($data)
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