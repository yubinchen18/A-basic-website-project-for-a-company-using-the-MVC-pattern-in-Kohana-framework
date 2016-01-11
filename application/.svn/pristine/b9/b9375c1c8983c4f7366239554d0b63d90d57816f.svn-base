<?php
class Form_Footer extends Form_Item
{
	public function build()
	{
		$this->btn_group('submit','back');
		$this->element('content_collection','collection',array(
			'multiple'=>TRUE,
			'view'=>'item',
			'controller'=>'Content',
			'max'=>4,
			'types'=>array('text')
		));
	}
}