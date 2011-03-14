<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller
{
	public function action_index()
	{
		$view = View::factory('template');
		$view->body = View::factory('search_form');
		
		$this->response->body($view);
	}
}