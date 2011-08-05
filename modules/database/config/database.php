<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(
	'default' => array(
		'type'       => 'pdo',
		'connection' => array(
			/**
			 * The following options are available for PDO:
			 *
			 * string   dsn         Data Source Name
			 * string   username    database username
			 * string   password    database password
			 * boolean  persistent  use persistent connections?
			 */
			'dsn'        => 'mysql:unix_socket=' . $_SERVER['PAGODA_DB_SOCKET'] .
								 ';dbname=' . $_SERVER['PAGODA_DB_NAME'],
			'username'   => $_SERVER['PAGODA_DB_USER'],
			'password'   => $_SERVER['PAGODA_DB_PASSWORD'],
			'persistent' => FALSE,
		),
		/**
		 * The following extra options are available for PDO:
		 *
		 * string   identifier  set the escaping identifier
		 */
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	),
	
	// 'default' => array
	// (
	// 	'type'       => 'mysql',
	// 	'connection' => array(
	// 		/**
	// 		 * The following options are available for MySQL:
	// 		 *
	// 		 * string   hostname     server hostname, or socket
	// 		 * string   database     database name
	// 		 * string   username     database username
	// 		 * string   password     database password
	// 		 * boolean  persistent   use persistent connections?
	// 		 *
	// 		 * Ports and sockets may be appended to the hostname.
	// 		 */
	// 		'hostname'   => 'localhost',
	// 		'database'   => 'allartistinfo',
	// 		'username'   => 'allartistinfo',
	// 		'password'   => 'allartistinfo',
	// 		'persistent' => FALSE,
	// 	),
	// 	'table_prefix' => '',
	// 	'charset'      => 'utf8',
	// 	'caching'      => FALSE,
	// 	'profiling'    => TRUE,
	// ),
	// 'alternate' => array(
	// 	'type'       => 'pdo',
	// 	'connection' => array(
	// 		/**
	// 		 * The following options are available for PDO:
	// 		 *
	// 		 * string   dsn         Data Source Name
	// 		 * string   username    database username
	// 		 * string   password    database password
	// 		 * boolean  persistent  use persistent connections?
	// 		 */
	// 		'dsn'        => 'mysql:host=localhost;dbname=kohana',
	// 		'username'   => 'root',
	// 		'password'   => 'r00tdb',
	// 		'persistent' => FALSE,
	// 	),
	// 	/**
	// 	 * The following extra options are available for PDO:
	// 	 *
	// 	 * string   identifier  set the escaping identifier
	// 	 */
	// 	'table_prefix' => '',
	// 	'charset'      => 'utf8',
	// 	'caching'      => FALSE,
	// 	'profiling'    => TRUE,
	// ),
);