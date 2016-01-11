<?php

class Model_Default_User extends Model_Item 
{
	const STATUS_ACTIVE = 'active';
	const STATUS_BLOCKED = 'blocked';
	
	protected $_table_name = 'user';
	
	protected $_table_columns = array(
		'id'=>'int',
		'created'=>'int',
		'status'=>'int',
		'username'=>'string',
		'password'=>'string',
		'email'=>'string',
		'roles'=>'string',
		'language'=>'string',
		'group_id'=>'int',
		'owner_id'=>'int',
		'editor_id'=>'int',
		'website_id'=>'int'
	);
	
	protected $_serialize_columns = array(
		'roles'
	);


	protected $_sort = array('username','ASC');
	

	/**
	 * Model_Default_User::password()
	 * Set a new password
	 * 
	 * @param  String $password
	 * @return void
	 */
	public function password($string)
	{
		$password = Password::factory($string);
		$this->password = $password->hash();
	}
	
	
	/**
	 * Model_Default_User::match_password()
	 * check if given password matches encrypted password
	 * 
	 * @param String $password
	 * @return Boolean
	 */
	public function verify($string)
	{
		if($this->loaded() == FALSE){
			throw HTTP_Exception::factory(500,'Trying to verify password of unloaded user');
		}
		$password = Password::factory($string);		
		return $password->match($this->password);
	}



	/**
	 * check if username is unique
	 *
	 * @param string $username
	 * @return boolean
	 */
	public function username_unique($username)
	{
		// search for given username
		$query = DB::select()
		->from($this->_table_name)
		->where('username','=',$username);
		
		// if model is loaded, exclude own uername
		if($this->_loaded){
			$query->where($this->_table_name.'.id','<>',$this->id);
		}
		
		// get results
		$result = $query->execute();
		
		if($result->count()>0){
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	
	
	/**
	 * check if a username exists
	 * 
	 * @param mixed $email
	 * @return
	 */
	public function username_exists($email)
	{
		return !($this->username_unique($email));
	}
	
	
	
	/**
	 * check if email is unique
	 *
	 * @param string $email
	 * @return boolean
	 */
	public function email_unique($email)
	{
		// search for given e-mail
		$query = DB::select()
		->from($this->_table_name)
		->where('email','=',$email);
		
		// if model is loaded, exclude own email
		if($this->_loaded){
			$query->where($this->_table_name.'.id','<>',$this->id);
		}
		
		// get results
		$result = $query->execute();
		
		if($result->count()>0){
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	
	/**
	 * check if a email exists
	 * 
	 * @param mixed $email
	 * @return
	 */
	public function email_exists($email)
	{
		return !($this->email_unique($email));
	}
	
}