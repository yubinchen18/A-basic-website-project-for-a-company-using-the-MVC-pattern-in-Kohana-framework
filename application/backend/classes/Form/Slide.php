<?php
class Form_Slide extends Form_Item
{
	public function build()
	{
		$this->btn_group('submit','submit_back','back');
		$this->element('title','textarea');
		$this->element('cta','text');
		$this->element('image_id','collection',array('view'=>'image','controller'=>'Image','max'=>1));
		$this->element('link_id','link');

		$this->rule('title','not_empty');
		$this->rule('cta','not_empty');
	}
}