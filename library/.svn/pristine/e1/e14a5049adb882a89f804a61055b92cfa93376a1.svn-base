<?php
class URL extends Kohana_URL
{
	/**
	 * @var  Website object
	 */
	protected static $_website=FALSE;
	
	/**
	 * @var Route 
	 */
	protected static $_route = FALSE;
	
	/**
	 * @var Alias 
	 */
	protected static $_alias = FALSE;
	
	/**
	 * @var array 
	 */
	protected static $_urls = array();
	
	
	/**
	 * @var Array 
	 */
	protected static $_builders = array();
	
	
	/**
     * Set website
     * 
	 * @param Wesbite $website
	 */
	public static function website($website)
	{
		self::$_website = $website;
	}
	
	/**
	 * get / set route
	 * @param string $route 
	 */
	public static function route($route)
	{
		self::$_route = $route;
	}
	
	/**
	 * get / set route
	 * @param string $route 
	 */
	public static function alias($alias)
	{
		self::$_alias = $alias;
	}
	
	/**
	 * Set a prerenderd url to use later
	 * @param string $name
	 * @param string $url
	 */
	public static function set($name,$url)
	{
		self::$_urls[$name] = $url;
	}
	
	
	/**
	 * Get a prerenderd url
	 * @param string $name
	 */
	public static function get($name)
	{
		if (isset(self::$_urls[$name])){
			return self::$_urls[$name];
		} else {
			return '';
		}
	}
	
	
	public static function base($protocol = NULL, $index = FALSE)
	{
		$protocol =  empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off' ? 'http' : 'https';
		$domain =  $_SERVER['SERVER_NAME'];
		$port =  $_SERVER['SERVER_PORT'];
		
		// Path
		// /foo/index.php
		 $script = $_SERVER['SCRIPT_NAME'];
		 // /foo/bar?test=abc 
		 // /foo/index.php/bar?test=abc
		 $uri = $_SERVER['REQUEST_URI']; 
		 // Path
		 if (strpos($uri, $script) > -1) {
			 // the scipt name is in the uri, so no rewriting
			 // $path is the same as the script
			 $path = $script;
		 } else {
			 // the script name is not in the uri, so it rewriting is going on
			 // the dirname of the script is the path
			 $path = str_replace('\\', '', dirname($script));
		 }
		 
		$path = trim($path, '/').'/';

		// set new base url
		
		$port = 
		$base =  $protocol.'://'.$domain.( ($port == '80' && $protocol == 'http') || ($port == '443' && $protocol == 'https') ? '' : (':'.$port)).'/'.($path === '/' ? '' : $path);

		return $base;
	}
	
	
	/**
	 * get current url without qs. use full for qs
	 */
	public static function current()
	{
		return URL::site(Request::initial()->uri());
		//return self::build_base().Request::current()->uri();
	}
	
	
	/**
	 * get full url with qs. use current to skip qs
	 */
	public static function full()
	{
		$qs = http_build_query($_GET, '&');
		return self::current().($qs===''?'':('?'.$qs));
	}
	

	/**
	 * append uri to baseurl
	 */
	public static function uri($uri='')
	{
		$base = Kohana::$base_url;
		if($base[strlen($base)-1] != '/'){
			$base = $base.'/';
		}
		return $base.$uri;
	}
	
	/**
	 * Get the root url
	 * if a website is should be set in the qs for regular links,
	 * then dont include it here.
	 * This is used for loading assets, and they should be loaded from the 'real' root
	 */
	public static function root($website=FALSE)
	{
		if($website === FALSE){
			// use default website
			$website = self::$_website;
		}
		
		if($website !== FALSE){
			if($base_url = $website->base_url()) {
				// base url found: return it
				return $base_url;
			} else {
				// no base url: use the kohana configured one
				return URL::base();
			}
		} else {
			// no base url: use the kohana configured one
			return URL::base();
		}
	}

	
	/**
	 * Add a builder callback
	 * @param Callable $builder
	 */
	public static function builder($builder)
	{
		self::$_builders[]=$builder;
	}
	
	
	/**
	 * get url to request string
	 */
	public static function to($request_or_params='', $params_or_route = FALSE, $route_or_injected_website = FALSE, $injected_website_or_injected_alias = FALSE, $injected_alias = FALSE)
	{
		//---------------------
		// Normalize args
		//---------------------
		$controller = FALSE;
		$action = FALSE;
		$id = FALSE;
		$params = array();
		$route = FALSE;
		$website = FALSE;
		$alias = FALSE;


		if(is_string($request_or_params)){
			// extract params from string
			$params = self::params($request_or_params);
		} elseif(is_array($request_or_params)){
			// array of params
			$params = $request_or_params;
		} 
		
		if(is_array($params_or_route)){
			// additional / overwrite params
			$params = array_merge($params, $params_or_route);
		} elseif(is_string($params_or_route)){
			// route
			$route = $params_or_route;
		}
		
		if(is_string($route_or_injected_website)){
			// it is a route
			$route = $route_or_injected_website;
		} elseif($route_or_injected_website instanceof Website){
			// it is a website
			$website = $route_or_injected_website;
		}
		
		if($injected_website_or_injected_alias instanceof Website){
			// it is a website
			$website = $injected_website_or_injected_alias;
		} elseif($injected_website_or_injected_alias instanceof Alias){
			// it is an alias
			$alias = $injected_website_or_injected_alias;
		}
		
		if($injected_alias instanceof Alias){
			$alias = $injected_alias;
		}	
		
		if($route === FALSE){
			// use default route
			$route = self::$_route;
		}
		
		if($route === FALSE){
			// no route found
			throw HTTP_Exception::factory(500,'trying to create URL without a route');
		}
		
		if($website === FALSE){
			// use default website
			$website = self::$_website;
		} else {
			$params['injected_website'] = $website;
		}
		
		if($alias === FALSE){
			// use default website
			$alias = self::$_alias;
		}
		
		
		//---------------------
		// Create url
		//---------------------
		//
		// start with no base_url
		$base_url = FALSE;
		// start with no uri
		$uri = FALSE;

		// get website id from params, 
		$website_id = isset($params['website']) ? $params['website'] : NULL;
		

		if($website !== FALSE){
			// if no website in params, get current website
			if($website_id === NULL){
				$website_id = $website->id();
			}
	
			
			// get base url
			$base_url = $website->base_url($website_id);
			
			if($base_url == FALSE && $website->is_default($website_id) == FALSE ) {
				// When there is no base url given
				// and the the wanted website is not the default
				// We need to set the website in the uri
				$params['website'] = $website_id;
			} else {
				// no need to set the website in the uri
				unset($params['website']);
			}
		}
		
		
		// try to get uri from alias
		if($alias != FALSE){
			// always include website when trying to to get alias
			// dont spoil the $params array, so make a copy
			$alias_params = $params;
			$alias_params['website'] = $website_id;
			
			if($uri = $alias->uri($alias_params)){
				// we found an actual uri!
				// set up params for the alias route
				$uri_params = array('uri'=>$uri);
				// add website if set
				if(isset($params['website'])){
					$uri_params['website']=$params['website'];
				}
				// get the actual uri
				$uri = Route::get('alias')->uri($uri_params);
			}
		}
		
		// call builders
		$params['base_url'] = $base_url;
		foreach(self::$_builders as $builder){
			$params = $builder($params);
		}
		$base_url = $params['base_url'];

		// no uri found yet: get it via the regular Route way
		if($uri === FALSE){
			$uri = Route::get($route)->uri($params);
		}
		
		// no base url set, use base url from settings
		if($base_url === FALSE){
			$base_url = Kohana::$base_url;
		}
		// glue and return
		return $base_url.$uri;
	}
	

	/**
	 * Get paramaters from type Controller@action:id
	 * @param string $request
	 * @return array
	 */
	public static function params($request)
	{
		$parts = explode('@',$request);
		$controller = $parts[0];
		if(isset($parts[1])){
			$parts = explode(':',$parts[1]);
			$action = $parts[0];
			if(isset($parts[1])){
				$id = $parts[1];
			} else {
				$id = NULL;
			}
		} else {
			$action = NULL;
			$id = NULL;
		}
		return array(
			'controller'=>$controller,
			'action'=>$action,
			'id'=>$id,
		);
	}
}