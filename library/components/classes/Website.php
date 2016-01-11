<?php
class Website
{
	// instance
	protected static $_instance = FALSE;

	// settings
	protected static $_settings = FALSE;
	

	/**
	 * set settings
	 * @param array $settings
	 */
	public static function settings($settings)
	{
		if(!is_array($settings) && is_callable(array($settings,'as_array'))){
			self::$_settings = $settings->as_array();
		} else {
			self::$_settings = $settings;
		}
	}

	
	/**
	 * get instance
	 */
	public static function instance()
	{
		if(self::$_instance === FALSE){
			self::$_instance = new Website();
		}
		return self::$_instance;
	}
	
	// cache id
	protected $_id = FALSE;
	
	// cache domain
	protected $_domain = FALSE;
	
	// request
	protected $_uri = '';

	// regex match
	protected $_match = array(
		'pattern'=>'/__not_defined__/',
		'group'=>1
	);
	
	
	/**
	 * Constructor
	 */
	protected function __construct(){}

	
	/**
	 * set uri
	 * @param string $uri
	 */
	public function uri($uri)
	{
		$this->_uri = $uri;
		// chainable
		return $this;
	}
	
	
	/**
	 * set regex match
	 * @param string $settings
	 */
	public function match($pattern,$group=0)
	{
		$this->_match = array(
			'pattern' => $pattern,
			'group' => $group
		);
		// chainable
		return $this;
	}
	
	
	/**
	 * get domain
	 * @param bool $www include www in the domain
	 * @return string
	 */
	public function domain($www = FALSE)
	{
		if($this->_domain === FALSE){
			// get domain
			if(!empty($_SERVER['SERVER_NAME'])){
				$domain = $_SERVER['SERVER_NAME'];
			} elseif(!empty($_SERVER['HTTP_HOST'])) {
				$domain = $_SERVER['HTTP_HOST'];
			} else {
				$domain = '';
			}
			if($www == FALSE){
				// strip of www
				$this->_domain = ltrim($domain,'www.');
			} 
		}
		return $this->_domain;
	}
	
	
	/**
	 * get current website id
	 * @return string
	 */
	public function id($id = FALSE)
	{		
		if($id !== FALSE){
			// set id
			$this->_id = $id;
		} else {
			// get id
			if($this->_id === FALSE){
				// filter the website from the uri
				$matches = array();
				$result = preg_match($this->_match['pattern'],$this->_uri,$matches);
				if(isset($matches[$this->_match['group']])){
					// 1. a specific website was requested in the QS. Use that one
					$this->_id = $matches[$this->_match['group']];
				} elseif(isset(self::$_settings['domains'][$this->domain()])) {
					// 2. a website was defined for the current domain: Use that one
					$this->_id = self::$_settings['domains'][$this->domain()];
				} elseif(isset(self::$_settings['default'])) {
					// 3. use the default website from the settings
					$this->_id = self::$_settings['default'];
				} else {
					// 4. Use the first configured website
					$ids = array_keys(self::$_settings['websites']);
					$this->_id = $ids[0];
				}
			}
			return $this->_id;
		}
	}
	
	
	/**
	 * get website ids
	 * @return array
	 */
	public function websites()
	{
		if(self::$_settings !== FALSE && isset(self::$_settings['websites'])){
			return array_keys(self::$_settings['websites']);
		} else {
			return array();
		}
	}

	
	/**
	 * Website::is_default()
	 * check if the given website is the default website
	 * if no website-id is given, use the current website
	 * if no default is defined, returns false
	 * 
	 * @return mixed
	 */
	public function is_default($id = FALSE)
	{
		if($id === FALSE){
			$id = $this->id();
		}
		if($id == $this->get('default')){
			return TRUE;
		}
		return FALSE;
	}
	

	/**
	 * get the base url for non-default websites
	 *
	 * @param string $website
	 * @return string
	 */
	public function base_url($id = FALSE, $default = FALSE)
	{
		if($id === FALSE){
			$id = $this->id();
		}
		
		if(self::$_settings !== FALSE){
			if(
				isset(self::$_settings['websites'][$id])
				&& isset(self::$_settings['websites'][$id]['base_url'])
				&& self::$_settings['websites'][$id]['base_url'] != FALSE
			){
				// alternate base url
				return self::$_settings['websites'][$id]['base_url'];
			} else {
				return $default;
			}
		} else {
			// current base url
			return $default;
		}
	}
	
	/**
	 * getter
	 * Will first check te base level of the settings
	 * Will then go on to the settings of the active website
	 */
	public function get($name,$default = NULL)
	{

		if(self::$_settings !== FALSE){
			if($val = Arr::get(self::$_settings,$name,FALSE)){
				return $val;
			} elseif(
				isset(self::$_settings['websites'][$this->id()])
				&& $val = Arr::get(self::$_settings['websites'][$this->id()],$name,FALSE)
			) {
				return $val;
			} else {
				return $default;
			}
		} else {
			return $default;
		}
	}
}