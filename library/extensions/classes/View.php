<?php defined('SYSPATH') or die('No direct script access.');

class View extends Kohana_View 
{
	
	/**
	 * cache instance
	 */ 
	protected static $_cache = FALSE;
	
	/**
	 * counter for unique view instance id's
	 */ 
	protected static $_count = 0;
	
	/**
	 * map that holds the view instances by id
	 * also child and parent if present
	 */ 
	protected static $_map = array();
	
	/**
	 * when rendering starts, the rendering view-id is stored here
	 */ 
	protected static $_rendering_id = FALSE;
	
	/**
	 * for nested blocks: keep track of the block stack
	 */ 
	protected static $_block_stack = array();
	
	/**
	 * for nested wraps: keep track of the wrap stack
	 */
	protected static $_wrap_stack = array();
	
	/**
	 * CSS / JS assets
	 */
	protected static $_assets = array();
	
	/**
	 * cached files
	 */
	protected static $_files = array();
	
	
	/**
	 * Add a cache instance
	 */ 
	public static function cache($cache)
	{
		self::$_cache = $cache;
	}
	
	
	/**
	 * Overwrites Kohana_View::factory
	 * Add a instance id to the View instance
	 * Add the instance to an internal map
	 */ 
	public static function factory($file = NULL, array $data = NULL)
	{
		// create new instance
		$view = parent::factory($file, $data);
		
		// assign a unique id
		$id = ++self::$_count;
		$view->_id = $id;
		
		// add it to the map
		self::$_map[$id] = array(
			'view'=>$view,
			'parent'=>FALSE
		);

		return $view;
	}
	
	
	/**
	 * Extend a different view file
	 */ 
	public static function extend($file)
	{
		// get current rendering view
		$view = self::$_map[self::$_rendering_id]['view'];
		
		// create new view with current rendering data
		$parent_view = View::factory($file,$view->_data);
		
		// add it's id to the currently rendering objct as 'parent' property
		self::$_map[self::$_rendering_id]['parent']=$parent_view->_id;
	}
	
	
	/**
	 * shorthand for start_block  content end_block()
	 */ 
	public static function block($identifier,$content='')
	{
		View::start_block($identifier);
		echo $content;
		View::end_block();
	}
	
	
	/**
	 * start the rendering of a contentblock
	 */ 
	public static function start_block($identifier)
	{	
		// add inbfo to the block stack
		self::$_block_stack[]= array(
			'view_id'=>self::$_rendering_id,
			'identifier'=>$identifier
		);
		// start buffering
		ob_start();
	}
	
	
	/**
	 * complete the rendering of a contentblock
	 */ 
	public static function end_block($identifier='')
	{
		// get the block
		$output = ob_get_contents();
		ob_end_clean();
			
		// get the block info
		$block = array_pop(self::$_block_stack);
		$view_id = $block['view_id'];
		$identifier = $block['identifier'];
		
		// get the view in which the block was started and ended
		$view = self::$_map[$view_id]['view'];
		
		// set the output as a block in the view
		// but only if it wasn't allready set
		if(!isset($view->_blocks[$identifier])){
			$view->_blocks[$identifier] = $output;
		}
		
		// check if this is the base view
		// - if so: echo the block, as it is the final destination
		// check if the block stack is not empty
		// if so: echo the block, as it is a nested block and this is this block's final destination
		$parent_view_id = self::$_map[$view_id]['parent'];
		if($parent_view_id === FALSE || count(self::$_block_stack)>0){
			echo $view->_blocks[$identifier];
		}
	}
	
	
	/**
	 * Start decoration of part of the view
	 * the definined $kohana_view_filename will have to have a <?php echo $identifier; ?>
	 * to display the part that is decorated
	 * if no $identifier is supplied, $_content will be the name that is used
	 *
	 * @param string $kohana_view_filename
	 * @param string $identifier
	 */
	public static function start_wrap($kohana_view_filename,$vars=array(),$identifier=false)
	{
		// deafult id is _content
		if(!$identifier){
			$identifier = "_content";
		}
		// put the decorator on the stack
		self::$_wrap_stack[]= array(
			'view_filename'=>$kohana_view_filename,
			'vars'=>$vars,
			'identifier'=>$identifier
		);
		
		// start output buffering
		ob_start();
	}
	
	
	/**
	 * Mark the end of the chunk that will be decorated
	 * 
	 * The chunk will be picked up from the ob and rendered in the supplied view file
	 * 
	 * The results is then echo'd
	 */
	public static function end_wrap()
	{
		// get the chunk to decorate
		$output = ob_get_contents();
		ob_end_clean();
		
		// get the associated decoration file
		$wrap = array_pop(self::$_wrap_stack);
		$kohana_view_filename = $wrap['view_filename'];
		$vars = $wrap['vars'];
		$identifier = $wrap['identifier'];

		// get the path to the view file
		if (($path = Kohana::find_file('views', $kohana_view_filename)) === FALSE)
		{
			throw new Kohana_View_Exception('The requested view :file could not be found', array(
				':file' => $kohana_view_filename,
			));
		}
		// set created content in decorator
		$vars[$identifier]=$output;
		
		// render 
		echo self::capture($path, $vars);
	}
	
	
	/**
	 * Add asset to specific asset group
	 * @param string $group
	 * @param string $html
	 * @param bool $duplicate push to assets regardless of element existing
	 */
	public static function asset($group,$html='',$duplicate=FALSE)
	{
		// create group array
		if(!isset(self::$_assets[$group])){
			self::$_assets[$group] = array();
		}
		// add html to group array
		if(!in_array($html,self::$_assets[$group]) || $duplicate == TRUE){
			self::$_assets[$group][]=$html;
		}
	}
	
	
	/**
	 * Get accumulated assets, provide no group for all assets
	 * @param string $group
	 * @return array
	 */
	public static function assets($group = FALSE)
	{
		if($group === FALSE){
			return self::$_assets;
		} elseif(isset(self::$_assets[$group])){
			return self::$_assets[$group];
		} else {
			return array();
		}
	}
	

	/**
	 * Captures the output that is generated when a view is eval'd
	 * The view data will be extracted to make local variables. This method
	 * is static to prevent object scope resolution.
	 *
	 *     $output = View::capture($file, $data);
	 *
	 * @param   string  $kohana_view_filename   filename
	 * @param   array   $kohana_view_data       variables
	 * @return  string
	 */
	protected static function capture($kohana_view_filename, array $kohana_view_data)
	{
		// find the file and store the contents. Do this only once
		if(!isset(self::$_files[$kohana_view_filename])){
			if (($path = Kohana::find_file('views', $kohana_view_filename)) === FALSE)
			{
				throw new View_Exception('The requested view :file could not be found', array(
					':file' => $kohana_view_filename,
				));
			}
			// Store the file contents statically
			static::$_files[$kohana_view_filename] = file_get_contents($path);
		}
		
		// Get the contents
		$contents = self::$_files[$kohana_view_filename];
		
		// Import the view variables to local namespace
		extract($kohana_view_data, EXTR_SKIP);

		if (View::$_global_data) {
			// Import the global view variables to local namespace
			extract(View::$_global_data, EXTR_SKIP | EXTR_REFS);
		}

		// Capture the view output
		ob_start();

		try {
			// eval the view contents
			eval('?>'.$contents.'<?php ');
		}
		catch (Exception $e)
		{
			// Delete the output buffer
			ob_end_clean();

			// Re-throw the exception
			throw $e;
		}
		// Get the captured output and close the buffer
		return ob_get_clean();
		
		
		
		/*
		// Prepare for errors
		$error = TRUE;
		
		// override error handler for now to catch uncatchable exceptions
		set_error_handler(function($code, $error, $file = NULL, $line = NULL) use( & $error ){
			$error = TRUE;
		});

		// Start capture the view output
		ob_start();
		
		try {
			// eval the view contents
			$success = @eval('?>'.$contents.'<?php ');
		} catch (Exception $e) {
			// catch exceptions
			$error = TRUE;
		}
		// back to regular error handling
		restore_error_handler();
		
		if($success === FALSE || $error){
			// dont use the output up til now
			ob_end_clean();
			var_dump(Kohana::find_file('views', $kohana_view_filename));
			exit;
			// include the erroring file for real, to make debugging easier
			include(Kohana::find_file('views', $kohana_view_filename));

			// we have to return a string
			return '';
		} else {
			// return the bufered result
			return ob_get_clean();
		}
		
		*/
		
	}
	
	
	
	/**
	 * view instance id
	 */ 
	protected $_id = FALSE;
	
	/**
	 * view instance rendered blocks
	 */ 
	protected $_blocks = array();

	
	
	public function __construct($file = NULL, array $data = NULL)
	{
		if ($file !== NULL)
		{
			// store requested filename
			$this->_file = $file;
		}

		if ($data !== NULL)
		{
			// Add the values to the current data
			$this->_data = $data + $this->_data;
		}
	}
	
	

	/**
	 * Overwrites Kohana_View::render
	 * Check if a call to extend was done
	 * if so: render that parent too 
	 */
	public function render($file = NULL)
	{
		// remember currently rendering id
		if(self::$_rendering_id !== FALSE){
			$previous_rendering_id = self::$_rendering_id;
		} else {
			$previous_rendering_id = FALSE;
		}
		
		// set the current rendering id
		self::$_rendering_id = $this->_id;
		
		// render a block
		$output = self::capture($this->_file, $this->_data);
		
	
		// check if the view was extended from a parent
		if(self::$_map[self::$_rendering_id]['parent'] !== FALSE){
			// get parent view
			$parent_id = self::$_map[self::$_rendering_id]['parent'];
			$parent_view = self::$_map[$parent_id]['view'];
			
			// overwrite blocks in parentview with blocks from this view
			foreach($this->_blocks as $identifier=>$content){
				$parent_view->_blocks[$identifier] = $content;
			}
			 
			// render the parent, this will set the rendinrg_id to the parent's
			// will go deeper as subsequent calls to View::extend are done
			$output = $parent_view->render();
		}
		
		// restore previous rendering id
		if($previous_rendering_id !== FALSE){
			self::$_rendering_id = $previous_rendering_id;
		} else {
			self::$_rendering_id = FALSE;
		}
		
		return $output;
	}


	
	
	/**
	 * append a value to a var that was allready set
	 * create a new var if var doesn't exist
	 */ 
	public function append($var,$append)
	{
		$val = isset($this->_data[$var])?$this->_data[$var]:NULL;
		
		if($val === NULL){
			$this->set($var,$append);
		} elseif (is_string($val)){
			$this->set($var,$val.$append);
		} elseif (is_array($val)){
			$val[]=$append;
			$this->set($var,$val);	
		} 
	}
}