<?php
class Form_Default_Content extends Form_Base
{
	public function build()
	{
		if($this->_model !== FALSE && $this->_model->loaded() === TRUE){
			// updating: get type from model
			$type = $this->_model->type;
		} else {
			// creating: get type from request
			$type = $this->_request->param('id',FALSE);
		}
		if(is_callable(array($this,'build_'.$type))){
			call_user_func_array(array($this,'build_'.$type),array());
		}
	}
}