<?php defined('SYSPATH') or die('No direct script access.'); ?>

2011-03-08 01:17:11 --- ERROR: Http_Exception_404 [ 404 ]: The requested URL allartistinfo/index was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 94 ]
2011-03-08 01:20:45 --- ERROR: Http_Exception_404 [ 404 ]: The requested URL allartistinfo/index was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 94 ]
2011-03-08 01:20:50 --- ERROR: Http_Exception_404 [ 404 ]: The requested URL allartistinfo/index was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 94 ]
2011-03-08 01:22:05 --- ERROR: Http_Exception_404 [ 404 ]: Unable to find a route to match the URI: allartistinfo/index.php ~ SYSPATH\classes\kohana\request.php [ 733 ]
2011-03-08 01:22:12 --- ERROR: Http_Exception_404 [ 404 ]: The requested URL allartistinfo/index was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 94 ]
2011-03-08 01:41:22 --- ERROR: Http_Exception_404 [ 404 ]: The requested URL allartistinfo/index was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 94 ]
2011-03-08 01:41:23 --- ERROR: Http_Exception_404 [ 404 ]: The requested URL allartistinfo/index was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 94 ]
2011-03-08 01:48:23 --- ERROR: ErrorException [ 1 ]: Call to undefined function site_url() ~ APPPATH\views\search_form.php [ 3 ]
2011-03-08 02:29:46 --- ERROR: Kohana_Exception [ 0 ]: Invalid method search_for called in Model_Artist ~ MODPATH\orm\classes\kohana\orm.php [ 606 ]
2011-03-08 02:38:40 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}', expecting T_VARIABLE or '$' ~ APPPATH\classes\model\artist.php [ 16 ]
2011-03-08 02:38:58 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE `name` LIKE 'jungle fiction' LIMIT 1' at line 1 ( SELECT * WHERE `name` LIKE 'jungle fiction' LIMIT 1 ) ~ MODPATH\database\classes\kohana\database\mysql.php [ 181 ]
2011-03-08 02:40:02 --- ERROR: Database_Exception [ 0 ]: [1064] You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'WHERE `name` LIKE '%jungle%fiction%' LIMIT 1' at line 1 ( SELECT * WHERE `name` LIKE '%jungle%fiction%' LIMIT 1 ) ~ MODPATH\database\classes\kohana\database\mysql.php [ 181 ]
2011-03-08 02:40:22 --- ERROR: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::as_object() ~ APPPATH\classes\model\artist.php [ 7 ]
2011-03-08 02:41:07 --- ERROR: ErrorException [ 8 ]: Undefined property: Database_MySQL_Result::$name ~ APPPATH\classes\model\artist.php [ 12 ]
2011-03-08 02:42:45 --- ERROR: ErrorException [ 8 ]: Undefined property: Database_MySQL_Result::$slug ~ APPPATH\classes\model\artist.php [ 13 ]
2011-03-08 02:42:55 --- ERROR: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH\classes\model\artist.php [ 21 ]
2011-03-08 02:43:09 --- ERROR: Http_Exception_404 [ 404 ]: The requested URL artist/jungle_fiction was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 120 ]
2011-03-08 02:52:46 --- ERROR: ErrorException [ 8 ]: Undefined property: Controller_Artist::$uri ~ APPPATH\classes\controller\artist.php [ 12 ]
2011-03-08 02:53:36 --- ERROR: ErrorException [ 1 ]: Class 'uri' not found ~ APPPATH\classes\controller\artist.php [ 12 ]