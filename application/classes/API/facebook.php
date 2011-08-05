<?php defined('SYSPATH') or die('No direct script access.');

class API_Facebook
{
	protected static $_base_url 		= 'https://graph.facebook.com/';
	protected static $_user_agent		= 'PHP-Facebook/1.0';
	
	
	public static function user_search($user)
	{
		$data = API_Facebook::_request('search', array( 'q' => $user, 'type' => 'page' ));
		if ( count($data->data) === 0 ) return FALSE;

		return API_Facebook::_request($data->data[0]->id);
	}
	
	public static function get_photos($id)
	{
		$data = API_Facebook::_request($id . '/photos');
		
		$photos = array();
		
		foreach ( $data->data as $photo )
		{
			$photos[] = array(
				'thumb'		=> $photo->picture,
				'source'	=> $photo->source
			);
		}
	}
	
	protected static function _request($url, $params = array())
	{
		$url = API_Facebook::$_base_url . $url;
		$url = $url . '?' . http_build_query($params);
		$ch = curl_init($url);

		$options = array
		(
			CURLOPT_RETURNTRANSFER	=> TRUE,
			CURLOPT_HEADER			=> FALSE,
			CURLOPT_USERAGENT		=> API_Facebook::$_user_agent,
			CURLOPT_SSL_VERIFYPEER	=> FALSE
		);
		
		curl_setopt_array($ch, $options);
		$data = curl_exec($ch);
		return API_Facebook::_handle_errors($data);
	}
	protected static function _handle_errors($data)
	{
		return json_decode($data);
	}
}
