<?php defined('SYSPATH') or die('No direct script access.');


/**
* custom exception
 *
 */
class Kohana_Exception extends Kohana_Kohana_Exception 
{

	public static function response(Exception $e)
	{
		// get the response
		$response = parent::response($e);
		
		//  Log the Exception, 
        Kohana_Exception::log($e);
        
        if (Kohana::DEVELOPMENT !== Kohana::$environment){
            try {
				// fire error subrequest
				// directly output result
				echo Request::factory(Route::get('error')->uri(array(
                	'controller'=> 'error',
                    'action'  => 'view'
                )))
				->post('exception',$e)
				->execute()
				->send_headers()
				->body();
				exit();
            } catch (Exception $e) {
            	
                // Clean the output buffer if one exists
                ob_get_level() and ob_clean();
 
                // Display the exception text
                echo parent::text($e);
 
                // Exit with an error status
                exit();
            }
        }
        
        // end all output buffering
		$ob = ob_get_level();
		for($i=0; $i<$ob;$i++){
			ob_end_clean();  
		}

        // return the response as usual
        return $response;
	}
	
	
	/**
	 * Logs an exception.
	 *
	 * @uses    Kohana_Exception::text
	 * @param   Exception  $e
	 * @param   int        $level
	 * @return  void
	 */
	public static function log(Exception $e, $level = Log::EMERGENCY)
	{
		if (is_object(Kohana::$log))
		{
			// Create a text version of the exception
			$error = Kohana_Exception::text($e);

			// add url to error
			$error.= "\n on ".URL::current();
			
			if(isset($_SERVER['HTTP_REFERER'])){
				$error.= "\n from ".$_SERVER['HTTP_REFERER'];
			}
			
			// Add this exception to the log
			Kohana::$log->add($level, $error, NULL, array('exception' => $e));

			// Make sure the logs are written
			Kohana::$log->write();
		}
	}
}