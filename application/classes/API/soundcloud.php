<?php defined('SYSPATH') or die('No direct script access.');

class API_Soundcloud
{
	protected static $_client_id 		= 'O9gqsGuqPcdeRdxeWDQ2g';
	protected static $_client_secret 	= 'nWo7XueH8bYX1rgzOZcb3X2WzWk8Pf4RyzCaTFouqNM';
	protected static $_base_url 		= 'https://api.soundcloud.com/';
	protected static $_user_agent		= 'PHP-SoundCloud/1.0';
	
	
	public static function user_search($user)
	{
		return API_Soundcloud::_request('users.json', array('q' => $user));
	}
	
	public static function get_artist_tracks($id)
	{
		$data = API_Soundcloud::_request('users/' . $id . '/tracks.json');
		$tracks = array();
		foreach ( $data as $track)
		{
			$tracks[] = array
			(
				'name'			=> $track->title,
				'stream_url'	=> $track->stream_url,
				'download_url'	=> $track->download_url
			);
		}
		
		return $tracks;
	}
	
	protected static function _request($url, $params = array())
	{
		$url = API_Soundcloud::$_base_url . $url;
		$params['consumer_key'] = API_Soundcloud::$_client_id;
		$url = $url . '?' . http_build_query($params);
		
		$ch = curl_init($url);

		$options = array
		(
			CURLOPT_RETURNTRANSFER	=> TRUE,
			CURLOPT_HEADER			=> FALSE,
			CURLOPT_USERAGENT		=> API_Soundcloud::$_user_agent,
			CURLOPT_SSL_VERIFYPEER	=> FALSE
		);
		
		curl_setopt_array($ch, $options);
		
		$data = json_decode(curl_exec($ch));
		return API_Soundcloud::_handle_errors($data);
	}
	
	protected static function _handle_errors($data)
	{
		
		return $data;
	}
	
}