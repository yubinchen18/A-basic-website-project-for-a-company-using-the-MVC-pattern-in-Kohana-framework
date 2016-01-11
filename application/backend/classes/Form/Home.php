<?php
class Form_Home extends Form_Item
{
	public function build()
	{
		$this->btn_group('submit','back','preview');
		$this->element('slide_collection','collection',array('multiple'=>TRUE,'view'=>'item','controller'=>'Slide'));
		/*
		$this->element('content_collection_1','collection',array(
			'multiple'=>TRUE,
			'view'=>'item',
			'controller'=>'Content',
			'max'=>4,
			'types'=>array('block_default','news_preview','event_preview')
		));
		 * 
		 */
	}
}