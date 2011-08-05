<?php defined('SYSPATH') or die('No direct script access.');
class HTML extends Kohana_HTML {
	
	public static function body_classes()
	{
		$path = trim(str_replace('/', ' ', str_replace(url::base(), '', $_SERVER['REQUEST_URI'])));
		if ( $path == '' )  $path = 'home';
		return 'class= "' . $path . '"';
	}
	
}