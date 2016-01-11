<?php

class Controller_Base extends Controller
{
	public function before()
	{
		// set default route
		URL::route('frontend');
		
		Text::language('nl');
		
		Text::instance('nl')
		->load($this->request->controller())
		->group($this->request->controller())
		->substitutes('module');
	}
}

