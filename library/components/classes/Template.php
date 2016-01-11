<?php

/**
* Template class takes Mustache style notation sort of
 * {{var}}
 * {{for vars as var}}
 * {{/for}}
 * {{for vars as key:val}}
 * {{/for}}
 * 
 * {{if $var == 'foo'}} use dollar sign vars
 * {{elsif $var == 'bar'}}
 * {{else}}
 * {{/if}}
* 
* compiles to <?php echo $var; ?>
* 
* renders the compiled view with data
* 
 * 
 * TODO: Real mustache tags like:
 * 
 * {{var}}
 * 
 * {{var.prop}}
 * 
 * {{var:prop}}

 * {{#vars}}
 *		{{prop}}
 * {{/vars}}
 * 
 * {{?foo=='bar'}}
 *		something
 * {{??foo=='baz'}}
 *		seomething else
 * {{??}}
 *		last resort
 * {{/?}}
 * 
 * {{* literal }}
 * 
 * {{! comment }}
 * 
*/
class Template
{
	protected static $_data_global = array();
	
	protected $_data = array();
	protected $_template = '';
	protected $_compiled = FALSE;
	
	
	/**
	 * factory for text objects
	 *
	 * @param string $text
	 * @return Text
	 */
	public static function factory($template,$data=FALSE)
	{
		// create template
		return new Template($template,$data);
	}	
	
	
	/**
	 * Template::__construct()
	 * raw template string
	 * 
	 * @param mixed $template
	 * @param array $data
	 * @return void
	 */
	protected function __construct($template,$data=FALSE)
	{
		$this->_template = $template;
		
		if($data!==FALSE && is_array($data)){
			$this->_data = $data;
		}
	}
	
	
	/**
	 * Template::set_global()
	 * 
	 * @param string $var
	 * @param mixed $val
	 * @return Template
	 */
	public static function set_global($var,$val='')
	{
		if(is_array($var)){
			foreach($var as $key=>$val){
				self::$_data_global[$key] = $val;
			}
		} else {
			self::$_data_global[$var] = $val;
		}
	}
	
	
	/**
	 * Template::bind_global()
	 * 
	 * @param string $var
	 * @param mixed $val
	 * @return Template
	 */
	public static function bind_global($var,$val)
	{
		self::$_data_global[$var] =& $val;
	}
	
	
	/**
	 * Template::set()
	 * 
	 * @param string $var
	 * @param mixed $val
	 * @return Template
	 */
	public function set($var,$val='')
	{
		if(is_array($var)){
			foreach($var as $key=>$val){
				$this->_data[$key] = $val;
			}
		} else {
			$this->_data[$var] = $val;
		}
		
		return $this;
	}
	
	
	/**
	 * Template::bind()
	 * 
	 * @param string $var
	 * @param mixed $val
	 * @return Template
	 */
	public function bind($var, & $val)
	{
		$this->_data[$var] =& $val;

		return $this;
	}
	

	/**
	 * Template::compiled()
	 * 
	 * @return compiled template string
	 */
	public function compiled($compiled=FALSE)
	{
		if($compiled===FALSE){
			// get compiled
			if($this->_compiled === FALSE){
				$this->compile();
			}
			return $this->_compiled;
		} else {
			// set compiled
			$this->_compiled = $compiled;
		}
	}

	
	/**
	 * Template::render()
	 * 
	 * @param assoc array $data
	 * @return string
	 */
	public function render()
	{
		// capture result
		$result = $this->capture();
		
		// return it
		return $result;
	}
	
	
	/**
	 * Template::compile()
	 * 
	 * @return compiled template string
	 */
	public function compile()
	{
		$compiled = $this->_template;
		
		// simple replacements
		$compiled = str_replace(
			array("\n",'<?php','<?','?>','{{/if}}','{{else}}','{{/for}}'),
			array(" \n",'','','','<?php endif; ?>','<?php else: ?>','<?php endforeach; endif; ?>'),
			$compiled
		);

		// replace {{for var as foo}}
		$compiled = preg_replace_callback(
			'/(\{\{for\s+)(\S+)(\s+as\s+)(\S+)(\s*\}\})/i',
			array($this,'callback_replace_foreach'),
			$compiled
		);
		
		// replace {{for var as foo : bar}}
		$compiled = preg_replace_callback(
			'/(\{\{for\s+)(\S+)(\s+as\s+)(\S+)(\s+\:\s+)(\S+)(\s*\}\})/i',
			array($this,'callback_replace_foreach_assoc'),
			$compiled
		);
		
		// replace {{if [condition]}} or {{elseif [condition]}}
		$compiled = preg_replace_callback(
			'/(\{\{(elseif|if){1})(.*)(\}\})/i',
			array($this,'callback_replace_if'),
			$compiled
		);
		
		// replace {{var}}
		$compiled = preg_replace_callback(
			'/(\{\{)([^\}]+)(\}\})/i',
			array($this,'callback_replace_echo'),
			$compiled
		);
		
		/*
		// replace {image:[controller]:[id]:[size]:[alt]}
		$compiled = preg_replace_callback(
			'/(\{image\:{1})([a-zA-Z0-9]+)(\:{1})([0-9]+)(\:{1})([a-zA-Z0-9\_\-]+)((\:{1})([^\{\}]*)){0,1}(\}{1})/i',
			array($this,'callback_replace_image'),
			$compiled
		);
		*/
		
		/*
		// replace {href:[id]}
		$compiled = preg_replace_callback(
			'/(\{href\:{1})([0-9]+)(\}{1})/i',
			array($this,'callback_replace_href'),
			$compiled
		);
		*/

		// store compiled
		$this->_compiled = $compiled;

		// return compiled
		return $this->_compiled;
	}
	
	

	function callback_replace_echo($matches)
	{
		// filter out unwanted chars
		$var = preg_replace('/[^a-zA-Z0-9\-\_\.]+/i','',$matches[2]);
		
		// replace $foo.bar with $foo["bar"];
		$var = preg_replace('/\.{1}([a-zA-Z0-9\-\_]+)/i','["$1"]',$var);
		
		$string = '<?php echo isset($'.$var.') ? (is_string($'.$var.') || is_numeric($'.$var.') ? $'.$var.': (is_array($'.$var.') ? implode("",$'.$var.') : "")) : ""; ?>';
		return $string;
	}
	
	
	function callback_replace_foreach($matches)
	{
		$array = preg_replace('/[^a-zA-Z0-9\-\_]+/i','',$matches[2]);
		$val = preg_replace('/[^a-zA-Z0-9\-\_]+/i','',$matches[4]);
		$string = '<?php if(isset($'.$array.') && is_array($'.$array.')): foreach ($'.$array.' as $'.$val.'): ?>';
		return $string;
	}
	
	
	function callback_replace_foreach_assoc($matches)
	{
		$array = preg_replace('/[^a-zA-Z0-9\-\_]+/i','',$matches[2]);
		$key = preg_replace('/[^a-zA-Z0-9\-\_]+/i','',$matches[4]);
		$val = preg_replace('/[^a-zA-Z0-9\-\_]+/i','',$matches[6]);
		$string = '<?php if(isset($'.$array.') && is_array($'.$array.')): foreach ($'.$array.' as $'.$key.'=>$'.$val.'): ?>';
		return $string;
	}
	
	
	
	function callback_replace_if($matches)
	{
		// get condition part
		$condition = $matches[2].' ';
		
		// remove redundant whitespace
		$condition = preg_replace('/[\s\n\r\t\v\f]+/',' ',$condition);
		
	
		// sanatize function calls
		$condition = preg_replace_callback(
			'/([^\s\;\(\)]+)([\s\;\(\)]{1})/i', // one or more non space chars followed by 0+ spaces and(
			array($this,'callback_evaluate_token'),
			$condition
		);
		// return statement
		return '<?php '.$matches[1].' ('.$condition.'): ?>';
	}
	

	
	function callback_evaluate_token($matches)
	{
		$token = strtolower(trim($matches[1]));
		
		if($token==''){
			// empty
			return $token;
		} elseif(is_numeric($token)){
			// number
			return $token;
		} elseif(preg_match('/^\"{1}[a-zA-Z0-9\-\_]*\"{1}$/',$token)){
			// "string"
			return $token;
		} elseif(preg_match('/^\'{1}[a-zA-Z0-9\-\_]*\'{1}$/',$token)){
			// 'string'
			return $token;
		} elseif(preg_match('/^\${1}[a-zA-Z0-9\-\_\<\>\!\=\'\"]+$/',$token)){
			// $var
			// $var<=
			// $var<="var"
			return $token;
		} elseif(in_array($token,array('isset','!isset','empty','!empty','and','or','&&','||','==','===','!=','!==','<>','>=','<=','>','<','true','false'))){
			// valid preset
			return $token;
		} else {
			// not valid
			return '';
		}
	}
	

	/*
	function callback_replace_image($matches)
	{
		$controller = $matches[2];
		$id = $matches[4];
		$size = $matches[6];
		$alt = $matches[9];
	
		$model = ORM::factory(ucfirst($controller),$id);

		if($model->loaded()===TRUE){
			$string = '<img src="'.$model->src($size).'" alt="'.$alt.'" title="'.$alt.'"/>';
		} else {
			$string = '';
		}
		return $string;
	}
	*/
	
	/*
	function callback_replace_href($matches)
	{
		$id = $matches[2];

		$model = ORM::factory('Link',$id);
		
		if($model->loaded()===TRUE){
			$string = $model->url();
		} else {
			$string = '';
		}
		return $string;
	}
	*/
	
	

	/**
	 * capture view output from widget
	 *
	 * @param string $view
	 * @param array $data
	 * @return string
	 */
	public function capture()
	{
		// Import the template variables to local namespace
		extract(self::$_data_global, EXTR_SKIP);
		extract($this->_data, EXTR_SKIP);

		// Capture the view output
		ob_start();
		
		// eval the view field from the model
		try{
			eval('?>'.$this->compiled().'<?php ');
		} catch (Exception $e) {
			// Delete the output buffer
			ob_end_clean();
			// Re-throw the exception
			throw $e;
		}
		// Get the captured output and close the buffer
		$captured = ob_get_clean();	
		

		
		return $captured;
	}
}
	