<?php 
class Email{	
	
	public static function factory($settings=array())
	{
		return new Email($settings);
	}
	
	
	protected $_settings = array();
	
	
	
	protected function __construct($settings)
	{
		$this->_settings = $settings;
	}
	
	public function settings($settings)
	{
		$this->_settings = $settings;
	}

	/**
	 * send email
	 */
	public function send(){
		
		// check if required fields are set
		if(!isset($this->_settings['to_email'])){
			throw HTTP_Exception::factory(500,'Trying to send e-mail but no "to" value was supplied');
		}
		
		if(!isset($this->_settings['from_email'])){
			throw HTTP_Exception::factory(500,'Trying to send e-mail but no "from" value was supplied');
		}
		
		if(!isset($this->_settings['subject'])){
			throw HTTP_Exception::factory(500,'Trying to send e-mail but no "subject" value was supplied');
		}
		
		if(!isset($this->_settings['body'])){
			throw HTTP_Exception::factory(500,'Trying to send e-mail but no "body" value was supplied');
		}
		
		// require swiftmailer
		require Kohana::find_file('', 'swift_required');
		
		// create message
		$message = Swift_Message::newInstance();
		
		// fill message
		$message->setTo(
			$this->_settings['to_email'],
			isset($this->_settings['to_name'])?$this->_settings['to_name']:$this->_settings['to_email']
		);
		
		$message->setFrom(
			$this->_settings['from_email'],
			isset($this->_settings['from_name'])?$this->_settings['from_name']:$this->_settings['from_email']
		);
		
		$message->setReturnPath(
			$this->_settings['from_email']
		);

		$message->setSubject($this->_settings['subject']);
		
		// html type
		if(isset($this->_settings['html']) && $this->_settings['html'] == TRUE){
			$message->setContentType('text/html');
		}
		
		$message->setBody($this->_settings['body']);
		
		if(isset($this->_settings['attachment']) && $this->_settings['attachment'] != FALSE){
			if(is_array($this->_settings['attachment'])){
				foreach($this->_settings['attachment'] as $atachmentData){
					$content = file_get_contents($atachmentData);
					$name = str_replace(array('/','\\',DIRECTORY_SEPARATOR),'***split***',$atachmentData);
					$name = explode('***split***',$name);
					$name = $name[count($name)-1];
					$attachment = new Swift_Attachment($content,$name);
					$message->attach($attachment);
				}
			} else {
				$content = file_get_contents($this->_settings['attachment']);
				$name = str_replace(array('/','\\',DIRECTORY_SEPARATOR),'***split***',$this->_settings['attachment']);
				$name = explode('***split***',$name);
				$name = $name[count($name)-1];
				$attachment = new Swift_Attachment($content,$name);
				$message->attach($attachment);
			}
		}

		
		if(isset($this->_settings['cc'])){
			$message->setCC($this->_settings['cc']);
		}
		
		if(isset($this->_settings['bcc'])){
			$message->setCC($this->_settings['bcc']);
		}
		
		// try to send it out!
		try{
			Swift_Mailer::newInstance(Swift_MailTransport::newInstance())->send($message);
		} catch (Exception $e){
			//var_dump($e);
		}
	}
	

}