<?php
class Form_Default_Image extends Form_File
{
	protected function build()
	{
		$this->btn_group('submit','submit_back','back');
		$this->markup('content','tab');
		$this->element('title','text');
		$this->markup('preview','tab');
		$this->markup('image',array('item'=>$this->_model));
		

		// rule
		$this->rule('title','not_empty');
	}
}
?>