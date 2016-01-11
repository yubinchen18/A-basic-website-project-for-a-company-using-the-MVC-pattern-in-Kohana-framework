<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-01-04 09:28:26 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:63
2016-01-04 09:28:26 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(63): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:63
2016-01-04 09:28:26 --- CRITICAL: View_Exception [ 0 ]: The requested view downloads could not be found ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php [ 271 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/downloads/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2016-01-04 09:28:26 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('downloads', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Downloads.php(13): View->render()
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Downloads->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Downloads))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#8 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2016-01-04 09:28:26 --- CRITICAL: View_Exception [ 0 ]: The requested view downloads could not be found ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php [ 271 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/downloads/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2016-01-04 09:28:26 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('downloads', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Downloads.php(13): View->render()
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Downloads->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Downloads))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#8 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2016-01-04 09:53:37 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:63
2016-01-04 09:53:37 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(63): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:63
2016-01-04 09:57:50 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:63
2016-01-04 09:57:50 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(63): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:63
2016-01-04 11:58:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: error ~ APPPATH\classes\Controller\Page.php [ 67 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:67
2016-01-04 11:58:09 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 67, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:67
2016-01-04 11:58:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: error ~ APPPATH\classes\Controller\Page.php [ 67 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:67
2016-01-04 11:58:09 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 67, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:67
2016-01-04 12:11:55 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: query ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 6 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home?auth=passError in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2016-01-04 12:11:55 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(6): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 6, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/login', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(14): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#14 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2016-01-04 12:11:56 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: query ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 6 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home?auth=passError in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2016-01-04 12:11:56 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(6): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 6, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/login', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(14): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#14 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2016-01-04 12:15:17 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: query ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 6 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home?auth=passError in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2016-01-04 12:15:17 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(6): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 6, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/login', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(14): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#14 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2016-01-04 12:15:18 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: query ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 6 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home?auth=passError in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2016-01-04 12:15:18 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(6): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 6, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/login', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(14): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#14 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2016-01-04 12:26:12 --- CRITICAL: ErrorException [ 8 ]: Undefined index: auth ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 14 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:14
2016-01-04 12:26:12 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(14): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\\yuna_data\\pr...', 14, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#6 [internal function]: Kohana_Controller->execute()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#10 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#11 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:14
2016-01-04 12:26:12 --- CRITICAL: ErrorException [ 8 ]: Undefined index: auth ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 14 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:14
2016-01-04 12:26:12 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(14): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\\yuna_data\\pr...', 14, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#6 [internal function]: Kohana_Controller->execute()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#10 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#11 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:14
2016-01-04 12:26:44 --- CRITICAL: ErrorException [ 8 ]: Undefined index: auth ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 14 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-calcelit
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home?auth=false in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:14
2016-01-04 12:26:44 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(14): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\\yuna_data\\pr...', 14, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#6 [internal function]: Kohana_Controller->execute()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#10 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#11 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:14
2016-01-04 12:26:44 --- CRITICAL: ErrorException [ 8 ]: Undefined index: auth ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 14 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-calcelit
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home?auth=false in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:14
2016-01-04 12:26:44 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(14): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\\yuna_data\\pr...', 14, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#6 [internal function]: Kohana_Controller->execute()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#10 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#11 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:14
2016-01-04 12:32:05 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 15 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-calcelit
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home?auth=false in file:line
2016-01-04 12:32:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-01-04 12:32:05 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 15 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-calcelit
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home?auth=false in file:line
2016-01-04 12:32:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-01-04 14:18:44 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69
2016-01-04 14:18:44 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69
2016-01-04 14:36:15 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: download/file/CALCelit7.3 STUDENT-Win.xls ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/download/file/CALCelit7.3 STUDENT-Win.xls
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 14:36:15 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 14:48:36 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: file/download/CALCelit7.3 STUDENT-Win.xls ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file/download/CALCelit7.3 STUDENT-Win.xls
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 14:48:36 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 14:48:41 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: file/download/CALCelit7.3 STUDENT-Win.xls ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file/download/CALCelit7.3 STUDENT-Win.xls
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 14:48:41 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:01:30 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: file/download/CALCelit7.3 STUDENT-Win.xls ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file/download/CALCelit7.3 STUDENT-Win.xls
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:01:30 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:06:43 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: file/download/CADELAT-M Opgaven.pdf ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file/download/CADELAT-M Opgaven.pdf
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:06:43 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:06:51 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: file/download/CALCelit7.3 STUDENT-Win.xls ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file/download/CALCelit7.3 STUDENT-Win.xls
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:06:51 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:08:58 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: file/download/CALCelit7.3 STUDENT-Win.xls ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file/download/CALCelit7.3 STUDENT-Win.xls
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:08:58 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:09:23 --- CRITICAL: HTTP_Exception_404 [ 404 ]: The requested URL file was not found on this server. ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php:80
2016-01-04 15:09:23 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(80): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 [internal function]: Kohana_Controller->execute()
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#5 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#6 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php:80
2016-01-04 15:09:36 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69
2016-01-04 15:09:36 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69
2016-01-04 15:09:48 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69
2016-01-04 15:09:48 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69
2016-01-04 15:12:25 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: file/download/CALCelit7.3 STUDENT-Win.xls ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file/download/CALCelit7.3 STUDENT-Win.xls
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 15:12:25 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2016-01-04 16:06:44 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto-vni in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69
2016-01-04 16:06:44 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69
2016-01-04 16:11:12 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\classes\Controller\File.php [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file/download/12
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\File.php:16
2016-01-04 16:11:12 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\File.php(16): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 16, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_File->action_download()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\File.php:16
2016-01-04 16:11:12 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ APPPATH\classes\Controller\File.php [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/file/download/12
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\File.php:16
2016-01-04 16:11:12 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\File.php(16): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 16, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_File->action_download()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_File))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\File.php:16
2016-01-04 16:40:35 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69
2016-01-04 16:40:35 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:69