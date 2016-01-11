<?php
class Controller_Home extends Controller_Base
{
	public function action_index()
	{
		$view = View::factory('home');
		$this->response->body($view->render());						
	}
}