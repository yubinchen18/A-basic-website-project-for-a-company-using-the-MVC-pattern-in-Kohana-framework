<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-12-01 15:46:22 --- CRITICAL: HTTP_Exception_404 [ 404 ]: The requested URL projects/calcelit/www_2015/public was not found on this server. ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/projects/calcelit/www_2015/public
 from http://10.0.0.2:8888/projects/calcelit/www_2015/ in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2015-12-01 15:46:22 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#3 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#4 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2015-12-01 16:10:34 --- CRITICAL: HTTP_Exception_404 [ 404 ]: The requested URL projects/calcelit/www_2015/public was not found on this server. ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/projects/calcelit/www_2015/public
 from http://10.0.0.2:8888/projects/calcelit/www_2015/ in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2015-12-01 16:10:34 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(79): Kohana_HTTP_Exception::factory(404, 'The requested U...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#3 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#4 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php:79
2015-12-01 16:14:40 --- CRITICAL: Database_Exception [ 42S02 ]: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'calcelit_2015.slide_collection' doesn't exist [ SELECT `slide_collection`.`id` AS `slide_collection:id`, `slide_collection`.`rank` AS `slide_collection:rank`, `slide_collection`.`collection_id` AS `slide_collection:collection_id`, `slide_collection`.`item_id` AS `slide_collection:item_id`, `content_collection_1`.`id` AS `content_collection_1:id`, `content_collection_1`.`rank` AS `content_collection_1:rank`, `content_collection_1`.`collection_id` AS `content_collection_1:collection_id`, `content_collection_1`.`item_id` AS `content_collection_1:item_id`, `content_collection_2`.`id` AS `content_collection_2:id`, `content_collection_2`.`rank` AS `content_collection_2:rank`, `content_collection_2`.`collection_id` AS `content_collection_2:collection_id`, `content_collection_2`.`item_id` AS `content_collection_2:item_id`, `home`.`id` AS `id`, `home`.`created` AS `created`, `home`.`status` AS `status`, `home`.`title` AS `title`, `home`.`alias` AS `alias`, `home`.`slide_collection_id` AS `slide_collection_id`, `home`.`content_collection_1_id` AS `content_collection_1_id`, `home`.`content_collection_2_id` AS `content_collection_2_id`, `home`.`website_id` AS `website_id`, `home`.`owner_id` AS `owner_id`, `home`.`editor_id` AS `editor_id` FROM `home` AS `home` LEFT JOIN `slide_collection` AS `slide_collection` ON (`slide_collection`.`id` = `home`.`slide_collection_id`) LEFT JOIN `content_collection` AS `content_collection_1` ON (`content_collection_1`.`id` = `home`.`content_collection_1_id`) LEFT JOIN `content_collection` AS `content_collection_2` ON (`content_collection_2`.`id` = `home`.`content_collection_2_id`) WHERE `website_id` = 'main' LIMIT 1 ] ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 151 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/
 from http://10.0.0.2:8888/projects/calcelit/www_2015/ in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-01 16:14:40 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, 'SELECT `slide_c...', false, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(1069): Kohana_Database_Query->execute(Object(Database_PDO))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(976): Kohana_ORM->_load_result(false)
#3 D:\yuna_data\projects\calcelit\www_2015\library\components\classes\Model\Base.php(462): Kohana_ORM->find()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(266): Model_Base->find()
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\ORM.php(20): Kohana_ORM::factory('Home', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Home.php(14): ORM::factory('Home', Array)
#8 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Module.php(31): Controller_Home->action_view()
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Module->action_index()
#10 [internal function]: Kohana_Controller->execute()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Home))
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#14 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#15 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-01 16:14:40 --- CRITICAL: Database_Exception [ 42S02 ]: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'calcelit_2015.slide_collection' doesn't exist [ SELECT `slide_collection`.`id` AS `slide_collection:id`, `slide_collection`.`rank` AS `slide_collection:rank`, `slide_collection`.`collection_id` AS `slide_collection:collection_id`, `slide_collection`.`item_id` AS `slide_collection:item_id`, `content_collection_1`.`id` AS `content_collection_1:id`, `content_collection_1`.`rank` AS `content_collection_1:rank`, `content_collection_1`.`collection_id` AS `content_collection_1:collection_id`, `content_collection_1`.`item_id` AS `content_collection_1:item_id`, `content_collection_2`.`id` AS `content_collection_2:id`, `content_collection_2`.`rank` AS `content_collection_2:rank`, `content_collection_2`.`collection_id` AS `content_collection_2:collection_id`, `content_collection_2`.`item_id` AS `content_collection_2:item_id`, `home`.`id` AS `id`, `home`.`created` AS `created`, `home`.`status` AS `status`, `home`.`title` AS `title`, `home`.`alias` AS `alias`, `home`.`slide_collection_id` AS `slide_collection_id`, `home`.`content_collection_1_id` AS `content_collection_1_id`, `home`.`content_collection_2_id` AS `content_collection_2_id`, `home`.`website_id` AS `website_id`, `home`.`owner_id` AS `owner_id`, `home`.`editor_id` AS `editor_id` FROM `home` AS `home` LEFT JOIN `slide_collection` AS `slide_collection` ON (`slide_collection`.`id` = `home`.`slide_collection_id`) LEFT JOIN `content_collection` AS `content_collection_1` ON (`content_collection_1`.`id` = `home`.`content_collection_1_id`) LEFT JOIN `content_collection` AS `content_collection_2` ON (`content_collection_2`.`id` = `home`.`content_collection_2_id`) WHERE `website_id` = 'main' LIMIT 1 ] ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 151 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/
 from http://10.0.0.2:8888/projects/calcelit/www_2015/ in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-01 16:14:40 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, 'SELECT `slide_c...', false, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(1069): Kohana_Database_Query->execute(Object(Database_PDO))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(976): Kohana_ORM->_load_result(false)
#3 D:\yuna_data\projects\calcelit\www_2015\library\components\classes\Model\Base.php(462): Kohana_ORM->find()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(266): Model_Base->find()
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(Array)
#6 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\ORM.php(20): Kohana_ORM::factory('Home', Array)
#7 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Home.php(14): ORM::factory('Home', Array)
#8 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Module.php(31): Controller_Home->action_view()
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Module->action_index()
#10 [internal function]: Kohana_Controller->execute()
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Home))
#12 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#13 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#14 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#15 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-01 16:49:52 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/70.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/70.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:49:52 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:49:52 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/iStock_000024086262Small.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/iStock_000024086262Small.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:49:52 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:49:55 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/70.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/70.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:49:55 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:49:55 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/iStock_000024086262Small.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/iStock_000024086262Small.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:49:55 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:50:00 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/70.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/70.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:50:00 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:50:00 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/iStock_000024086262Small.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/iStock_000024086262Small.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:50:00 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:52:43 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/iStock_000024086262Small.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/iStock_000024086262Small.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:52:43 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:52:43 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/70.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/70.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:52:43 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:53:11 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/70.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/70.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:53:11 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:53:11 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/small/iStock_000024086262Small.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/small/iStock_000024086262Small.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/all-elements in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 16:53:11 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 17:06:15 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/images/original/70.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/images/original/70.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/Image in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-01 17:06:15 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979