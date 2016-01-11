<?php
$paths = array(
	'js/',
	'vendor/',
	'library/js/',
);


if(isset($_GET['file'])){
	// get single file 
	// replace .js with ''
	$file = str_replace('.js','',$_GET['file']);
	// replace / with '.'
	$file = str_replace('/','.',$file);
	// load and output file
	$loader = new Loader($paths);
	$loader->load($file);
	output_script($loader->contents(),$file);
	
}elseif(isset($_GET['files'])){
	// get deps from GET
	$dependencies = explode(',',$_GET['files']);
	// start combined array with the original dependencies
	$combined = $dependencies;

	foreach($dependencies as $dependency){
		// load dependency
		$loader = new Loader($paths);
		$loader->load($dependency);
		// parse depency to get dependant files
		$parser = new Parser();
		// add extra dependencies
		$combined = array_merge($combined,$parser->dependencies($loader->contents()));
	}
	//remove doubles
	$combined = array_unique($combined);
	
	// build bundle
	$bundle = '';
	foreach($combined as $dependency){
		$loader = new Loader($paths);
		$loader->load($dependency);
		$bundle .= $loader->contents();
		$bundle .= "\n\n";
	}

	// create hash
	$str = implode($dependencies,',');
	$hash = 0;
	if ($str !== null && strlen($str) > 0) {
		for ($i = 0; $i < strlen($str); $i++) {
			$multi = 100*$i;
			$hash = $hash + ($multi * ord($str[$i]));
		}
	}
	// create filename
	$file = 'bundle_'.$hash.'.js';
	
	// write bundle
	file_put_contents('js/bundles/'.$file,$bundle);
	
	// output script
	output_script($bundle,$file);
}


/**
 * output a js script with the correct headers
 *
 * @param string $script
 */
function output_script($script,$file)
{
	header("Content-type: application/x-javascript");
	echo $script;
	echo '//@ sourceURL='.$file;
}


class Loader
{
	protected $_paths = array();
	protected $_path = FALSE;
	protected $_contents = FALSE;
	
	/**
	 * init class with paths
	 *
	 * @param array $paths
	 */
	public function __construct($paths)
	{
		$this->_paths = $paths;
	}
	
	/**
	 * load a file
	 *
	 * @param string $file
	 * @return Loader
	 */
	public function load($file)
	{
		// reset vars
		$this->_path = FALSE;
		$this->_contents = FALSE;
		
		// get dots
		$file = str_replace('%2E','.',$file);
		// replace unwanted
		$file = preg_replace('/[^a-z0-9-_\.]/i','',$file);
		// create fspath
		$file = str_replace('.',DIRECTORY_SEPARATOR,$file).'.js';
		
		// find & load the file
		foreach($this->_paths as $path){
			// check if file exists
			if(file_exists($path.$file)){
				// save the path
				$this->_path = $path.$file;
				// get the contents
				$this->_contents = file_get_contents($path.$file);
				// dont look any further
				break;
			}
		}
		// chainable
		return $this;
	}
	
	/**
	 * get loaded contents
	 *
	 * @return mixed
	 */
	public function contents()
	{
		return $this->_contents;
	}
	
	/**
	 * get found path
	 *
	 * @return mixed
	 */
	public function path()
	{
		return $this->_path;
	}
}





class Parser
{
	protected $_token = ''; 
	protected $_tokens = array();
	protected $_dependency = '';
	protected $_dependencies = array();
	protected $_scope = 'global';
	protected $_nest_depth = 0;
	
	protected $_eot = array(' ',';',"\n",':','.','=','(',')');
	protected $_tc = array('.','(',')');

	public function dependencies($script)
	{
		// strip /* */ comments
		$script = preg_replace('/\/\*(.*)\*\//s','',$script);
		// strip // comments
		$script = preg_replace('/\/\/(.*)/','',$script);
		
		for($i = 0; $i < strlen($script); $i++){
			// get one char at a time
			$char = $script[$i];
			
			// in global scope...
			if($this->_scope === 'global'){
				
				// check if breaking character
				if(in_array($char,$this->_eot)){
					
					// store & reset token
					if($this->_token != ''){
						$this->_tokens[]=$this->_token;
						$this->_token = '';
					}
					
					// check if token char
					if(in_array($char,$this->_tc)){
						// check for '('
						if($char == '('){
							if(	
								count($this->_tokens) >= 2
								&&
								$this->_tokens[count($this->_tokens)-2] == '.'
								&& (
									$this->_tokens[count($this->_tokens)-1] == 'use'
									||
									$this->_tokens[count($this->_tokens)-1] == 'extend'
								)
							) {
								// defining dependencies
								$this->_scope = 'dependency';
							} else {
								// nested in something else
								$this->_scope = 'nested';
								$this->_nest_depth = 1;
							}
						} else if(
							count($this->_tokens) >= 2
							&& $this->_tokens[count($this->_tokens)-2] == '.'
							&& $this->_tokens[count($this->_tokens)-1] == 'as'
						) {			
							// when we've arrived at the global 'as' function
							// break off the loop. there will be no more vaild dependencies
							break;
						} else {
							// just store it as a token
							$this->_tokens[]=$char;
						}
					}
				} else {
					// just build token
					$this->_token.=$char;
				}
			} else if($this->_scope === 'dependency') {
				// dependency scope in .use() or .extend()
				
				if($char == ')'){
					// done for now.
					// store it and return to global scope
					if($this->_dependency != ''){
						$this->_dependencies[] = $this->_dependency;
						$this->_dependency = '';
					}
					$this->_scope = 'global';
				} else {
					// build the dependency
					$this->_dependency.=$char;
				}
			} else if($this->_scope == 'nested') {
				// nested scope. do nothing but wait to get out
				
				// add or remove a ( or )
				if($char == '('){
					$this->_nest_depth++;
				} else if($char == ')'){
					$this->_nest_depth--;
				}
				// back at the root
				if($this->_nest_depth == 0){
					$this->_scope = 'global';
				}
			}
		}
		
		
		$dependencies = array();
		for($i=0;$i<count($this->_dependencies) ; $i++){
			// remove quotes and whitespace
			$cleaned = str_replace(array('"',"'",' '),'',$this->_dependencies[$i]);
			// add comma exploded to previously found entries
			$dependencies  = array_merge($dependencies,explode(',',$cleaned));
		}
		
		// remove duplicates
		$dependencies = array_unique($dependencies);
		
		// done!
		return $dependencies;
	}
}