<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-12-22 09:35:39 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Controller\Page.php [ 48 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/calcelit in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:48
2015-12-22 09:35:39 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(48): Kohana_Core::error_handler(8, 'Trying to get p...', 'D:\\yuna_data\\pr...', 48, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:48
2015-12-22 09:35:39 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Controller\Page.php [ 48 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/calcelit in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:48
2015-12-22 09:35:39 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(48): Kohana_Core::error_handler(8, 'Trying to get p...', 'D:\\yuna_data\\pr...', 48, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:48
2015-12-22 09:39:59 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: post ~ APPPATH\classes\Controller\Page.php [ 61 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/calcelit in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:61
2015-12-22 09:39:59 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(61): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 61, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:61
2015-12-22 09:39:59 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: post ~ APPPATH\classes\Controller\Page.php [ 61 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/calcelit in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:61
2015-12-22 09:39:59 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(61): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 61, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:61
2015-12-22 09:58:00 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/cadelat
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelit in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 09:58:00 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 10:18:31 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/cadelat
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelit in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 10:18:31 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 10:30:55 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/create in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-22 10:30:55 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-22 10:47:00 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/create in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-22 10:47:00 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-22 10:54:20 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/5 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-22 10:54:20 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-22 11:19:26 --- CRITICAL: HTTP_Exception_404 [ 404 ]: The requested URL news/view/nieuws was not found on this server. ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2015-12-22 11:19:26 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#3 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#4 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2015-12-22 11:27:58 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 11:27:58 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 11:29:08 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 11:29:08 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 11:29:19 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 11:29:19 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 12:10:48 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/5 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-22 12:10:48 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-22 14:58:42 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 14:58:42 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 14:58:45 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 14:58:45 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 14:58:47 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-22 14:58:47 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64