<?php
class Form_Default_Folder extends Form_Base
{
	protected function init()
	{
		$this->submit_section();
		$this->element('title','text');
		$this->rule('title','not_empty');
	}
}