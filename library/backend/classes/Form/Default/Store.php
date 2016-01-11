<?php
class Form_Default_Store extends Form_Base
{
	protected $_files = array();
	
	
	public function files($files){
		$this->_files = $files;
	}
	
	protected function build()
	{
		$this->btn_group('submit','back');
	
		for($i=0;$i<count($this->_files);$i++){
			$file = $this->_files[$i];

			$this->markup('line');
				$element = $this->element('title','text',array('group'=>TRUE));
				$this->markup('filename',array('file'=>$file));
			$this->markup('/line');
			$element->value(ucfirst(FS::name_body($file)));
			$element->rule('not_empty');
		}
	}
}