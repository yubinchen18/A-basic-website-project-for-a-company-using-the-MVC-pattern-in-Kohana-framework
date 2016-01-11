<?php defined('SYSPATH') or die('No direct script access.');



class Route extends Kohana_Route {

	/**
	 * overwrite kohana segment const: allow , and ; in urls
	 */
	const REGEX_SEGMENT = '[^/.?\n]++';
	
	/**
	 * @var Alias
	 */
	protected static $_alias=NULL;
	
	/**
	 * @var  Website
	 */
	protected static $_website=NULL;
	
	/**
	 * @var  array
	 */
	protected $_uri_defaults=array();
	
	/**
	 * @var  array
	 */
	protected $_retain=array();
	
	
	/**
	 * Route::alias()
	 * 
     * Set alias
     * 
	 * @param Alias $alias
	 */
	public static function alias(Alias $alias = NULL)
	{
		if($alias == NULL){
			return self::$_alias;
		} else {
			self::$_alias = $alias;
		}
	}
	
	
	/**
	 * Route::retain()
	 * 
	 * @param array $param_names
	 * @return
	 */
	public function retain(Array $param_names = NULL)
	{
		$this->_retain = $param_names;

		return $this;
	}
	
    
	/**
	 * Route::uri_defaults()
	 * 
	 * @param array $params
	 * @return Route
	 */
	public function uri_defaults(Array $params = NULL)
	{
		$this->_uri_defaults = $params;
	
		return $this;
	}
	


	/**
	 * Tests if the route matches a given URI. A successful match will return
	 * all of the routed parameters as an array. A failed match will return
	 * boolean FALSE.
	 *
	 *     // Params: controller = users, action = edit, id = 10
	 *     $params = $route->matches('users/edit/10');
	 *
	 * This method should almost always be used within an if/else block:
	 *
	 *     if ($params = $route->matches($uri))
	 *     {
	 *         // Parse the parameters
	 *     }
	 *
	 * @param   string  $uri    URI to match
	 * @return  array   on success
	 * @return  FALSE   on failure
	 */
	public function matches(Request $request)
	{

		// Get the URI from the Request
		$uri = trim($request->uri(), '/');

		if ( ! preg_match($this->_route_regex, $uri, $matches))
			return FALSE;

	
		$params = array();
		foreach ($matches as $key => $value)
		{
			if (is_int($key))
			{
				// Skip all unnamed keys
				continue;
			}

			// Set the value for all matched keys
			$params[$key] = $value;

 			//<---	
			// added by Yuna			 				
			if(is_array($this->_retain) AND in_array($key,$this->_retain) && $value!='')
			{
				// Value should be retained; add it to the _uri_defaults
				$this->_uri_defaults[$key] = $value;
			}
			//-->	
		}
	
		foreach ($this->_defaults as $key => $value)
		{
			if ( ! isset($params[$key]) OR $params[$key] === '')
			{
				// Set default values for any key that was not matched
				$params[$key] = $value;
			}
		}

		if ( ! empty($params['controller']))
		{
			// PSR-0: Replace underscores with spaces, run ucwords, then replace underscore
			$params['controller'] = str_replace(' ', '_', ucwords(str_replace('_', ' ', $params['controller'])));
		}

		if ( ! empty($params['directory']))
		{
			// PSR-0: Replace underscores with spaces, run ucwords, then replace underscore
			$params['directory'] = str_replace(' ', '_', ucwords(str_replace('_', ' ', $params['directory'])));
		}

		if ($this->_filters)
		{
			foreach ($this->_filters as $callback)
			{
				// Execute the filter giving it the route, params, and request
				$return = call_user_func($callback, $this, $params, $request);

				if ($return === FALSE)
				{
					// Filter has aborted the match
					return FALSE;
				}
				elseif (is_array($return))
				{
					// Filter has modified the parameters
					$params = $return;
				}
			}
		}
		
		return $params;
	}
	
	
	
	public function uri(array $params = NULL)
	{
        // Start with the routed URI
		$uri = $this->_uri;

		if (strpos($uri, '<') === FALSE AND strpos($uri, '(') === FALSE)
		{
			// This is a static route, no need to replace anything

			if ( ! $this->is_external())
				return $uri;

			// If the localhost setting does not have a protocol
			if (strpos($this->_defaults['host'], '://') === FALSE)
			{
				// Use the default defined protocol
				$params['host'] = Route::$default_protocol.$this->_defaults['host'];
			}
			else
			{
				// Use the supplied host with protocol
				$params['host'] = $this->_defaults['host'];
			}

			// Compile the final uri and return it
			return rtrim($params['host'], '/').'/'.$uri;
		}

		while (preg_match('#\([^()]++\)#', $uri, $match))
		{
			// Search for the matched value
			$search = $match[0];

			// Remove the parenthesis from the match as the replace
			$replace = substr($match[0], 1, -1);

			while (preg_match('#'.Route::REGEX_KEY.'#', $replace, $match))
			{
				list($key, $param) = $match;

				if (isset($params[$param]))
				{
					// Replace the key with the parameter value
					$replace = str_replace($key, $params[$param], $replace);
				} 
				elseif(isset($this->_uri_defaults[$param]))
				{
					// Replace the key with a default parameter if set in _uri_defaults
					$replace = str_replace($key, $this->_uri_defaults[$param], $replace);
				} 
				else
				{
					// This group has missing parameters
					$replace = '';
					break;
				}
			}
			
			// Replace the group in the URI
			$uri = str_replace($search, $replace, $uri);
			
		}

		while (preg_match('#'.Route::REGEX_KEY.'#', $uri, $match))
		{
			list($key, $param) = $match;
			if ( ! isset($params[$param]))
			{
				// Look for a default
				if (isset($this->_defaults[$param]))
				{
					$params[$param] = $this->_defaults[$param];
				}
				else
				{
					// Ungrouped parameters are required
					throw new Kohana_Exception('Required route parameter not passed: :param', array(
						':param' => $param,
					));
				}
			}

			$uri = str_replace($key, $params[$param], $uri);
		}

		// Trim all extra slashes from the URI
		$uri = preg_replace('#//+#', '/', rtrim($uri, '/'));

		if ($this->is_external())
		{
			// Need to add the host to the URI
			$host = $this->_defaults['host'];

			if (strpos($host, '://') === FALSE)
			{
				// Use the default defined protocol
				$host = Route::$default_protocol.$host;
			}

			// Clean up the host and prepend it to the URI
			$uri = rtrim($host, '/').'/'.$uri;
		}

		return $uri;
	}

} // End Route
