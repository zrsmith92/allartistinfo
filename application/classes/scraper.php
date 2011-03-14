<?php defined('SYSPATH') or die('No direct script access.');

class Scraper
{
	public $name;
	public $desc;
	public $website_url;
	public $myspace_name;
	
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
		
		$this->_merge_data($this->scrape_wikipedia());
		$this->_merge_data($this->scrape_facebook());
	}
	
	public function scrape_lastfm()
	{
		
	}	
	
	public function scrape_wikipedia()
	{
		
	}
	
	public function scrape_facebook()
	{
		
	}
	
	public function scrape_myspace()
	{
		
	}
	
	public function scrape_soundcloud()
	{
		
	}
	
	public function scrape_website()
	{
		
	}
	
	protected function _merge_data($data)
	{
		foreach ( $data  as $key => $val )
		{
			if ( !$this->{$key} || $val === NULL ) continue;			// If property doesn't exist in new vals or main class, skip it.
			
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
			else if( $prop === NULL )
			{
				$this->{$key} = $val;
			}
		}
	}
}