<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller
{
	function action_index()
	{
		$name = $this->request->post('artist');
		$artist = new Model_Artist;
		
		if ( !$artist->search_for($name) )
		{
			// TODO Bring to confirmation page to select correct artist name before saving. For now assuming name is correct.
			$artist->name = $name;
			$artist->slug = Model_Artist::generate_slug();
			$artist->save();
		}
		
		$this->request->redirect('artist/'.$artist->slug);
	}
}