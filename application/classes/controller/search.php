<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller_Template
{
	function action_index()
	{
		$name = $this->request->post('artist');
		
		if ( !$slug = Model_Artist::search_for($name) )
		{
			// TODO Bring to confirmation page to select correct artist name before saving. For now assuming name is correct.
			$artist = new Model_Artist();
			$artist->name = $name;
			$artist->slug = Model_Artist::generate_slug($name);
			$artist->save();
			
			$slug = $artist->slug;
		}
		
		$this->request->redirect('artist/' . $slug);

	}
}
