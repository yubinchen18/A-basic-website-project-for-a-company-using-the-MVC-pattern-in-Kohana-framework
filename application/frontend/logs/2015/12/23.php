<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-12-23 09:13:51 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: newsItems ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 5 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:5
2015-12-23 09:13:51 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(5): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 5, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('nieuws', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\News.php(14): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_News->action_view()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_News))
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#10 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:5
2015-12-23 09:13:51 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: newsItems ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 5 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:5
2015-12-23 09:13:51 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(5): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 5, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('nieuws', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\News.php(14): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_News->action_view()
#5 [internal function]: Kohana_Controller->execute()
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_News))
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#10 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:5
2015-12-23 09:21:01 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/5 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 09:21:01 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 09:25:32 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:25:32 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:25:35 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:25:35 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:25:38 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:25:38 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:29:43 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:29:43 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:31:32 --- CRITICAL: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'DSC LIMIT 50' at line 1 [ SELECT `image_collection`.`id` AS `image_collection:id`, `image_collection`.`rank` AS `image_collection:rank`, `image_collection`.`collection_id` AS `image_collection:collection_id`, `image_collection`.`item_id` AS `image_collection:item_id`, `image_collection:first`.`id` AS `image_collection:first:id`, `image_collection:first`.`alias` AS `image_collection:first:alias`, `image_collection:first`.`created` AS `image_collection:first:created`, `image_collection:first`.`timestamp` AS `image_collection:first:timestamp`, `image_collection:first`.`rank` AS `image_collection:first:rank`, `image_collection:first`.`status` AS `image_collection:first:status`, `image_collection:first`.`file` AS `image_collection:first:file`, `image_collection:first`.`sizes` AS `image_collection:first:sizes`, `image_collection:first`.`title` AS `image_collection:first:title`, `image_collection:first`.`group_id` AS `image_collection:first:group_id`, `image_collection:first`.`website_id` AS `image_collection:first:website_id`, `image_collection:first`.`owner_id` AS `image_collection:first:owner_id`, `image_collection:first`.`editor_id` AS `image_collection:first:editor_id`, `news`.`id` AS `id`, `news`.`alias` AS `alias`, `news`.`created` AS `created`, `news`.`timestamp` AS `timestamp`, `news`.`status` AS `status`, `news`.`use_time_show_start` AS `use_time_show_start`, `news`.`time_show_start` AS `time_show_start`, `news`.`use_time_show_end` AS `use_time_show_end`, `news`.`time_show_end` AS `time_show_end`, `news`.`time_publication` AS `time_publication`, `news`.`title` AS `title`, `news`.`body` AS `body`, `news`.`href` AS `href`, `news`.`image_collection_id` AS `image_collection_id`, `news`.`website_id` AS `website_id`, `news`.`owner_id` AS `owner_id`, `news`.`editor_id` AS `editor_id` FROM `news` AS `news` LEFT JOIN `image_collection` AS `image_collection` ON (`image_collection`.`id` = `news`.`image_collection_id`) LEFT JOIN `image` AS `image_collection:first` ON (`image_collection:first`.`id` = `image_collection`.`item_id`) WHERE `news`.`status` = 'live' AND (`news`.`use_time_show_start` = '0' OR `news`.`time_show_start` < '2015-12-23 09:31:32') AND (`news`.`use_time_show_end` = '0' OR `news`.`time_show_end` > '2015-12-23 09:31:32') ORDER BY `news`.`time_publication` DSC LIMIT 50 ] ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 151 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-23 09:31:32 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, 'SELECT `image_c...', 'Model_News', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(1060): Kohana_Database_Query->execute(Object(Database_PDO))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(1001): Kohana_ORM->_load_result(true)
#3 D:\yuna_data\projects\calcelit\www_2015\library\components\classes\Model\Base.php(478): Kohana_ORM->find_all()
#4 D:\yuna_data\projects\calcelit\www_2015\library\components\classes\Model\Default\Item.php(98): Model_Base->find_all()
#5 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\News.php(11): Model_Default_Item->items()
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_News->action_view()
#7 [internal function]: Kohana_Controller->execute()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_News))
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#12 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-23 09:31:32 --- CRITICAL: Database_Exception [ 42000 ]: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'DSC LIMIT 50' at line 1 [ SELECT `image_collection`.`id` AS `image_collection:id`, `image_collection`.`rank` AS `image_collection:rank`, `image_collection`.`collection_id` AS `image_collection:collection_id`, `image_collection`.`item_id` AS `image_collection:item_id`, `image_collection:first`.`id` AS `image_collection:first:id`, `image_collection:first`.`alias` AS `image_collection:first:alias`, `image_collection:first`.`created` AS `image_collection:first:created`, `image_collection:first`.`timestamp` AS `image_collection:first:timestamp`, `image_collection:first`.`rank` AS `image_collection:first:rank`, `image_collection:first`.`status` AS `image_collection:first:status`, `image_collection:first`.`file` AS `image_collection:first:file`, `image_collection:first`.`sizes` AS `image_collection:first:sizes`, `image_collection:first`.`title` AS `image_collection:first:title`, `image_collection:first`.`group_id` AS `image_collection:first:group_id`, `image_collection:first`.`website_id` AS `image_collection:first:website_id`, `image_collection:first`.`owner_id` AS `image_collection:first:owner_id`, `image_collection:first`.`editor_id` AS `image_collection:first:editor_id`, `news`.`id` AS `id`, `news`.`alias` AS `alias`, `news`.`created` AS `created`, `news`.`timestamp` AS `timestamp`, `news`.`status` AS `status`, `news`.`use_time_show_start` AS `use_time_show_start`, `news`.`time_show_start` AS `time_show_start`, `news`.`use_time_show_end` AS `use_time_show_end`, `news`.`time_show_end` AS `time_show_end`, `news`.`time_publication` AS `time_publication`, `news`.`title` AS `title`, `news`.`body` AS `body`, `news`.`href` AS `href`, `news`.`image_collection_id` AS `image_collection_id`, `news`.`website_id` AS `website_id`, `news`.`owner_id` AS `owner_id`, `news`.`editor_id` AS `editor_id` FROM `news` AS `news` LEFT JOIN `image_collection` AS `image_collection` ON (`image_collection`.`id` = `news`.`image_collection_id`) LEFT JOIN `image` AS `image_collection:first` ON (`image_collection:first`.`id` = `image_collection`.`item_id`) WHERE `news`.`status` = 'live' AND (`news`.`use_time_show_start` = '0' OR `news`.`time_show_start` < '2015-12-23 09:31:32') AND (`news`.`use_time_show_end` = '0' OR `news`.`time_show_end` > '2015-12-23 09:31:32') ORDER BY `news`.`time_publication` DSC LIMIT 50 ] ~ MODPATH\database\classes\Kohana\Database\PDO.php [ 151 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-23 09:31:32 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_PDO->query(1, 'SELECT `image_c...', 'Model_News', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(1060): Kohana_Database_Query->execute(Object(Database_PDO))
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\orm\classes\Kohana\ORM.php(1001): Kohana_ORM->_load_result(true)
#3 D:\yuna_data\projects\calcelit\www_2015\library\components\classes\Model\Base.php(478): Kohana_ORM->find_all()
#4 D:\yuna_data\projects\calcelit\www_2015\library\components\classes\Model\Default\Item.php(98): Model_Base->find_all()
#5 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\News.php(11): Model_Default_Item->items()
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_News->action_view()
#7 [internal function]: Kohana_Controller->execute()
#8 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_News))
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#12 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\modules\database\classes\Kohana\Database\Query.php:251
2015-12-23 09:33:54 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/create in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 09:33:54 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 09:36:37 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:36:37 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:36:40 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:36:40 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:39:56 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:39:56 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:41:24 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:41:24 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:43:21 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:43:21 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:43:24 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:43:24 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:52:43 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:52:43 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:55:03 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:55:03 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:56:48 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 09:56:48 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:04:10 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:04:10 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:04:13 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:04:13 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:10:01 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:10:01 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:10:04 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:10:04 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:10:34 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:10:34 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:27:54 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:27:54 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:36:01 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/home in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:36:01 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 10:38:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:38:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:38:01 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:38:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:38:38 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:38:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:38:39 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:38:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:38:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:38:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:38:40 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:38:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:38:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:38:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:38:41 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:38:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:39:39 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:39:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:39:39 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_News::raw() ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 16 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in file:line
2015-12-23 10:39:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 10:42:07 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/6 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 10:42:07 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 10:43:01 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/6 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 10:43:01 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 11:15:18 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/uneto-vni
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/news/view/nieuws in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 11:15:18 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 11:17:37 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/6 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 11:17:37 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 11:19:08 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/6 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 11:19:08 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 11:24:15 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/6 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 11:24:15 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 11:24:38 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/home in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 11:24:38 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 11:47:02 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: files/files/iStock_000017277830XSmall.jpg ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/files/files/iStock_000017277830XSmall.jpg
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/File/update/2 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 11:47:02 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 13:30:29 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:30:29 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:33:14 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:33:14 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:37:43 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto-vni in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:37:43 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:39:57 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:39:57 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:42:34 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:42:34 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:42:43 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 13:42:43 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 14:20:08 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/6 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 14:20:08 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 14:27:23 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/6 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 14:27:23 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 14:46:49 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/6 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 14:46:49 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 15:21:48 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: style/css/wysiwyg.css ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/style/css/wysiwyg.css
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/admin/website_main/News/update/6 in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 15:21:48 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(979): Kohana_HTTP_Exception::factory(404, 'Unable to find ...', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#2 {main} in D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php:979
2015-12-23 16:03:25 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:03:25 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:05:33 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:05:33 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:05:37 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:05:37 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:05:40 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:05:40 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:12:04 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:12:04 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:12:33 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/uneto-vni in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:12:33 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:37:05 --- CRITICAL: View_Exception [ 0 ]: The requested view downloads could not be found ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php [ 271 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/downloads/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2015-12-23 16:37:05 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('downloads', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Downloads.php(12): View->render()
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Downloads->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Downloads))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#8 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2015-12-23 16:37:05 --- CRITICAL: View_Exception [ 0 ]: The requested view downloads could not be found ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php [ 271 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/downloads/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/programma-cadelat in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2015-12-23 16:37:05 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('downloads', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Downloads.php(12): View->render()
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Downloads->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Downloads))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#8 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2015-12-23 16:44:17 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/downloads/view/downloads in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:44:17 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:54:42 --- CRITICAL: View_Exception [ 0 ]: The requested view downloads could not be found ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php [ 271 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/downloads/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2015-12-23 16:54:42 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('downloads', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Downloads.php(13): View->render()
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Downloads->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Downloads))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#8 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2015-12-23 16:54:42 --- CRITICAL: View_Exception [ 0 ]: The requested view downloads could not be found ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php [ 271 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/downloads/view/downloads
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2015-12-23 16:54:42 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('downloads', Array)
#1 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Downloads.php(13): View->render()
#2 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Downloads->action_view()
#3 [internal function]: Kohana_Controller->execute()
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Downloads))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#8 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php:400
2015-12-23 16:54:50 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\Page.php [ 25 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/ in file:line
2015-12-23 16:54:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 16:54:50 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\Page.php [ 25 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/ in file:line
2015-12-23 16:54:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 16:54:50 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\Page.php [ 25 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/ in file:line
2015-12-23 16:54:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 16:54:50 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH\classes\Controller\Page.php [ 25 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/ in file:line
2015-12-23 16:54:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 16:59:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: downloads ~ APPPATH\classes\Controller\Page.php [ 64 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:59:46 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 64, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:59:47 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: downloads ~ APPPATH\classes\Controller\Page.php [ 64 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 16:59:47 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 64, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 17:00:18 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: downloadItems ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 6 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2015-12-23 17:00:18 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(6): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 6, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/download...', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('page/item', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(65): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#8 [internal function]: Kohana_Controller->execute()
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#12 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#13 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2015-12-23 17:00:18 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: downloadItems ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 6 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2015-12-23 17:00:18 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(6): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 6, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/download...', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('page/item', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(65): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#8 [internal function]: Kohana_Controller->execute()
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#12 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#13 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:6
2015-12-23 17:02:45 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:67
2015-12-23 17:02:45 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:67
2015-12-23 17:02:48 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: downloads ~ APPPATH\classes\Controller\Page.php [ 64 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 17:02:48 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 64, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 17:02:48 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: downloads ~ APPPATH\classes\Controller\Page.php [ 64 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 17:02:48 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 64, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 17:02:50 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: downloads ~ APPPATH\classes\Controller\Page.php [ 64 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 17:02:50 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 64, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 17:02:50 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: downloads ~ APPPATH\classes\Controller\Page.php [ 64 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/home
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 17:02:50 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(64): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 64, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:64
2015-12-23 17:07:44 --- CRITICAL: HTTP_Exception_404 [ 404 ]: Page not found ~ SYSPATH\classes\Kohana\HTTP\Exception.php [ 17 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/contact
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:67
2015-12-23 17:07:44 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(67): Kohana_HTTP_Exception::factory(404, 'Page not found')
#1 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#2 [internal function]: Kohana_Controller->execute()
#3 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#4 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#7 {main} in D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php:67
2015-12-23 17:18:27 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: identity ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 5 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:5
2015-12-23 17:18:27 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(5): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 5, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/download...', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('page/item', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(61): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#8 [internal function]: Kohana_Controller->execute()
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#12 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#13 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:5
2015-12-23 17:18:27 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: identity ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 5 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/opgaven in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:5
2015-12-23 17:18:27 --- DEBUG: #0 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(5): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\\yuna_data\\pr...', 5, Array)
#1 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#2 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('common/download...', Array)
#3 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code(15): View->render()
#4 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295): eval()
#5 D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(400): View::capture('page/item', Array)
#6 D:\yuna_data\projects\calcelit\www_2015\application\frontend\classes\Controller\Page.php(61): View->render()
#7 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Controller.php(84): Controller_Page->action_view()
#8 [internal function]: Kohana_Controller->execute()
#9 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Page))
#10 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 D:\yuna_data\projects\calcelit\www_2015\vendor\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#12 D:\yuna_data\projects\calcelit\www_2015\public\index.php(76): Kohana_Request->execute()
#13 {main} in D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code:5
2015-12-23 17:33:03 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}', expecting ',' or ';' ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 11 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in file:line
2015-12-23 17:33:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-12-23 17:33:03 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}', expecting ',' or ';' ~ D:\yuna_data\projects\calcelit\www_2015\library\extensions\classes\View.php(295) : eval()'d code [ 11 ]
 on http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download
 from http://10.0.0.2:8888/projects/calcelit/www_2015/public/page/view/download in file:line
2015-12-23 17:33:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line