<?php
class Password 
{	
	// a plaintext password
	protected $_password = FALSE;
	
	/**
	 * Password::factory()
	 * 
	 * @param string $password
	 * @param mixed $settings
	 * @return void
	 */
	public static function factory($password)
	{
		return new Password($password);
	}


	/**
	 * Password::__construct()
	 * 
	 * @param string $password
	 * @param mixed $settings
	 * @return void
	 */
	protected function __construct($password)
	{
		$this->_password = $password;
	}
	
	
	
	/**
	 * Password::hash()
	 * create hash
	 * 
	 * @param string $salt
	 * @return
	 */
	public function hash($salt='')
	{
		if(CRYPT_BLOWFISH === 1){
			$salt = $this->bcrypt_salt($salt);
			$hash = crypt($this->_password, $salt);	
		} else {
			$hash = hash_hmac('sha256',$this->_password,$salt);
		}
		return $hash;
	}

	
	/**
	 * Password::match()
	 * Match a hash to the hashed _password
	 * 
	 * @param mixed $password
	 * @param string $salt
	 * @return
	 */
	public function match($hash, $salt='') 
	{
	    if(CRYPT_BLOWFISH === 1){
			$hashed = crypt($this->_password, $hash);
  		} else {
  			$hashed = hash_hmac('sha256',$this->_password,$salt);
 		}
 		return $hashed === $hash;
  	}


	/**
	 * Password::brcypt_salt()
	 * Create a brcypt salt
	 * 
	 * @param string $prefix
	 * @return
	 */
	protected function bcrypt_salt($prefix='') 
	{
		$salt = sprintf('$2a$%02d$', 12);
		$salt .= $this->get_random_bytes($prefix);
		return $salt;
	}



	/**
	 * Password::get_random_bytes()
	 * get random bytes
	 * 
	 * @param string $prefix
	 * @return
	 */
	protected function get_random_bytes($prefix='') 
	{
		$key = uniqid($prefix, true);
		$bytes = '';
      	// 12 rounds of HMAC must be reproduced / created verbatim, no known shortcuts.
      	// Salsa20 returns more than enough bytes.
      	for($i = 0; $i < 12; $i++) {
        	$bytes = hash_hmac('sha256', microtime() . $bytes, $key, false);
        	usleep(10);
     	}
    	return $bytes;
	}
}