<?php
class Form_Content extends Form_Default_Content
{
	protected function build_text()
	{
		$this->btn_group('submit_back','back');
		$this->element('title','text');
		$this->element('body','tinymce');
	}
	
	protected function build_images()
	{
		$this->btn_group('submit_back','back');
		$this->element('image_collection','collection',array('multiple'=>TRUE,'controller'=>'Image','view'=>'image'));
	}
	
	protected function build_image()
	{
		$this->btn_group('submit_back','back');
		$this->element('image_id','collection',array('controller'=>'image','view'=>'image','max'=>1));
		$this->element('caption','text');
	}
	
	protected function build_block_default()
	{
		$this->btn_group('submit_back','back');
		$this->markup('column');
		$this->element('title','text');
		$this->element('text','textarea');
		$this->element('image_id','collection',array('controller'=>'image','view'=>'image','max'=>1));
		$this->markup('column');
		$this->element('cta','text');
		$this->element('link_id','link');
	}
	
	
	protected function build_block_eyecatcher()
	{
		$this->btn_group('submit_back','back');
		$this->markup('column');
		$this->element('title','text');
		$this->element('text','textarea');
		$this->markup('column');
		$this->element('cta','text');
		$this->element('link_id','link');
	}
	
	
	protected function build_button()
	{
		$this->btn_group('submit_back','back');
		$this->markup('column');
		$this->element('cta','text');
		$this->element('link_id','link');
		$this->element('importance','select',array('options'=>array('0','1','2')));
	}
	
	
	protected function build_news_preview()
	{
		$this->btn_group('submit_back','back');
		$this->element('title','text');
		$this->element('amount','text',array('default'=>'5'));
		$this->element('more','checkbox',array('options'=>array('1'),'single'=>TRUE,'default'=>'0'));
		$this->element('more_label','text');
		$this->rule('amount','numeric');
	}
	
	
	protected function build_event_preview()
	{
		$this->btn_group('submit_back','back');
		$this->element('title','text');
		$this->element('amount','text',array('default'=>'5'));
		$this->element('more','checkbox',array('options'=>array('1'),'single'=>TRUE,'default'=>'0'));
		$this->element('more_label','text');
		$this->rule('amount','numeric');
	}
	

	protected function build_newsletter()
	{
		$this->btn_group('submit_back','back');
		$this->element('title','text');
		$this->element('text','textarea');
		$this->element('body','textarea',array('text'=>'label.text_after'));
		$this->element('cta','text');
		$this->element('importance','select',array('options'=>array('0','1','2')));
	}
}