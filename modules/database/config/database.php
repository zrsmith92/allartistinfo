<?php defined('SYSPATH') or die('No direct script access.');

return array
(
	'default' => array
	(
		'type' => 'mysql',
		'connection' => array(
			/**
			* The following options are available for MySQL:
			*
			* string hostname server hostname, or socket
			* string database database name
			* string username database username
			* string password database password
			* boolean persistent use persistent connections?
			* array variables system variables as "key => value" pairs
			*
			* Ports and sockets may be appended to the hostname.
			*/
			'hostname' => 'localhost',
			'database' => 'allartistinfo',
			'username' => 'allartistinfo',
			'password' => 'allartistinfo',
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset' => 'utf8',
		'caching' => FALSE,
		'profiling' => TRUE,
	),
	
	'pagoda' => array(
		'type' => 'pdo',
		'connection' => array(
			/**
			* The following options are available for PDO:
			*
			* string dsn Data Source Name
			* string username database username
			* string password database password
			* boolean persistent use persistent connections?
			*/
			'dsn' => 'mysql:unix_socket=' . PAGODA_DB_SOCKET
					 	. ';dbname=' . PAGODA_DB_NAME,
			'username' => PAGODA_DB_USER,
			'password' => PAGODA_DB_PASSWORD,
			'persistent' => FALSE,
			),
		/**
		* The following extra options are available for PDO:
		*
		* string identifier set the escaping identifier
		*/
		'table_prefix' => '',
		'charset' => 'utf8',
		'caching' => FALSE,
		'profiling' => TRUE,
	),
);