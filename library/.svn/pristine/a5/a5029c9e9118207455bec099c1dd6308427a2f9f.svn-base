<?php
class Acl{
	
	/**
	 * acl instance
	 *
	 * @var Acl
	 */
	private static $_instance = false;
	
	
	/**
	 * envirionment
	 *
	 * @var string
	 */
	private static $_environment = false;
	
	
	/**
	 * identity instance
	 *
	 * @var Identity
	 */
	private $_identity = false;
	
	/**
	 * roles
	 *
	 * @var array
	 */
	private $_roles = array();

	
	/**
	 * allowed settings
	 *
	 * @var array
	 */
	private $_allow = array();
	
	/**
	 * denied settings
	 *
	 * @var array
	 */
	private $_deny = array();
		
	
	/**
	 * constructor
	 * order rights object to set roles ,resources, allow, deny
	 * 
	 * $identity must have $identity->id and $identity->role
	 * 
	 * $rights must have methods:
	 * set_roles
	 * set_allow
	 * set_deny
	 *
	 * @param Identity $identity
	 * @param Rights $rights
	 */
	public function __construct($identity,$rights)
	{
		// store identity
		$this->_identity = $identity;
		
		// let the rights set the vars on this
		$rights->set_roles($this);
		$rights->set_allow($this);
		$rights->set_deny($this);
	}
	
	
	
	/**
	 * init instance
	 * order rights object to set roles ,resources, allow, deny
	 * $identity must have $identity->id and $identity->role
	 * 
	 * $rights must have methods:
	 * set_roles
	 * set_resources
	 * set_allow
	 * set_deny
	 *
	 * @param Identity $identity
	 * @param Rights $rights
	 * @return Acl
	 */
	public static function init($identity,$rights)
	{
		// create instance
		if (self::$_instance == false){
			self::$_instance = new Acl($identity,$rights);
		}
		
		// return data
		return self::$_instance;
	}
	
	
	
	/**
	 * get acl instance
	 *
	 * @return Acl
	 */
	public static function instance()
	{
		// init was not called
		if (self::$_instance == false){
			throw HTTP_Exception::factory(500,'Called Acl::instance before Acl::init');
		}
		// return data
		return self::$_instance;
	}
	

	
	/**
	 * set environment
	 *
	 * @param mixed $environment
	 */
	public static function environment($environment)
	{
		self::$_environment = $environment;
	}
	
	
	
	/**
	 * add a role
	 *
	 * @param string $identifier
	 * @param array $inheritance
	 */
	public function add_role($role,array $inheritance=array())
	{
		$this->_roles[$role] = $inheritance;
	}
	
	

	/**
	 * allow something
	 *
	 * @param string $role
	 * @param string $resource
	 * @param string $privilege
	 * @param boolean $own
	 * @param string $environment
	 */
	public function allow($role, $resource, $privilege, $own=false, $environment='1')
	{
		// add role
		if(!isset($this->_allow[$role])){
			$this->_allow[$role] = array();
		}
		
		// add environment to resource
		$resource = $resource.'_'.$environment;
		
		// add resource
		if(!isset($this->_allow[$role][$resource])){
			$this->_allow[$role][$resource] = array();
		}
		
		//add privelege
		$this->_allow[$role][$resource][$privilege.($own ? '_own' : '')]=true;
	}
	
	
	
	/**
	 * deny something
	 *
	 * @param string $role
	 * @param string $resource
	 * @param string $privilege
	 * @param boolean $own
	 */

	public function deny($role, $resource, $privilege, $own=false)
	{
		// add role
		if(!isset($this->_deny[$role])){
			$this->_deny[$role] = array();
		}
		
		// add environment to resource
		$resource = $resource.'_'.$environment;
		
		// add resource
		if(!isset($this->_deny[$role][$resource])){
			$this->_deny[$role][$resource] = array();
		}
		
		//add privelege
		$this->_deny[$role][$resource][]=$privilege.($own ? '_own' : '');
	}
	
	
	
	/**
	 * check if identity is allowed to do privilege on resources
	 * 
	 *
	 * @param string $resource
	 * @param string $privilege
	 * @param int $owner_id
	 * @return boolean
	 */
	public function allowed($resource, $privilege, $owner_id=false, $environment=false)
	{
		// check if user is owner
		if($owner_id!==false && $owner_id===$this->_identity->id){
			$is_owner = true;
		} else {
			$is_owner = false;
		}

		// add environment to resource
		if($environment){
			$resource = $resource.'_'.$environment;
		} elseif (self::$_environment!==FALSE){
			$resource = $resource.'_'.self::$_environment;
		} 
		
		
		// get allowed and denied
		$allowed = $this->get_allowed($resource, $privilege, $is_owner);
		$denied = $this->get_denied($resource, $privilege, $is_owner);
		
		// return permission
		return $denied ? false : $allowed;
	}
	
	
	
	
	

	/**
	 * Acl::roles()
	 * return all the roles that the current identity has through inheritance
	 * 
	 * @param bool $role
	 * @param bool $accumulated
	 * @return
	 */
	public function roles($role = FALSE, $accumulated = FALSE)
	{
		
		// first call, set accumulated to empty array
		if($accumulated === FALSE){
			$accumulated = array();
		}
		
		if($role == FALSE){
			// first call: looked up roles are just the identity roles
			$roles = $this->_identity->roles;
		} else {
			// recursive call: look up roles for given role
			$roles = $this->_roles[$role];
		}
		
		// loop through  roles
		foreach($roles as $role){
			// add  role to accumulated
			if(!in_array($role,$accumulated)){
				array_unshift($accumulated,$role);
				// RECURSIVE: do the same for each inherited roles
				$accumulated = $this->roles($role,$accumulated);
			}
	
		}
		return $accumulated;
	}
	
	

	/**
	 * get permission for privilege on resource for _identity
	 * given that identity is the owner or not
	 * 
	 * method is recursive
	 *
	 * @param string $resource
	 * @param string $privilege
	 * @param boolean $is_owner
	 * @param string $role
	 * @return boolean
	 */
	protected function get_allowed($resource, $privilege, $is_owner, $inheritedRole=FALSE)
	{
		if($inheritedRole==FALSE){
			$roles = $this->_identity->roles;
			if(!is_array($roles)){
				$roles = array();
			}
		} else {
			$roles = array($inheritedRole);
		}

		foreach($roles as $role){
			if(isset($this->_allow[$role][$resource][$privilege]) ||  ($is_owner && isset($this->_allow[$role][$resource][$privilege.'_own']))){
				// privilege granted
				return true;
			} else if(isset($this->_roles[$role]) && is_array($this->_roles[$role])){
				// check for inherited roles
				foreach($this->_roles[$role] as $inheritedRole){
					if($this->get_allowed($resource, $privilege, $is_owner,$inheritedRole)){
						// privilege granted
						return true;
					}
				}
			}
		}
		// not granted
		return false;
	}
	
	

	private function get_denied($resource, $privilege, $is_owner)
	{
		// TODO create this function
		// not denied
		return false;
	}
}