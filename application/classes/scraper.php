<?php defined('SYSPATH') or die('No direct script access.');

class Scraper
{
	public $name;
	protected $_orig_name;
	
	public $genre;
	public $description;
	public $website_url;
	public $myspace_name;
	private $permalink;
	public $city;
	public $location;
	
	public $updates	= array();
	public $tracks	= array();
	public $albums	= array();
	public $photos	= array();
	public $videos	= array();
	public $shows	= array();
	
	
	public function __construct($artist)
	{
		/*
		 * STEPS
		 * =====
		 * 1) Get last.fm
		 * 2) Get wikipedia description and name
		 * 3) Get facebook
		 * 4) Get myspace
		 * 5) Get soundcloud
		 * 6) Get website (if found)
		 */
		
		$this->_orig_name = $artist ;
		
		//$this->_merge_data($this->scrape_lastfm());
		$this->_merge_data($this->scrape_soundcloud());
		$this->_merge_data($this->scrape_facebook(), array('description'));
	}
	
	public function scrape_lastfm()
	{
		$name = isset($this->name) ? $this->name : $this->_orig_name;
		
		$lfm = API_Lastfm::user_search($name);
		
		if ( Str::diff($name, $lfm->name) < 5 )
		{
			$image = stripslashes($lfm->image[count($lfm->image) - 1]->text);
			$return = array(
				'name' 			=> $lfm->name,
				'description'	=> utf8_decode($lfm->bio->summary),
				'photos'		=> array($image)
			);
		}
	}	
	
	public function scrape_wikipedia()
	{
		$name = isset($this->name) ? $this->name : $this->_orig_name;
	}
	
	public function scrape_facebook()
	{
		
		if ( isset($this->permalink) )
		{
			$name = $this->permalink;
		}
		else if( isset($this->myspace_name) )
		{
			$name = $this->myspace_name;
		}
		else if ( isset($this->name) )
		{
			$name = $this->name;
		}
		else
		{
			$name = $this->_orig_name;
		}
		
		$fb = API_Facebook::user_search($name);
		
		if ( Str::diff($name, $fb->name) >= 5 ) return array();
		
		$sites = explode("\n", $fb->website);
				
		$photos = API_Facebook::get_photos($fb->id);
		
		return array(
			'name'			=> $fb->name,
			'location'		=> $fb->hometown,
			'description'	=> Str::nl2p($fb->bio),
			'photos'		=> $photos,
			'genre'			=> $fb->genre,
			'website_url'	=> array_shift($sites)
		);
	}
	
	public function scrape_myspace()
	{
		$name = isset($this->name) ? $this->name : $this->_orig_name;
	}
	
	public function scrape_soundcloud()
	{
		$name = isset($this->name) ? $this->name : $this->_orig_name;
		
		$sc = API_Soundcloud::user_search($name);
		$sc = $sc[0];
		
		if ( Str::diff($name, $sc->username) >= 5 ) return array();
		
		$tracks = API_Soundcloud::get_artist_tracks($sc->id);
				
		return array
		(
			'name'			=> !empty($sc->full_name) ? $sc->full_name : $sc->username,
			'tracks'		=> $tracks,
			'description'	=> Str::nl2p($sc->description),
			'myspace_name'	=> $sc->myspace_name,
			'location'		=> $sc->city . ', ' . $sc->country,
			'permalink'		=> $sc->permalink
		);
	}
	
	public function scrape_website()
	{
		if ( !isset($this->website_url) ) return array();
	}
	
	protected function _merge_data($data, $priority = array())
	{
		var_dump($data['name']);
		foreach ( $data  as $key => $val )
		{
			if ( !property_exists('Scraper', $key) || empty($val) ) continue;			// If property doesn't exist in new vals or main class, skip it.
			$prop = $this->{$key};
			
			if ( is_array($prop) )
			{
				for ( $i = 0; $i < count($val); $i++ )
				{
					$exists = FALSE;
					for ( $j = 0; $j < count($prop); $j++ )
					{
						if ( Str::diff($val[$i], $prop[$j]) < 5 )
						{
							$exists = TRUE;
							break;
						}
					}
					if ( !$exists )
					{
						$this->{$key}[] = $val[$i];
					}
				}
			}
			else if( $prop === NULL || in_array($key, $priority) )
			{
				$this->{$key} = $val;
			}
		}
	}
}