<?php
class Model_Default_Rights extends Model 
{
	
	protected $_environments = array();
	
    
    protected $_roles = array();
	

    protected $_allow = array();
	
    
	/**
	 * constructor -> pass in website is needed
	 *
	 * @param array $environments
	 */
	public function __construct($environments=array())
	{
		$this->_environments = $environments;
	}
	
	
	/**
	 * Set roles on $acl object
	 *
	 * @param Acl $acl
	 */
	public function set_roles($acl)
	{
		foreach($this->_roles as $role=>$inheritance){
			$acl->add_role($role,$inheritance);
		}
	}
	
    
    
	/**
	 * Set allow on $acl object
	 *
	 * @param Acl $acl
	 */
	public function set_allow($acl)
	{
		// allow
		foreach($this->_environments as $environment){
			foreach($this->_allow as $role=>$rights){
				foreach($rights as $resource=>$privileges){
					foreach($privileges as $privilege){
						if(is_array($privilege)){
							$own = (isset($privilege[1]) && $privilege[1]===true)?true:false;
							$privilege = $privilege[0];
						} else {
							$own = false;
						}
						$acl->allow($role, $resource,$privilege,$own,(string)$environment);
					}
				}
			}
		}
	}
	
	
	/**
	 * Set deny on $acl object
	 *
	 * @param Acl $acl
	 */
	public function set_deny()
	{
		//$acl->deny($role, $resource.'_'.$website, $privilege,$own);
	}
	
	
	/**
	 * getters
	 */
 	public function environments()
	{
		return $this->_environments;
	}
	
	public function roles()
	{
		return $this->_roles;
	}
	
	public function allow()
	{
		return $this->_allow;
	}
}