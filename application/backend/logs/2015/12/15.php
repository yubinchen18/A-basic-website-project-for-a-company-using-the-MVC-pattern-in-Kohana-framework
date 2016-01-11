<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-12-15 09:33:52 --- CRITICAL: HTTP_Exception_403 [ 403 ]: Hide not allowed on Form 1 ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Form/hide/1
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Form/list?sort=title&direction=DESC in D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php:813
2015-12-15 09:33:52 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(813): Kohana_HTTP_Exception::factory(403, ':action not all...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(317): Controller_Default_Item->update_status(Object(Model_Form), 'hide')
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Default_Item->action_hide()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Form))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#8 {main} in D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php:813
2015-12-15 09:33:53 --- CRITICAL: HTTP_Exception_403 [ 403 ]: Show not allowed on Form 1 ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Form/show/1
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Form/list?sort=title&direction=DESC in D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php:813
2015-12-15 09:33:53 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(813): Kohana_HTTP_Exception::factory(403, ':action not all...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(303): Controller_Default_Item->update_status(Object(Model_Form), 'show')
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Default_Item->action_show()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Form))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#8 {main} in D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php:813