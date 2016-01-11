<?php
class Model_Rights extends Model_Default_Rights
{
	protected $_roles = array(
		'user'=>array(),
		'member'=>array('user'),
		// managers will be added in later
		'staff'=>array(),
		'admin'=>array('staff'), 
		'super'=>array('admin')
	);

    protected $_allow = array(
		'user'=>array(
			'Frontend'=>array(
				'access'
			)
		),
		'member'=>array(
			'Backend'=>array(
				'access'
			),
			'Default'=>array(
				'access'
			),
			'Start'=>array(
				'access'
			),
			'Settings'=>array(
				'access',
				'update'
			),
		),
		'manager'=>array(
			'Environment'=>array(
				'access'
			),
   			'Home'=>array(
				'access',
				'update',
			),
			'Footer'=>array(
				'access',
				'update',
			),
			'Group'=>array(
				'access',
				'create',
				'update',
				'delete',
			),
            'Page'=>array(
				'access',
				'create',
				'update',
				'delete',
				'show',
				'hide',
			),
            'News'=>array(
				'access',
				'create',
				'update',
				'delete',
				'show',
				'hide',
			),
			'Event'=>array(
				'access',
				'create',
				'update',
				'delete',
				'show',
				'hide',
			),
   			'Slide'=>array(
				'access',
				'create',
				'update',
				'delete',
				'show',
				'hide',
			),
			'Content'=>array(
				'access',
				'create',
				'update',
				'delete'
			),
			'Form'=>array(
				'access',
				'create',
				'update',
				'delete'
			),
			'Menu'=>array(
				'access',
				'create',
				'update',
				'delete',
				'show',
				'hide',
				'move'
			),
			'Link'=>array(
				'access',
				'create',
				'update',
				'delete',
			),
			'Image'=>array(
				'access',
				'create',
				'update',
				'delete',
				'show',
				'hide',
				'crop',
			),
			'File'=>array(
				'access',
				'create',
				'update',
				'delete',
				'show',
				'hide',
			),
			'Config'=>array(
				'access',
				'update',
			),   
		),
		'admin'=>array(
            'User'=>array(
				'access',
				'delete',
				'update',
				'create',
				'roles'
			), 
			'Image'=>array(
				'recreate',
			),
        ),
        'super'=>array(
        
        )
	);
	
	
	/**
	 * Set roles on $acl object
	 *
	 * @param Acl $acl
	 */
	public function set_roles($acl)
	{
		
		foreach($this->_environments as $environment){
			// create managers for all websites
			$this->_roles['manager_'.$environment] = array('member');
			// let staff inherit from all managers
			$this->_roles['staff'][]='manager_'.$environment;
		}

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
				
				// manager-rights are automatically only for only one website
				if($role=='manager'){
					$role = 'manager_'.$environment;
				}
				
				// set allow rights on role
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
}