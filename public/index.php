<?php
ini_set('display_errors',TRUE);
error_reporting(E_ALL);

/**
* default app is frontend
*/
$application = 'frontend'; 


/**
* set application to backend
* when 'admin' is in the url
*/
// TODO: make this more fool proof
if(!empty($_SERVER['PATH_INFO'])){
	$pathParts = explode('/',$_SERVER['PATH_INFO']);
	if(in_array('admin',$pathParts)){
		$application = 'backend';
	}
} 


/**
 * Set paths
 *
 */

// website root
define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

// basepath of the website
define('BASEPATH', realpath('../').DIRECTORY_SEPARATOR);

// path to yuna library
define('LIBRARYPATH', realpath('../library').DIRECTORY_SEPARATOR);


// path to the common application
define('FRONTENDPATH', realpath('../application/frontend').DIRECTORY_SEPARATOR);

// path to the common application
define('BACKENDPATH', realpath('../application/backend').DIRECTORY_SEPARATOR);

// path to the common application
define('COMMONPATH', realpath('../application/common').DIRECTORY_SEPARATOR);


// path to the application
define('APPPATH', realpath('../application/'.$application).DIRECTORY_SEPARATOR);


// path to vendor libraries
define('VENDORPATH', realpath('../vendor').DIRECTORY_SEPARATOR);

// Kohana paths
define('SYSPATH', realpath(VENDORPATH.'kohana/system').DIRECTORY_SEPARATOR);
define('MODPATH', realpath(VENDORPATH.'kohana/modules').DIRECTORY_SEPARATOR);

// path to uploaded files
define('FILESPATH', realpath('files').DIRECTORY_SEPARATOR);

// path to temp dir
define('TEMPPATH', realpath('../application/temp').DIRECTORY_SEPARATOR);

// Php extension
define('EXT', '.php');

// Bootstrap the application
require APPPATH.'bootstrap.php';



// Run it
echo Request::factory()
	->execute()
	->send_headers()
	->body();

// Playground;
//var_dump(Kohana::modules());
//var_dump($_SERVER);
//var_dump(Request::factory());


// profiling
if (Kohana::$environment == Kohana::DEVELOPMENT && isset($_GET['profile']) ) {
	echo View::factory('profiler/stats');
}

?>