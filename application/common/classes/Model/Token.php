<?php

class Model_Token extends Model_Item 
{
	protected $_table_name = 'token';
	
	protected $_table_columns = array(
		'id'=>'int',
		'hash'=>'string',
		'type'=>'string',
		'persistent'=>'int',
		'user_id'=>'int'
	);
	
	
	protected $_belongs_to = array(
		'user'=>array(
			'model'		  => 'User',
			'foreign_key' => 'user_id'
		)
	);
	

	/**
	 * create an access token
	 *
	 * @param int $userId
	 * @param string $type
	 * @param boolean $persistent
	 * @return string $token
	 */
	public function generate($userId,$type,$persistent=false)
	{
		
		if($this->loaded()){
			throw HTTP_Exception::factory(500,'Cannot generate token on loaded token');
		}
		
		$this->hash = md5(md5(microtime(true).rand(0,10000000)).'access_token');
		$this->type = $type;
		$this->persistent = $persistent?1:0;
		$this->user_id = $userId;
		$this->save();
		
		return $this->hash;
	}
}