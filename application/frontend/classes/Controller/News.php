<?php
class Controller_News extends Controller_Base
{
	public function action_view()
	{
		$newsItems = ORM::factory('News')
					->filter('status', Model_item::STATUS_LIVE)
					->current()
					->sort('time_publication', 'DESC')
					->amount(50)
					->items();

		$view = View::factory('nieuws', array('newsItems'=>Viewer::factory($newsItems)));
		$this->response->body($view->render());
	}
}