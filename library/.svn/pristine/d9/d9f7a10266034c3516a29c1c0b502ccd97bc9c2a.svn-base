<?php
class Form_Default_Widget extends Form_Base
{
	protected function init()
	{
		$this->submit_section();
		$this->element('title','text');
		$this->element('error_message','error');
		$this->element('template','widget',array(
			'controller_image'=>$this->controller_image,
			'controller_link'=>$this->controller_link
		));
	}
}