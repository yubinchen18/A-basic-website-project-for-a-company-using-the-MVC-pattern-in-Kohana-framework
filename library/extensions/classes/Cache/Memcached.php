<?php defined('SYSPATH') or die('No direct script access.');
/**
 * [Kohana Cache](api/Kohana_Cache) Memcached driver,
 *
 * ### Supported cache engines
 *
 * *  [Memcache](http://www.php.net/manual/en/book.memcache.php)
 * *  [Memcached-tags](http://code.google.com/p/memcached-tags/)
 *
 * ### Configuration example
 *
 * Below is an example of a _memcache_ server configuration.
 *
 *     return array(
 *          'default'   => array(                          // Default group
 *                  'driver'         => 'memcache',        // using Memcache driver
 *                  'servers'        => array(             // Available server definitions
 *                         // First memcache server server
 *                         array(
 *                              'host'             => 'localhost',
 *                              'port'             => 11211,
 *                              'persistent'       => FALSE
 *                              'weight'           => 1,
 *                              'timeout'          => 1,
 *                              'retry_interval'   => 15,
 *                              'status'           => TRUE,
 *				'instant_death'	   => TRUE,
 *                              'failure_callback' => array('className', 'classMethod')
 *                         ),
 *                         // Second memcache server
 *                         array(
 *                              'host'             => '192.168.1.5',
 *                              'port'             => 22122,
 *                              'persistent'       => TRUE
 *                         )
 *                  ),
 *                  'compression'    => FALSE,             // Use compression?
 *           ),
 *     )
 *
 * In cases where only one cache group is required, if the group is named `default` there is
 * no need to pass the group name when instantiating a cache instance.
 *
 * #### General cache group configuration settings
 *
 * Below are the settings available to all types of cache driver.
 *
 * Name           | Required | Description
 * -------------- | -------- | ---------------------------------------------------------------
 * driver         | __YES__  | (_string_) The driver type to use
 * servers        | __YES__  | (_array_) Associative array of server details, must include a __host__ key. (see _Memcache server configuration_ below)
 * compression    | __NO__   | (_boolean_) Use data compression when caching
 *
 * #### Memcache server configuration
 *
 * The following settings should be used when defining each memcache server
 *
 * Name             | Required | Description
 * ---------------- | -------- | ---------------------------------------------------------------
 * host             | __YES__  | (_string_) The host of the memcache server, i.e. __localhost__; or __127.0.0.1__; or __memcache.domain.tld__
 * port             | __NO__   | (_integer_) Point to the port where memcached is listening for connections. Set this parameter to 0 when using UNIX domain sockets.  Default __11211__
 * persistent       | __NO__   | (_boolean_) Controls the use of a persistent connection. Default __TRUE__
 * weight           | __NO__   | (_integer_) Number of buckets to create for this server which in turn control its probability of it being selected. The probability is relative to the total weight of all servers. Default __1__
 * timeout          | __NO__   | (_integer_) Value in seconds which will be used for connecting to the daemon. Think twice before changing the default value of 1 second - you can lose all the advantages of caching if your connection is too slow. Default __1__
 * retry_interval   | __NO__   | (_integer_) Controls how often a failed server will be retried, the default value is 15 seconds. Setting this parameter to -1 disables automatic retry. Default __15__
 * status           | __NO__   | (_boolean_) Controls if the server should be flagged as online. Default __TRUE__
 * failure_callback | __NO__   | (_[callback](http://www.php.net/manual/en/language.pseudo-types.php#language.types.callback)_) Allows the user to specify a callback function to run upon encountering an error. The callback is run before failover is attempted. The function takes two parameters, the hostname and port of the failed server. Default __NULL__
 *
 * ### System requirements
 *
 * *  Kohana 3.0.x
 * *  PHP 5.2.4 or greater
 * *  Memcache (plus Memcached-tags for native tagging support)
 * *  Zlib
 *
 * @package    Kohana/Cache
 * @category   Base
 * @version    2.0
 * @author     Kohana Team
 * @copyright  (c) 2009-2012 Kohana Team
 * @license    http://kohanaphp.com/license
 */
class Cache_Memcached extends Cache implements Cache_Arithmetic {

	// Memcache has a maximum cache lifetime of 30 days
	const CACHE_CEILING = 2592000;

	/**
	 * Memcache resource
	 *
	 * @var Memcache
	 */
	protected $_memcached;

	/**
	 * Flags to use when storing values
	 *
	 * @var string
	 */
	protected $_flags;

	/**
	 * The default configuration for the memcachedd server
	 *
	 * @var array
	 */
	protected $_default_config = array();

	/**
	 * Constructs the memcached Kohana_Cache object
	 *
	 * @param   array  $config  configuration
	 * @throws  Cache_Exception
	 */
	protected function __construct(array $config)
	{
		// Check for the memcached extention
		if ( ! extension_loaded('memcached'))
		{
			throw new Cache_Exception('Memcached PHP extention not loaded');
		}

		parent::__construct($config);

		// Setup Memcached
		$this->_memcached = new Memcached;

		// Load servers from configuration
		$servers = Arr::get($this->_config, 'servers', NULL);

		if ( ! $servers)
		{
			// Throw an exception if no server found
			throw new Cache_Exception('No Memcached servers defined in configuration');
		}

		// Setup default server configuration
		$this->_default_config = array(
				'host'             => 'localhost',
				'port'             => 11211,
				'persistent'       => FALSE,
				'weight'           => 1,
				'timeout'          => 1,
				'retry_interval'   => 15,
				'status'           => TRUE,
				'instant_death'	   => TRUE,
				'failure_callback' => array($this, '_failed_request'),
		);

		// Add the memcached servers to the pool
		foreach ($servers as $server)
		{
			// Merge the defined config with defaults
			$server += $this->_default_config;

			if ( ! $this->_memcached->addServer($server['host'], $server['port'],/* $server['persistent'],*/ $server['weight']/*, $server['timeout'], $server['retry_interval'], $server['status'], $server['failure_callback'] */))
			{
				throw new Cache_Exception('Memcached could not connect to host \':host\' using port \':port\'', array(':host' => $server['host'], ':port' => $server['port']));
			}
		}

		// Setup the flags
		$this->_flags = Arr::get($this->_config, 'compression', FALSE) ? MEMCACHE_COMPRESSED : FALSE;
	}

	/**
	 * Retrieve a cached value entry by id.
	 *
	 *     // Retrieve cache entry from memcached group
	 *     $data = Cache::instance('memcached')->get('foo');
	 *
	 *     // Retrieve cache entry from memcached group and return 'bar' if miss
	 *     $data = Cache::instance('memcached')->get('foo', 'bar');
	 *
	 * @param   string  $id       id of cache to entry
	 * @param   string  $default  default value to return if cache miss
	 * @return  mixed
	 * @throws  Cache_Exception
	 */
	public function get($id, $default = NULL)
	{
		// dont get values when caching is disabled
		if(Arr::get($this->_config, 'disabled', FALSE)){
			return $default;
		}

		// Get the value from Memcached
		$value = $this->_memcached->get($this->_sanitize_id($id));

		// If the value wasn't found, normalise it
		if ($value === FALSE)
		{
			$value = (NULL === $default) ? NULL : $default;
		}

		// Return the value
		return $value;
	}

	/**
	 * Set a value to cache with id and lifetime
	 *
	 *     $data = 'bar';
	 *
	 *     // Set 'bar' to 'foo' in memcached group for 10 minutes
	 *     if (Cache::instance('memcached')->set('foo', $data, 600))
	 *     {
	 *          // Cache was set successfully
	 *          return
	 *     }
	 *
	 * @param   string   $id        id of cache entry
	 * @param   mixed    $data      data to set to cache
	 * @param   integer  $lifetime  lifetime in seconds, maximum value 2592000
	 * @return  boolean
	 */
	public function set($id, $data, $lifetime = 3600)
	{
		// If the lifetime is greater than the ceiling
		if ($lifetime > Cache_Memcached::CACHE_CEILING)
		{
			// Set the lifetime to maximum cache time
			$lifetime = Cache_Memcached::CACHE_CEILING + time();
		}
		// Else if the lifetime is greater than zero
		elseif ($lifetime > 0)
		{
			$lifetime += time();
		}
		// Else
		else
		{
			// Normalise the lifetime
			$lifetime = 0;
		}

		// Set the data to memcached
		return $this->_memcached->set($this->_sanitize_id($id), $data/*, $this->_flags*/, $lifetime);
	}

	/**
	 * Delete a cache entry based on id
	 *
	 *     // Delete the 'foo' cache entry immediately
	 *     Cache::instance('memcached')->delete('foo');
	 *
	 *     // Delete the 'bar' cache entry after 30 seconds
	 *     Cache::instance('memcached')->delete('bar', 30);
	 *
	 * @param   string   $id       id of entry to delete
	 * @param   integer  $timeout  timeout of entry, if zero item is deleted immediately, otherwise the item will delete after the specified value in seconds
	 * @return  boolean
	 */
	public function delete($id, $timeout = 0)
	{
		// Delete the id
		return $this->_memcached->delete($this->_sanitize_id($id), $timeout);
	}

	/**
	 * Delete all cache entries.
	 *
	 * Beware of using this method when
	 * using shared memory cache systems, as it will wipe every
	 * entry within the system for all clients.
	 *
	 *     // Delete all cache entries in the default group
	 *     Cache::instance('memcached')->delete_all();
	 *
	 * @return  boolean
	 */
	public function delete_all($filter=FALSE)
	{
		if($filter === FALSE){
			$result = $this->_memcached->flush();

			// We must sleep after flushing, or overwriting will not work!
			// @see http://php.net/manual/en/function.memcached-flush.php#81420
			sleep(1);

			return $result;
		} else {
			$keys = $this->_memcached->getAllKeys();
			foreach($keys as $key){
				if(strpos($key,$filter)===0){
					$this->_memcached->delete($key);
				}
			}
		}
	}

	
	/**
	 * Callback method for Memcached::failure_callback to use if any Memcached call
	 * on a particular server fails. This method switches off that instance of the
	 * server if the configuration setting `instant_death` is set to `TRUE`.
	 *
	 * @param   string   $hostname
	 * @param   integer  $port
	 * @return  void|boolean
	 * @since   3.0.8
	 */
	public function _failed_request($hostname, $port)
	{
		if ( ! $this->_config['instant_death'])
			return;

		// Setup non-existent host
		$host = FALSE;

		// Get host settings from configuration
		foreach ($this->_config['servers'] as $server)
		{
			// Merge the defaults, since they won't always be set
			$server += $this->_default_config;
			// We're looking at the failed server
			if ($hostname == $server['host'] and $port == $server['port'])
			{
				// Server to disable, since it failed
				$host = $server;
				continue;
			}
		}

		if ( ! $host)
			return;
		else
		{
			return $this->_memcached->setServerParams(
				$host['host'],
				$host['port'],
				$host['timeout'],
				$host['retry_interval'],
				FALSE, // Server is offline
				array($this, '_failed_request'
				));
		}
	}

	/**
	 * Increments a given value by the step value supplied.
	 * Useful for shared counters and other persistent integer based
	 * tracking.
	 *
	 * @param   string    id of cache entry to increment
	 * @param   int       step value to increment by
	 * @return  integer
	 * @return  boolean
	 */
	public function increment($id, $step = 1)
	{
		return $this->_memcached->increment($id, $step);
	}

	/**
	 * Decrements a given value by the step value supplied.
	 * Useful for shared counters and other persistent integer based
	 * tracking.
	 *
	 * @param   string    id of cache entry to decrement
	 * @param   int       step value to decrement by
	 * @return  integer
	 * @return  boolean
	 */
	public function decrement($id, $step = 1)
	{
		return $this->_memcached->decrement($id, $step);
	}
}