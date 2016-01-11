<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2016-01-06 14:04:50 --- CRITICAL: View_Exception [ 0 ]: The requested view menu/item/base could not be found ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php [ 271 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2016-01-06 14:04:50 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#14 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2016-01-06 14:04:50 --- CRITICAL: View_Exception [ 0 ]: The requested view menu/item/base could not be found ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php [ 271 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2016-01-06 14:04:50 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#9 [internal function]: Kohana_Controller->execute()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#14 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2016-01-06 14:05:16 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 51 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:51
2016-01-06 14:05:16 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(51): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 51, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:51
2016-01-06 14:05:16 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 51 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:51
2016-01-06 14:05:16 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(51): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 51, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:51
2016-01-06 14:11:34 --- CRITICAL: Kohana_Exception [ 0 ]: The behaviour property does not exist in the Model_Menu class ~ MODPATH\orm\classes\Kohana\ORM.php [ 684 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php:600
2016-01-06 14:11:34 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('behaviour')
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(13): Kohana_ORM->__get('behaviour')
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php:600
2016-01-06 14:11:34 --- CRITICAL: Kohana_Exception [ 0 ]: The behaviour property does not exist in the Model_Menu class ~ MODPATH\orm\classes\Kohana\ORM.php [ 684 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php:600
2016-01-06 14:11:34 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('behaviour')
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(13): Kohana_ORM->__get('behaviour')
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php:600
2016-01-06 14:11:58 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'BEHAVIOUR_NONE' ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 14 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in file:line
2016-01-06 14:11:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-01-06 14:11:58 --- CRITICAL: ErrorException [ 1 ]: Undefined class constant 'BEHAVIOUR_NONE' ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 14 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in file:line
2016-01-06 14:11:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2016-01-06 14:13:47 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _route ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 24 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:24
2016-01-06 14:13:47 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(24): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 24, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:24
2016-01-06 14:13:47 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _route ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 24 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:24
2016-01-06 14:13:47 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(24): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 24, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:24
2016-01-06 14:15:35 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:15:35 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(31): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:15:35 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:15:35 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(31): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:20:22 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:20:22 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(31): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:20:22 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:20:22 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(31): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:24 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:24 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(32): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:24 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:24 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(32): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:25 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:25 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(32): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:25 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:25 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(32): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:26 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:26 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(32): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:27 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:27 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(32): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:28 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:28 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(32): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:28 --- CRITICAL: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH\classes\Kohana\HTML.php [ 139 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:21:28 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php(139): Kohana_Core::error_handler(8, 'Array to string...', 'D:\\yuna_data\\pr...', 139, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(32): Kohana_HTML::anchor('Home<span></spa...', Array)
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#9 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#10 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#12 [internal function]: Kohana_Controller->execute()
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#16 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#17 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\HTML.php:139
2016-01-06 14:44:34 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _route ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 41 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:41
2016-01-06 14:44:34 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(41): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 41, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:41
2016-01-06 14:44:34 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _route ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 41 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:41
2016-01-06 14:44:34 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(41): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 41, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/item/base', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(37): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/base', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(9): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#8 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('menu/main', Array)
#9 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(33): View->render()
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#11 [internal function]: Kohana_Controller->execute()
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#15 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#16 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:41
2016-01-06 14:52:03 --- CRITICAL: HTTP_Exception_404 [ 404 ]: The requested URL 22 was not found on this server. ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/22
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2016-01-06 14:52:03 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#3 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#4 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2016-01-06 14:52:06 --- CRITICAL: HTTP_Exception_404 [ 404 ]: The requested URL 23 was not found on this server. ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/23
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2016-01-06 14:52:06 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#3 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#4 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2016-01-06 14:52:12 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/Page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:83
2016-01-06 14:52:12 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(83): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:83
2016-01-06 14:52:15 --- CRITICAL: HTTP_Exception_404 [ 404 ]: The requested URL 24 was not found on this server. ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/24
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2016-01-06 14:52:15 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#3 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#4 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79