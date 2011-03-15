<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Artist extends Controller
{
	public function action_index()
	{
		$this->request->redirect('/');
	}
	
	public function action_artist($slug)
	{
		$artist = Model_Artist::get_from_slug($slug);
		
		$scraper = new Scraper($artist->name);
		
		var_dump($scraper);
		
		$page = View::factory('artist/template');
		$page->body = View::factory('artist/main');
		
		$view = View::factory('template');
		$view->body = $page;
		
		$this->response->body($view);
	}
}