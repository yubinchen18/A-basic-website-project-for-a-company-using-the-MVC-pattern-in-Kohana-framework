<?php

/**
 * Configure and create a website object
 */
// set the settings in website class
Website::settings(Kohana::$config->load('websites'));
// get a website instance
$website = Website::instance();
// create website regex pattern
$websites_pattern = '('.implode('|',$website->websites()).')';
// set the website regex in the website instance
$website->match('(website_'.$websites_pattern.')',1);


/**
 * BACKEND
 */
Route::set(
	'backend', 'admin(/website_<website>)(/viewport_<viewport>(/task_<task>)(/callback_<callback>))(/<controller>(/arguments_<arguments>)(/<action>(/<id>(/<param1>(/<param2>(/<param3>))))))(?<query>)',
	array(
		'website' => $websites_pattern,
		'viewport' => '(application|module|item)',
		'task' => '(select)',
	)
)
->defaults(array(
	'controller' => 'Default',
	'action'     => 'index',
))
->retain(array(
	'website','viewport','task','callback','arguments'
));
	

/**
 * ERROR
 */
Route::set(
	'error', 'error(/<action>(/<message>))', 
	array(
		'action' => '[0-9]++', 
		'message' => '.+'
	)
)
->defaults(array(
	'controller' => 'Error',
	'action' => '500',
	'message'     => ''
));

	
/**
 * DIRECT ACCESS
 */
Route::set('access', 'access/<token>(/<controller>(/<action>(/<id>(/<param1>))))')
->defaults(array(
	'token' => '',
	'controller' => 'Home',
	'action'     => 'index'
));
	

/**
 * INTERNAL SUBREQUEST
 */
Route::set('internal', 'internal_<controller>(@<action>(:<id>))',
array(
	'controller' => '[a-zA-Z0-9\_\-]+', 
	'action' => '[a-zA-Z0-9\_\-]+'
))
->defaults(array(
	'action'     => 'index'
));
	

/**
 * LOCAL ALIAS NEWS
 */
Route::set(
	'news', '(website_<website>/)actueel/<id>',
	array(
		'website' => $websites_pattern
	)
)
->defaults(array(
	'controller'     => 'News',
	'action'     => 'view'
));


/**
 * LOCAL ALIAS EVENT
 */
Route::set(
	'event', '(website_<website>/)agenda/<id>',
	array(
		'website' => $websites_pattern
	)
)
->defaults(array(
	'controller'     => 'Event',
	'action'     => 'view'
));


/**
 * ALIAS
 */
// cache aliases
Alias::cache(Cache::instance('alias'));
Route::set('alias', '(website_<website>(/))(<uri>)',
array(
	'website' => $websites_pattern, 
	'uri' => '[a-zA-Z0-9\-]+'
))
->filter(function($route, $params, $request){

	if(isset($params['uri']) && $params['uri']!=''){
		$aliasParams = Alias::factory()->params(
			$params['uri'], 
			Website::instance()->uri($request->uri())->id()
		);
		return  $aliasParams ? $aliasParams : FALSE;
	} else {
		return FALSE;
	}
});


/**
 * FRONTEND
 */
Route::set(
	'frontend', '(website_<website>(/))(<controller>(/<action>(/<id>(/<param1>(/<param2>(/<param3>))))))(?<query>)',
	array(
		'website' => $websites_pattern
	)
)

		/*
->defaults(array(
	'controller' => 'Home',
	'action'     => 'index'
));*/

	

->defaults(array(
	'controller' => 'Page',
	'action'     => 'view'
));
