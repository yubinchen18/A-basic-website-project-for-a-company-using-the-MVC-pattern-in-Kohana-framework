<?php
class Form_Default_Branch extends Form_Base
{
	protected $_tree=FALSE;

	public function tree($tree=FALSE)
	{
		if($tree===FALSE){
			return $this->_tree;
		} else {
			$this->_tree = $tree;
		}
		
	}
	
	
	/**
	 * select branch
	 */
	protected function select_branch($name='parent_id',$settings=array())
	{
		if($this->_tree===FALSE){
			throw HTTP_Exception::factory(500,'Form::_tree not set when using select_branch(). Use tree method to set branches');
		}
		
		$options = array();
		foreach($this->_tree as $branch){
			$label = '&#11381; '.$branch->title;
			for($i=0;$i<$branch->depth(); $i++){
				$label = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$label;
			}
			$options[$branch->id] = $label;
		}
		$settings = array_merge(array(
			'first_option'=>0,
			'options'=>$options,
		),$settings);
		return $this->element($name,'select',$settings);
	}
	
	
	
	
	protected function build()
	{
		$this->btn_group('submit','submit_back','back');
		$this->select_branch('parent_id');
		
		$this->element('title','text');
		if($this->_alias){
			$this->element('alias','alias',array('source'=>'title'));
		}
		
		$this->rule('title','not_empty');
		if($this->_alias){
			$this->rule('alias','not_empty');
		}
	}
}