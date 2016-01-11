<?php defined('SYSPATH') or die('No direct script access.');


// -- Profiling --------------------------------------------------------------

/**
 * Define the start time of the application, used for profiling.
 */
if ( ! defined('KOHANA_START_TIME')){
	define('KOHANA_START_TIME', microtime(TRUE));
}

/**
 * Define the memory usage at the start of the application, used for profiling.
 */
if ( ! defined('KOHANA_START_MEMORY')){
	define('KOHANA_START_MEMORY', memory_get_usage());
}




// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT)){
	// Application extends the core
	require APPPATH.'classes/Kohana'.EXT;
} else {
	// Load empty core extension
	require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('America/Chicago');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');




// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-us');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV'])){
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * set APPLICATION_ENV
 */
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));


/**
 * init extensions module first
 * This way the custom Exception handler will be used instead of the kohana one
 * Extensions will be included again in the normal modules call
 * A bit dirty, but is works
 * 
 * The normal modules should be included after the config setup for ::config to work (amongst others)
 * 
 */
Kohana::modules(array('extensions'	=> LIBRARYPATH.'extensions'));


/**
 * Initialize Kohana, setting the default options.
 */
Kohana::init(require(COMMONPATH.'config/'.APPLICATION_ENV.'/settings.php'));


/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));


/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File('config'));


/**
 * load env configs config from common
 */
Kohana::$config->attach(new Config_File('config/'.APPLICATION_ENV));


/**
 * load plugin configs
 */
Kohana::$config->attach(new Config_File('config/plugin'));


/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(

	// common application parts
	'common'		=> COMMONPATH,
	
	// library modules
	'components'	=> LIBRARYPATH.'components',
	'extensions'	=> LIBRARYPATH.'extensions',
	
	// backend library module
	'library_backend'	=> LIBRARYPATH.'backend',
    
   	// common application library module
	'library_common'	=> LIBRARYPATH.'common',
    
	
	// kohana modules
	// 'auth'       => MODPATH.'auth',       // Basic authentication
	'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	 'database'   => MODPATH.'database',   // Database access
	 'image'      => MODPATH.'image',      // Image manipulation
	 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	 //'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	
	
	// plugins
	//'search'		=> LIBRARYPATH.'plugins/search',
	//'find'			=> LIBRARYPATH.'plugins/find',
	//'paginate'		=> LIBRARYPATH.'plugins/paginate',
	//'alphabet'		=> LIBRARYPATH.'plugins/alphabet',
	//'seo'			=> LIBRARYPATH.'plugins/seo',
	
	// 3rd party plugins
	//'swift' => VENDORPATH.'swift',
));

/**
 * set up the routes
 */
require(COMMONPATH.'routes.php');



/**
 * salt cookie
 */
Cookie::$salt = 'w3wqefqewrjklsdfsds5rsdfrgtfdrav';