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
		
		$sc = API_Soundcloud::user_search($artist->name);
		$sc = $sc[0];
		
		if ( Str::diff($artist->name, $sc->username) < 5 )
		{
			$sc_tracks = API_Soundcloud::get_artist_tracks($sc->id);
			
			foreach ( $sc_tracks as $track)
			{
				echo $track->title . "\n";
			}
		}
		
		$page = View::factory('artist/template');
		$page->body = View::factory('artist/main');
		
		$view = View::factory('template');
		$view->body = $page;
		
		$this->response->body($view);
	}
}