<?php
class Controller_Default_Single extends Controller_Item
{
	
	public function action_index()
	{
		$this->action_update();
	}
	
	
	/**
	 * update
	 */
	public function action_update()
	{
		// get model
		$model = ORM::factory($this->_settings->get('model'))
		->filter('website_id',$this->_website)
		->find();
		// create form
		$form = Form::factory($this->_settings->get('form'));
		// add request to form
		$form->request($this->request);
		// add text to form
		$form->text(Text::instance());
		// add model to form
		$form->model($model);
		// add urls
		$form->urls(array(
			'submit'=>URL::to($this->request->controller().'@update'),
			'back'=>URL::to($this->request->controller()),
		));

		// do the action
		if($this->update($model,$form)){
			//redirect	
			$this->redirect_done('updated');
		} 
	}
}