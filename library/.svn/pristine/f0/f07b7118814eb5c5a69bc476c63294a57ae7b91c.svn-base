<?php
class Model_Widget extends Model_Item
{
	
	// table name
	protected $_table_name = 'widget';
	
	// columns
	protected $_table_columns = array(
		'id'=>'int',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		
		'title'=>'varchar(255)',
		'class'=>'varchar',
		'template'=>'text',
		'compiled'=>'text',
		'time_compiled'=>'datetime',
		'error'=>'tinyint',
		'error_message'=>'text',
		'view'=>'varchar(255)',
		
		'deletable'=>'tinyint',
		'movable'=>'tinyint',
		'updatable'=>'tinyint',
		
		'status'=>'tinyint',
		'rank'=>'int',

		'owner_id'=>'int',
		'editor_id'=>'int',
		'website_id'=>'int',
	);
	
	
	protected $_sortable = FALSE;
	
	protected $_widget = FALSE;
	
	protected function init()
	{
		$this->sort('title','ASC');
	}
	


	/**
	 * render widget
	 *
	 * @return string
	 */
	public function render()
	{
		if($this->loaded() == FALSE){
			throw HTTP_Exception::factory(500,'Trying to render unloaded widget');
		}

		// GET DATA
		if($widget = $this->widget()){
			$data = $this->_widget->execute()->data();
		} else {
			$data = array();
		}

		// RENDER DATA
		if($this->view != NULL && $this->view != ''){
			
			// use kohana's view with a view file
			$output = View::factory('views/widget/'.$this->view,$data)->render();
			
		} elseif($this->template != NULL && $this->template!=''){
			
			// use user supplied template
			$template = Template::factory($this->template,$data);
			
			// check if recompile is needed
			$time_compiled = strtotime($this->time_compiled);
			$timestamp = strtotime($this->timestamp);
			if($time_compiled<$timestamp){
				// check html validity
				$this->check_template();
				if($this->error == 1){
					// error: compiled is empty
					$this->compiled = '';
					// set compiletime to now
					$this->time_compiled = date('Y-m-d H:i:s',time());
				} else {	
					// set re-compiled template
					$this->compiled = $template->compiled();
					// set compiletime to now
					$this->time_compiled = date('Y-m-d H:i:s',time());
				}
				// save
				$this->save();
			} else {
				// use compiled template, so that step can be skipped
				$template->compiled($this->compiled);
			}
			
			// render tempalte
			$output = $template->render();
			
		} else {
			// output is empty
			$output = '';
		}
	
		return $output;
	}
	
	
	/**
	 * check if the template html is valid (enough)
	 * if not: set an error flag & error message
	 */
	protected function check_template()
	{
		$error = 0;
		$errorMessage = '';
		$dom = new DOMDocument();
		$dom->formatOutput = true;
			
		if($this->template != ''){
			try{
				$content = $dom->createDocumentFragment();
				$content->appendXML($this->template);
				$dom->appendChild($content);
			} catch(Exception $e){
				$error = 1;
				$errorMessage = $e->getMessage();
			}
		}

		$this->error = $error;
		$this->error_message = $errorMessage;
	}
	
	
	
	/**
	 * compile the widget and store the results
	 *
	 */
	public function compile()
	{
		if($this->view != NULL && $this->view != ''){
			// no need to compile : template is not used
			return;
		}
		
		$this->check_template();
		
		if($this->error == 1){
			$this->compiled = '';
			// set compiletime to now
			$this->time_compiled = date('Y-m-d H:i:s',time());
		} else {
			// get compiled
			$this->compiled = Template::factory($this->template)->compiled();
			// set compiletime to now
			$this->time_compiled = date('Y-m-d H:i:s',time());
		}
		// save
		$this->save();
	}
	
	
	/**
	 * Model_Widget::widget()
	 * get or set widget
	 * 
	 * @param bool $widget
	 * @return
	 */
	public function widget($widget = FALSE)
	{
		if($widget===FALSE){
			// get widget
			if($this->_widget === FALSE){
				// check if model loaded
				if($this->loaded() == FALSE){
					throw HTTP_Exception::factory(500,'Trying to retrieve widget of unloaded widget model');
				}
				// create widget
				if($this->class != NULL && $this->class != ''){
					$this->_widget = Widget::factory(ucfirst($this->class));
				}
			} 
			// return widget
			return $this->_widget;
		} else {
			// set widget
			$this->_widget = $widget;
		}
	}
}