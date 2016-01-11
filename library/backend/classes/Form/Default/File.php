<?php
class Form_Default_File extends Form_Base
{
	protected function build()
	{
		$this->btn_group('submit','submit_back','back');
		$this->element('title','text');
		//custom hidden checkbox
		$this->element('hidden', 'checkbox', array('options'=>array('1'), 'default'=>'0'));
		$this->markup('section');
		$this->markup('file',array('item'=>$this->_model));
		$this->markup('/section');

		
		// rule
		$this->rule('title','not_empty');
	}
}