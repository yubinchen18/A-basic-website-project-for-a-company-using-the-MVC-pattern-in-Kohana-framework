<?php

class Form_Default_Base extends Form 
{
	// a text instance
	protected $_text = FALSE;

	//  alias multiple / single settings
	protected $_alias = FALSE;
	
	// item model when updating
	protected $_model = FALSE;
	
	// current request
	protected $_request = FALSE;
	
	// urls
	protected $_url_submit = FALSE;
	protected $_url_submit_back = FALSE;
	protected $_url_back = FALSE;
	protected $_url_preview = FALSE;
	
	
	/**
	 * set urls
	 * @param type $urls
	 */
	public final function urls($urls)
	{
		foreach($urls as $name => $url){
			$name = '_url_'.$name;
			$this->{$name} = $url;
		}
		
		if($this->_url_submit !== FALSE){
			$this->_action = $this->_url_submit;
		}
	}
	
	
	/**
	 * set request
	 * @param type $request
	 */
	public final function request($request)
	{
		$this->_request = $request;
	}
	
	
	/**
	 * set model
	 * @param type $model
	 */
	public final function model($model)
	{
		$this->_model = $model;
	}

	
	/**
	 * set text model
	 * @param type $model
	 */
	public final function text($text)
	{
		$this->_text = $text;
	}
	
	/**
	 * set alias multiple / single setting
	 * @param alias $alias
	 */
	public final function alias($alias)
	{
		$this->_alias = $alias;
	}
	
	/**
	 * Add a submit button on it's own row
	 * @param string $key
	 */
	public function btn_submit($key='submit')
	{
		$this->markup('line',array('class'=>'buttons'));
			$this->element($key,'btn',array('attributes'=>array('class'=>'yf-submit btn btn-primary')));
		$this->markup('/line');
	}
	
	
	/**
	 * Add several buttons on their own row
	 */
	public function btn_group()
	{		
		$buttons = func_get_args();
		
		$this->markup('line',array('attributes'=>array('class'=>'buttons')));
		
		if(in_array('submit',$buttons)){
			$this->element('submit','btn',array('attributes'=>array('class'=>'yf-submit btn btn-primary')));
		}

		if(in_array('submit_back',$buttons)  && $this->_url_submit_back !== FALSE ){
			$this->element('submit_back','btn',array(
				'href'=>$this->_url_submit_back,
				'attributes'=>array('class'=>'yf-submit-back btn btn-info')
			));
		}

		if(in_array('back',$buttons) && $this->_url_back !== FALSE){
			$this->element('back','btn',array(
				'href'=>$this->_url_back,
				'attributes'=>array('class'=>'btn btn-default ')
			));
		}

		if(in_array('preview',$buttons) && $this->_url_preview !== FALSE){
			$this->element('preview','btn',array(
				'href'=>$this->_url_preview,
				'attributes'=>array(
					'class'=>'btn btn-success pull-right',
					'target'=>'_blank'
				)
			));
		}
		$this->markup('/line');
	}
	
	
	/**
	 * Seo tab
	 * @param string $prefix
	 * @param string $source
	 */
	protected function seo($prefix='meta_',$source='title')
	{
		$this->markup('seo','tab',array('attributes'=>array(
			'class'=>'yf',
			'data-use'=>'backend.form.group.Seo',
			'data-prefix'=>$prefix,
			'data-source'=>$source
		)));
		$this->element($prefix.'title','text');
		$this->element($prefix.'keywords','text');
		$this->element($prefix.'description','textarea');
		$this->markup('/tab');
	}
	
	/**
	 * Add an item request
	 * @param string $name
	 * @param array $modules
	 * @param array $requests
	 */
	protected function item($name,$modules=array(),$requests=array())
	{
		$this->element($name,'item',array(
			'compound'=>TRUE,
			'keys'=>array(
				'module',
				'item_id',
				'params',
				'request',
			),
			'defaults'=>array(
				'module'=>'',
				'item_id'=>0,
				'params'=>'{}',
				'request'=>'',
			),
			'modules'=>$modules,
			'requests'=>$requests
		));
	}

	
	/**
	 * select time show start / end
	 */
	protected function time_show($name='time_show')
	{
		$this->element($name,'timed',array(
			'compound'=>TRUE,
			'keys'=>array(
				'use_time_show_start',
				'time_show_start',
				'use_time_show_end',
				'time_show_end'
			),
			'default'=>array(
				'use_time_show_start'=>'0',
				'use_time_show_end'=>'0'
			)
		));
	}
}