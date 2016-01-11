<?php
class Form_News extends Form_Item
{
	public function build()
	{
		$this->btn_group('submit','submit_back','back','preview');
		
		$this->markup('settings','tab');
			$this->element('title','text');
			$this->element('alias','alias',array('source'=>'title'));
			$this->time_show('timed_show');
		
		$this->markup('content','tab');
			$this->element('time_publication','date');
			$this->element('body','tinymce');
			$this->element('image_collection','collection',array('controller'=>'Image','view'=>'image','multiple'=>TRUE));
		
		$this->seo();

		$this->rule('alias','not_empty');
		$this->rule('title','not_empty');
	}
}