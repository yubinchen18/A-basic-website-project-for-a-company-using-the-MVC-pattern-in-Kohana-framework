<?php
class Form_Config extends Form_Default_Config
{
	public function build()
	{
		$this->btn_group('submit','back');
		
		$this->markup('section');
		
		$this->element('title','text');
		$this->element('seo_title','text');
		$this->element('seo_description','text');
		$this->element('seo_keywords','text');
		$this->element('image_id','collection',array('controller'=>'Image','view'=>'image','single'=>TRUE,'max'=>1));
		$this->element('vimeo','text');
		$this->element('twitter','text');
		$this->element('facebook','text');
		$this->element('ga','text');

	}
	
	
	public function multi_email($field,$value,$validation)
	{
		$emails = explode(',',$value);
		$valid = TRUE;
		foreach($emails as $email){
			$email = trim($email);
			if(Valid::email($email) === FALSE){
				$valid = FALSE;
			}
		}
		if($valid === FALSE){
			$validation->error($field,'email');
		}
	}
}