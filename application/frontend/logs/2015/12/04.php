<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-12-04 11:58:14 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: index.php ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/index.php/index.php in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-04 11:58:14 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-04 14:47:04 --- CRITICAL: ErrorException [ 1 ]: Cannot access protected property Kohana::$_modules ~ DOCROOT\index.php [ 80 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/ in file:line
2015-12-04 14:47:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-04 14:47:04 --- CRITICAL: ErrorException [ 1 ]: Cannot access protected property Kohana::$_modules ~ DOCROOT\index.php [ 80 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/ in file:line
2015-12-04 14:47:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line