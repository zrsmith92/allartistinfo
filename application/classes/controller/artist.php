<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Artist extends Controller_Template
{
	public function action_index()
	{
		$this->request->redirect('/');
	}
	
	public function action_artist($slug)
	{
		$artist = new Model_Artist();
		$artist->where('slug', '=', $slug)->find();
		
		$cache = Cache::instance();
		if ( !$scraper = $cache->get($artist->id, FALSE) )
		{
			$scraper = new Scraper($artist->name);
		
			if ( $scraper->name !== $artist->name ) {
				$artist->update_name($scraper->name);
			}

			$cache->set($artist->id, $scraper, 3600);
		}
		
		
		$view = View::factory('artist/main');
		$view->artist = $artist;
		$view->artist_data = $scraper;
		$this->template->scripts = array('libs/jquery.jplayer.min.js');
		$this->template->content = $view;
		
	}
}
