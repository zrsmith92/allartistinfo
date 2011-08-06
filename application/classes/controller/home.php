<?php defined('SYSPATH') or die('No direct script access.');
echo Debug::vars($_SERVER, PAGODA, PAGODA_DB_SOCKET, PAGODA_DB_NAME, PAGODA_DB_USER, PAGODA_DB_PASSWORD, 'mysql:unix_socket=' . PAGODA_DB_SOCKET . ';dbname=' . PAGODA_DB_NAME);
class Controller_Home extends Controller_Template
{
	public function action_index()
	{
		$this->template->content = View::factory('search_form');
	}
}
