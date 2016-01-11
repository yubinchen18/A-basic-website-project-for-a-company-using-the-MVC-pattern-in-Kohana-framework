<?php
class Form_Page extends Form_Item
{
	public function build()
	{
		$this->btn_group('submit','submit_back','back','preview');
		
		$this->markup('content','tab');
		$this->markup('column',array('span'=>3));
		$this->element('alias','alias',array('source'=>'title'));
		
		$this->element('menu','checkbox',array('options'=>array('1'),'single'=>TRUE,'default'=>'0'))->value('1');
		$this->element('breadcrumbs','checkbox',array('options'=>array('1'),'single'=>TRUE,'default'=>'0'))->value('1');
		
		$this->markup('column',array('span'=>9));
		$this->element('title','text');
		$this->element('subtitle','text');
		$this->element('summary','textarea');
		$this->element('slide_collection','collection',array(
			'multiple'=>TRUE,
			'view'=>'item',
			'controller'=>'Slide',
			'attributes'=>array('class'=>'slide_collection')
		));
		
		$this->element('body','textarea');
		
		$this->element('content_collection_1','collection',array(
			'multiple'=>TRUE,
			'types'=>array('block_default'),
			'view'=>'content',
			'controller'=>'Content',
			'attributes'=>array('class'=>'content_collection_1')
		));
		
		$this->markup('collection','tab');
		$this->element('image_collection','collection',array('multiple'=>TRUE,'view'=>'image','controller'=>'Image'));
		$this->element('file_collection','collection',array('multiple'=>TRUE,'view'=>'file','controller'=>'File'));
		$this->element('form_id','collection',array('view'=>'item','controller'=>'Form','max'=>1));

		$this->seo();

		$this->rule('alias','not_empty');
		$this->rule('title','not_empty');
	}
}