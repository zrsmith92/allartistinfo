<?php defined('SYSPATH') or die('No direct script access.');

class Model_Artist extends ORM
{
	public function search_for($name)
	{
		$result = DB::select()->from('artists')->where('name', 'LIKE', '%'.str_replace(' ', '%', $name).'%')->limit(1)->as_object()->execute();
		
		if ( $result->count() == 0 )
			return FALSE;
		
		$this->name = $result[0]->name;
		$this->slug = $result[0]->slug;
		$this->id = $result[0]->id;
		
		return TRUE;
	}
	
	static function generate_slug($name, $i = 0)
	{
		$slug = str_replace(' ', '_', preg_replace('/[^0-9a-zA-Z ]/', '', strtolower($name)));
		
		$slug = ( $i == 0 ) ? $slug : $slug . '_' . $i;
		
		$result = DB::select()->from('artists')->where('slug', '=', $slug)->execute();
		
		return ($result->count() == 0) ? $slug : Model_Artist::generate_slug($name, $i++);
	}
	
	static function get_from_slug($slug)
	{
		$result = DB::select()->from('artists')->where('slug', '=', $slug)->limit(1)->as_object()->execute();
		
		$artist = new Model_Artist();
		
		$artist->name = $result[0]->name;
		$artist->slug = $slug;
		$artist->id = $result[0]->id;
		$artist->last_updated = $result[0]->last_updated;
		
		return $artist;
	}
}