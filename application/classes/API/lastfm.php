<?php defined('SYSPATH') or die('No direct script access.');

class API_Lastfm
{
	protected static $_api_key 			= '0b1492583ffbedf5c1a2c9de7310966e';
	protected static $_api_secret 		= 'e5859bbc5cc433fb79cb1de0460bf151';
	protected static $_base_url 		= 'http://ws.audioscrobbler.com/2.0/';
	protected static $_user_agent		= 'PHP-Lastfm/1.0';
	
	
	public static function user_search($user)
	{
		$data = API_Lastfm::_request('', array(
			'method'	=> 'artist.getinfo',
			'artist'	=> $user,
			'limit'		=> '1'
		));
		
		return $data->artist;
	}
	
	protected static function _request($url, $params = array())
	{
		$url = API_Lastfm::$_base_url . $url;
		$params['api_key'] = API_Lastfm::$_api_key;
		$params['format']  = 'json';
		$url = $url . '?' . http_build_query($params);
		echo $url;
		$ch = curl_init($url);

		$options = array
		(
			CURLOPT_RETURNTRANSFER	=> TRUE,
			CURLOPT_HEADER			=> FALSE,
			CURLOPT_USERAGENT		=> API_Lastfm::$_user_agent
		);
		
		curl_setopt_array($ch, $options);
		$data = curl_exec($ch);
		return API_Lastfm::_handle_errors($data);
	}
	protected static function _handle_errors($data)
	{
		echo $data;
		return json_decode($data);
	}
}