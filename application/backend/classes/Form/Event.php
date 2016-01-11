<?php
class Form_Event extends Form_Item
{
	public function build()
	{
		$this->btn_group('submit','submit_back','back','preview');
		
		$this->markup('settings','tab');
			$this->element('title','text');
			$this->element('alias','alias',array('source'=>'title'));
			$this->time_show('timed_show');
			$this->element('subscribe','checkbox',array('single'=>TRUE,'options'=>array('1'),'default'=>0));
			$this->element('email','text');
		$this->markup('/tab');


		$this->markup('content','tab');
			$this->element('time_start','date',array('time'=>TRUE));
			$this->element('display_time','checkbox',array('single'=>TRUE,'options'=>array('1'),'default'=>0));
			$this->element('location','text');
			$this->element('body','tinymce');
			$this->element('image_collection','collection',array('controller'=>'Image','view'=>'image','multiple'=>TRUE));
		$this->markup('/tab');

		$this->seo();

		$this->rule('alias','not_empty');
		$this->rule('title','not_empty');
	}
}