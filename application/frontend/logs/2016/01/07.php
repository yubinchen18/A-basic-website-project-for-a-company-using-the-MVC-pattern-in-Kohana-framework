<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-01-07 09:36:39 --- CRITICAL: HTTP_Exception_404 [ 404 ]: The requested URL 22 was not found on this server. ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/22
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2016-01-07 09:36:39 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#3 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#4 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2016-01-07 09:36:42 --- CRITICAL: HTTP_Exception_404 [ 404 ]: The requested URL 22 was not found on this server. ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/22
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2016-01-07 09:36:42 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#3 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#4 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2016-01-07 09:56:35 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 22 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:22
2016-01-07 09:56:35 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(22): Kohana_Core::error_handler(8, 'Trying to get p...', 'D:\\yuna_data\\pr...', 22, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(34): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:22
2016-01-07 09:56:35 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 22 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:22
2016-01-07 09:56:35 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(22): Kohana_Core::error_handler(8, 'Trying to get p...', 'D:\\yuna_data\\pr...', 22, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(34): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:22
2016-01-07 09:58:54 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: itemID ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 23 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:23
2016-01-07 09:58:54 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(23): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 23, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(34): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:23
2016-01-07 09:58:54 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: itemID ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 23 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:23
2016-01-07 09:58:54 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(23): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 23, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(34): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:23
2016-01-07 10:00:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: itemID ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 23 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:23
2016-01-07 10:00:46 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(23): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 23, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(34): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:23
2016-01-07 10:00:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: itemID ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 23 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:23
2016-01-07 10:00:46 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(23): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 23, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(34): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:23
2016-01-07 10:06:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: itemID ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 33 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:33
2016-01-07 10:06:46 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(33): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 33, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(34): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#8 [internal function]: Kohana_Controller->execute()
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#12 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#13 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:33
2016-01-07 10:06:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: itemID ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 33 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:33
2016-01-07 10:06:46 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(33): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 33, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(34): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#8 [internal function]: Kohana_Controller->execute()
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#12 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#13 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:33
2016-01-07 10:18:37 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/Page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelit in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:89
2016-01-07 10:18:37 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(89): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:89
2016-01-07 11:32:30 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: itemAlias ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 26 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelit
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:26
2016-01-07 11:32:30 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(26): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 26, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(36): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#11 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/menu2', Array)
#12 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(11): View->render()
#13 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#14 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#15 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#16 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): View->render()
#17 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#18 [internal function]: Kohana_Controller->execute()
#19 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#20 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#21 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#22 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#23 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:26
2016-01-07 11:32:30 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: itemAlias ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 26 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelit
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:26
2016-01-07 11:32:30 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(26): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 26, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(36): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#11 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/menu2', Array)
#12 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(11): View->render()
#13 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#14 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#15 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#16 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): View->render()
#17 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#18 [internal function]: Kohana_Controller->execute()
#19 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#20 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#21 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#22 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#23 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:26
2016-01-07 11:42:56 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/Page/view
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelit in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:71
2016-01-07 11:42:56 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(71): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:71
2016-01-07 11:50:27 --- CRITICAL: ErrorException [ 1 ]: Call to a member function id() on string ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\URL.php [ 280 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelit in file:line
2016-01-07 11:50:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-01-07 11:50:27 --- CRITICAL: ErrorException [ 1 ]: Call to a member function id() on string ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\URL.php [ 280 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelit in file:line
2016-01-07 11:50:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-01-07 12:02:09 --- CRITICAL: Kohana_Exception [ 0 ]: The item property does not exist in the Model_Link class ~ MODPATH\orm\classes\Kohana\ORM.php [ 684 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php:600
2016-01-07 12:02:09 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('item')
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(29): Kohana_ORM->__get('item')
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(36): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#12 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/menu2', Array)
#13 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(11): View->render()
#14 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#15 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#16 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#17 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): View->render()
#18 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#19 [internal function]: Kohana_Controller->execute()
#20 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#21 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#22 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#23 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#24 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php:600
2016-01-07 12:02:10 --- CRITICAL: Kohana_Exception [ 0 ]: The item property does not exist in the Model_Link class ~ MODPATH\orm\classes\Kohana\ORM.php [ 684 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php:600
2016-01-07 12:02:10 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('item')
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(29): Kohana_ORM->__get('item')
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(36): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#12 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/menu2', Array)
#13 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(11): View->render()
#14 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#15 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#16 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#17 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): View->render()
#18 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#19 [internal function]: Kohana_Controller->execute()
#20 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#21 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#22 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#23 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#24 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php:600
2016-01-07 12:05:05 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: link ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 43 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:43
2016-01-07 12:05:05 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(43): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 43, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(36): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#11 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/menu2', Array)
#12 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(11): View->render()
#13 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#14 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#15 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#16 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): View->render()
#17 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#18 [internal function]: Kohana_Controller->execute()
#19 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#20 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#21 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#22 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#23 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:43
2016-01-07 12:05:05 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: link ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 43 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:43
2016-01-07 12:05:05 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(43): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 43, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(36): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#11 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/menu2', Array)
#12 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(11): View->render()
#13 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#14 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('base', Array)
#15 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(416): View->render()
#16 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(69): View->render()
#17 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#18 [internal function]: Kohana_Controller->execute()
#19 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#20 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#21 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#22 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#23 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:43
2016-01-07 12:20:08 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/http
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:71
2016-01-07 12:20:08 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(71): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:71