<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-12-01 09:25:24 --- CRITICAL: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 1 [ SELECT count(*) AS `count` FROM `content` AS `content` WHERE `content`.`website_id` = 'main' AND `content`.`type` IN () ] ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 151 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Content
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Event in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-01 09:25:24 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, 'SELECT count(*)...', false, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\components\classes\Model\Base.php(520): Kohana_Database_Query->execute(Object(Database_PDO))
#2 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(645): Model_Base->count()
#3 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(94): Controller_Default_Item->pagination(Object(Model_Content), Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Content.php(30): Controller_Default_Item->action_list()
#5 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(28): Controller_Default_Content->action_list()
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Default_Item->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Content))
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#12 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-01 09:25:24 --- CRITICAL: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 1 [ SELECT count(*) AS `count` FROM `content` AS `content` WHERE `content`.`website_id` = 'main' AND `content`.`type` IN () ] ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 151 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Content
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Event in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-01 09:25:24 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, 'SELECT count(*)...', false, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\components\classes\Model\Base.php(520): Kohana_Database_Query->execute(Object(Database_PDO))
#2 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(645): Model_Base->count()
#3 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(94): Controller_Default_Item->pagination(Object(Model_Content), Array)
#4 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Content.php(30): Controller_Default_Item->action_list()
#5 D:\yuna_data\projects\calcelit\www_2015\library\backend\classes\Controller\Default\Item.php(28): Controller_Default_Content->action_list()
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Default_Item->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Content))
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#12 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-01 10:06:12 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/admin/70.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/admin/70.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Image in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 10:06:12 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 10:06:12 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/admin/iStock_000024086262Small.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/admin/iStock_000024086262Small.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Image in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 10:06:12 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979