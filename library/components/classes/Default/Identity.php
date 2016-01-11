<?php
class Default_Identity
{
	/**
	 * Identity instance
	 *
	 * @var Identity
	 */
	protected static $_instance = FALSE;
	
	
	/**
	 * Config
	 *
	 * @var array
	 */
	protected static $_config = array(
		'session_key'  			=> 'identity',
		'session_key_backup'  	=> 'identity_backup',
		'session_storage'	   	=> 'database',
		'model_user'	   		=> 'User',
	);
	

	/**
	 * return an isntance of the identity
	 *
	 * @return Identity
	 */
	public static function instance()
	{
		// create new instance if no instance was created
		if (self::$_instance == false){
			self::$_instance = new Identity();
		} 
		
		// return data
		return self::$_instance;
	}
	
	
	
	/**
	 * Identity::config()
	 * set or get config
	 * setting config will reset instance to FALSE
	 * 
	 * @param bool $config
	 * @return array / void
	 */
	public static function config($config = FALSE)
	{
		if($config === FALSE){
			return self::$_config;
		} else {
			self::$_config = $config;
			self::$_instance = FALSE;
		}
	}
	
	
	
	/**
	 * data (stored in session)
	 *
	 * @var array
	 */
	protected $_data = array();
	
	
	protected $_user = FALSE;
	
	/**
	 * constructor can only be called statically
	 */
	protected function __construct(){}
	
	
	

	
	
	/**
	 * load user by field => value
	 * if $value is left open, $mixed will be used as id
	 * 
	 * User will be authenticated directly
	 * -> dont use withour precautions!! <-
	 * To authenticate a user, use authenticate()
	 *
	 * @param mixed $mixed id or fieldname
	 * @param mixed $value field value
	 * @return boolean
	 */
	public function load($mixed,$value=FALSE)
	{			
		// filter
		if($value===FALSE){
			$filter = $mixed;
		} else {
			$filter = array($mixed=>$value);
		}
		
		// create user model
		$user = ORM::factory(self::$_config['model_user'],$filter);

		// store the data
		if($user->loaded()){
			// save the identity
			$this->_data['id'] = $user->id;
			$this->_data['username'] = $user->username;
			$this->_data['email'] = $user->email;
			$this->_data['roles'] = $user->roles;
			$this->save_data();
			return true;
		} else {
			return false;
		}
	}
	

	/**
	 * Identity::data()
	 * set data in _data without saving
	 * 
	 * @param mixed $data
	 * @return void
	 */
	protected function data($data)
	{
		$this->_data = $data;
	}
	
	
	/**
	 * authenticate user with u/p
	 *
	 * @param string $username
	 * @param string $password
	 * @param boolean $load automatically load the user
	 * @return boolean
	 */
	public function authenticate($username,$password,$load=true)
	{
		// create user model
		$user = ORM::factory(self::$_config['model_user'],array('username'=>$username));
		$authenticated = false;
		// check password
		if($user->loaded()){
			$authenticated = $user->verify($password);
		}
		
		if($authenticated){
			if($load){
				// save the identity
				$this->_data['id'] = $user->id;
				$this->_data['username'] = $user->username;
				$this->_data['email'] = $user->email;
				$this->_data['roles'] = $user->roles;
				$this->save_data();
			}
			return true;
		} else {
			return false;
		}
	}
	
	
	
	/**
	 * store original identity
	 * assume different identity
	 *
	 * @return boolean
	 */
	public function assume($mixed)
	{
		// get session
		$session = Session::instance(self::$_config['session_storage']);

		// backup current session data, but dont overwrite backed-up data
		if($session->get(self::$_config['session_key_backup'],FALSE) === FALSE){
			$session->set(
				self::$_config['session_key_backup'],
				$session->get(self::$_config['session_key'])
			);
		}
		
		// load new identity
		$loaded = $this->load($mixed);
		
		// return result
		return $loaded;
	}
	
	
	
	/**
	 * revert back to original identity, counterpart of assume()
	 *
	 */
	public function revert()
	{
		// get session
		$session = Session::instance(self::$_config['session_storage']);

		// revert backed-up session data, but only if a backup exists
		if($session->get(self::$_config['session_key_backup'],FALSE) != FALSE){
			// restore normal data
			$session->set(
				self::$_config['session_key'],
				$session->get(self::$_config['session_key_backup'])
			);
			// destroy backup data
			$session->set(self::$_config['session_key_backup'],FALSE);
		}
		// reload data
		$this->load_data();
		
	}
	
	
	
	
	/**
	 * check if a user is authenticated
	 *
	 * @return boolean
	 */
	public function authenticated()
	{
		// load data
		$this->load_data();
		
		if(isset($this->_data['username'])){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	

	/**
	 * destroy the session + backup
	 *
	 */
	public function destroy()
	{
		// get the session by given key
		$session = Session::instance(self::$_config['session_storage']);

		// remove the data
		$session->set(self::$_config['session_key'],FALSE);
		$session->set(self::$_config['session_key_backup'],FALSE);
	}
	
	

	
	/**
	 * load data from session
	 *
	 */
	protected function load_data()
	{
		$session = Session::instance(self::$_config['session_storage']);
		$this->_data = $session->get(self::$_config['session_key'],false);
	}
	
	
	/**
	 * save data to session
	 *
	 */
	protected function save_data()
	{
		$session = Session::instance(self::$_config['session_storage']);
		$session->set(self::$_config['session_key'],$this->_data);
	}
	
	
	/**
	 * check if a user has a certain role
	 *
	 * @param string $role
	* @return boolean
	 */
	public function role($role)
	{

		// get roles
		$roles = $this->roles;
		
		// check if roles exists
		if(is_array($roles)){
			if(in_array($role,$roles)){
				return true;
			}
		}
		return false;
	}
	
	
	
	/**
	 * getters
	 *
	 * @param string $var
	 * @return string
	 */
	public function __get($var)
	{
		if($this->_data == false){
			$this->load_data();
		}
		
		if($var === 'id'){
			if(isset($this->_data['id'])){
				return $this->_data['id'];
			} else {
				return false;
			}
		}
		
		if($var === 'email'){
			if(isset($this->_data['email'])){
				return $this->_data['email'];
			} else {
				return false;
			}
		}
		
		if($var === 'username'){
			if(isset($this->_data['username'])){
				return $this->_data['username'];
			} else {
				return false;
			}
		}
		
		if($var === 'roles'){
			if(isset($this->_data['roles'])){
				return $this->_data['roles'];
			} else {
				return false;
			}
		}
		
		if($var === 'authenticated'){
			return $this->authenticated();
		}
		
				
		if($var === 'user'){
			if($this->_user === FALSE){
				if(isset($this->_data['id'])){
					$this->_user = ORM::factory(self::$_config['model_user'],$this->_data['id']);
				} 
			}
			return $this->_user;
		}
		
		if($var === 'reverted'){
			$session = Session::instance(self::$_config['session_storage']);
			$reverted = $session->get(self::$_config['session_key_backup']);
			
			if(isset($reverted['id']) && $reverted['id']!=FALSE ){
				return $reverted;
			} else {
				return FALSE;	
			}
		}
		
		return FALSE;
	}
}