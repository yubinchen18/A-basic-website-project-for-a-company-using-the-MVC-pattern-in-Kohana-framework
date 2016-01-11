<?php
class Viewer_Default_List extends Viewer
{
	// acl
	protected $_acl = FALSE;
	
	// controller
	protected $_route = FALSE;
	
	// controller
	protected $_controller = FALSE;

	// state
	protected $_state = FALSE;
	
	// task
	protected $_task = FALSE;
	
	// callback
	protected $_callback = FALSE;

	// Cached loaded views
	protected $_views = array();
	
	// Cached parsed tools
	protected $_tools=FALSE;

	// sortable
	protected $_sortable=FALSE;

	// group model
	protected $_group=FALSE;
	
	/*
	 * get list type
	 * @return string
	 */
	public function type()
	{
		return isset($this->_settings['type'])?$this->_settings['type']:'table';
	}

	/**
	 * Get / Set toute
	 * @param type $controller
	 * @return type
	 */
	public function route($route = FALSE)
	{
		if($route === FALSE){
			return $this->_route;
		} else {
			$this->_route = $route;
		}
	}
	
	/**
	 * Get / Set controller
	 * @param type $controller
	 * @return type
	 */
	public function controller($controller=FALSE)
	{
		if($controller === FALSE){
			return $this->_controller;
		} else {
			$this->_controller = $controller;
		}
	}
		
	
	/**
	 * Get set acl
	 * @param type $acl
	 * @return type
	 */
	public function acl($acl=FALSE)
	{
		if($acl === FALSE){
			return $this->_acl;
		} else {
			$this->_acl = $acl;
		}
	}
	
	/**
	 * Set state array
	 * @param type $state
	 */
	public function state($state)
	{
		$this->_state = $state;
		
	}
	
	/**
	 * Set task
	 * @param string $task
	 */
	public function task($task)
	{
		$this->_task = $task;
	}
	
	/**
	 * Set callback
	 * @param string $callback
	 */
	public function callback($callback)
	{
		$this->_callback = $callback;
	}

	/*
	 * Set group model
	 */
	public function group($group)
	{
		$this->_group = $group;
	}

	/**
	 * get the list keys for a table
	 * if an item is provided, it will get the keys for that item
	 * if no item is provided it will get the header item
	 * @param Model_Item $item
	 * @return array
	 */
	public function keys($item = FALSE)
	{
		if($item === FALSE){
			// get keys for the header
			$keysHeader = array();
			foreach($this->_settings['keys'] as $key => $val){
				// normalize settigns
				if(is_numeric($key)){
					// it is a numeric element
					// but in the case there also is a key with this name
					// use that one and skip this
					if(isset($this->_settings['keys'][$val])){
						continue;
					}
					$field = $val;
					$settings = array();
				} else {
					$field = $key;
					$settings = $val;
				}
				
				// get direction
				$direction = $this->_state->get('sort.'.$field,FALSE);
				
				// default key for the header
				$keyHeader = array(
					'field'=>$field,
					'text'=>'label.'.$field,
					'sorted'=> isset($this->_settings['sort'][$field]) ? ($direction ? TRUE : FALSE) : FALSE,
					'sortable'=> isset($this->_settings['sort'][$field]),
					'direction'=>$direction ? $direction : 'ASC',
					'link'=>array(
						$this->_controller.'@list',
						array('query'=>'sort='.$field.'&direction='.($direction==='ASC'?'DESC':'ASC'))
					)
				);
				// additional settings
				foreach($settings as $setting => $value){
					$keyHeader[$setting] = $value;
				}
				// add it to the keys
				$keysHeader[]=(object)$keyHeader;
			}
			return $keysHeader;
			
		} else {
			// get keys for an item
			$keysItem = array();
			foreach($this->_settings['keys'] as $key => $val){
				// normalize settings
				if(is_numeric($key)){
					// it is a numeric element
					// but in the case there also is a key with this name
					// use that one and skip this
					if(isset($this->_settings['keys'][$val])){
						continue;
					}
					$field = $val;
					$settings = array();
				} else {
					$field = $key;
					$settings = $val;
				}
				// default item
				$keyItem = array(
					'value'=>NULL,
					'view'=>FALSE,
					'link'=>FALSE,
				);
				// set value or item & view
				if(isset($settings['view'])){
					$keyItem['view'] = $settings['view'];
					$keyItem['item'] = $item;
					// additional settings
					foreach($settings as $setting=>$value){
						$keyItem[$setting] = $value;
					}
				} else {
					$keyItem['value'] = $item->{$field};
				}
				
				// set a link if an action was set
				if(isset($settings['action'])){
					if( (isset($settings['acl']) &&  $settings['acl'] === FALSE) || $this->_acl->allowed($this->_controller,$settings['action'],$item->owner_id)){
						$keyItem['link'] = array(
							$this->_controller.'@'.$settings['action'].':'.$item->id,
							array(),
							FALSE
						);
					}
				}
				// additional settings
				foreach($settings as $setting => $value){
					$keyItem[$setting] = $value;
				}
				
				// add it to the item keys
				$keysItem[]=(object)$keyItem;
			}
			return $keysItem;
		}
	}
	

	/**
	 * return whether items in the list should be selectable
	 * @return bool
	 */
	public function selectable()
	{
		return isset($this->_settings['selectable']) && $this->_settings['selectable'];
	}
	
	
	
	/**
	 * return whether a create button should be added
	 * @return type
	 */
	public function create()
	{
		// start with empty set
		$tools = array();
		
		if(isset($this->_settings['create'])) {
			
			// make sure it's an array
			if(!is_array($this->_settings['create'])){
				$this->_settings['create'] = array($this->_settings['create']);
			}
			
			// go through array
			foreach($this->_settings['create'] as $key => $val){
				
				if($val === FALSE){
					// dont do regular create
					continue;
				}elseif($val === TRUE){
					// regular create
					$id = FALSE;
					$settings = array();
					$text = 'label.create';
					$params = array();
				} else {
					if(is_numeric($key)){
						$id = $val;
						$settings = array();
					} else {
						$id = $key;
						$settings = $val;
					}
					$text = 'option.create.'.$id;
					$params = array('id'=>$id);
				}
	
				$tool = array(
					'controller'=>$this->_controller,
					'action'=>'create',
					'params'=>$params,
					'route'=>FALSE,
					'attributes'=>array(),
					'view'=>FALSE,
					'acl'=>TRUE,
					'text'=>$text,
					'icon'=>FALSE
				);
				
				// additional settings
				foreach($settings as $setting => $value){
					$tool[$setting] = $value;
				}
					
				// create link
				$tool['link'] = array(
					$tool['controller'].'@'.$tool['action'],
					$tool['params'],
					$tool['route']
				);
				
				// create 
				if($tool['acl'] === FALSE || $this->_acl->allowed($this->_controller,'create')){
					$tools[]= (object)$tool;
				}
			}	
		}
		return $tools;
	}
	

	
	/**
	 * get the pagination
	 */
	public function pagination()
	{
		// start with empty pagination
		$pagination = array();
		
		// if settings dictate no pagination
		if($this->_settings['pagination'] === FALSE){
			return $pagination;
		}
		
		// current values
		$step = $this->_settings['pagination']['step'];
		$offset = $this->_state->get('pagination.offset',0);
		$total = $this->_state->get('pagination.total',0);
	
		// only paginate when there are more items than step
		if($total>$step){
			// get steps
			$steps = ceil($total/$step);
			
			// add  <<
			if($offset > 0){
				$pagination[]=$this->pagination_item('previous',$offset,$step);
			}
			
			// five or less steps: display all
			if($steps <= 5){
				for($i=0; $i<$steps; $i++){
					$pagination[]=$this->pagination_item($i,$offset,$step);
				}
			} else {
				if($offset < 3 * $step){
					// display first four
					for($i=0; $i<4; $i++){
						$pagination[]= $this->pagination_item($i,$offset,$step);
					}
					// ellipsis
					$pagination[]=$this->pagination_item('break');
					// display last
					$pagination[]= $this->pagination_item($steps-1,$offset,$step);

				} elseif($offset >= ($steps - 3) * $step){
					// disply first
					$pagination[]= $this->pagination_item(0,$offset,$step);
					// ellipsis
					$pagination[]=$this->pagination_item('break');
					// display last four
					for($i=$steps-4; $i<$steps; $i++){
						$pagination[]= $this->pagination_item($i,$offset,$step);
					}
				} else {
					// disply first
					$pagination[]= $this->pagination_item(0,$offset,$step);
					// ellipsis
					$pagination[]=$this->pagination_item('break');
					// display middle three
					for($i=floor($offset/$step)-1; $i<floor($offset/$step)+2; $i++){
						$pagination[]= $this->pagination_item($i,$offset,$step);
					}
					// ellipsis
					$pagination[]=$this->pagination_item('break');
					// display last
					$pagination[]= $this->pagination_item($steps-1,$offset,$step);	
				}
			}
			
			// Add last >>
			if($offset < ($steps-1) * $step){
				$pagination[]=$this->pagination_item('next',$offset,$step);
			}
		}
		return $pagination;
	}
	
	
	
	
	/**
	 * Add one pagination item
	 * can be << int ... >>
	 * @param type $index
	 * @param type $offset
	 * @param type $step
	 * @return type
	 */
	protected function pagination_item($index,$offset=0,$step=0)
	{
		if($index === 'next'){
			return (object)array(
				'link'=>array(
					$this->_controller.'@list',
					array('query'=>'offset='.($offset + $step))
				),
				'active'=>FALSE,
				'label'=>'»'
			);
		} elseif($index === 'previous'){
			return (object)array(
				'link'=>array(
					$this->_controller.'@list',
					array('query'=>'offset='.(($offset - $step < 0) ? 0 : ($offset - $step)))
				),
				'active'=>FALSE,
				'label'=>'«'
			);
		} elseif($index === 'break'){
			return (object)array(
				'link'=>FALSE,
				'active'=>FALSE,
				'label'=>'...'
				
			);
		} else {
			return (object)array(
				'link'=>array(
					$this->_controller.'@list',
					array('query'=>'offset='.($index * $step))
				),
				'active'=>$offset>=$index*$step && $offset < ($index+1) * $step,
				'label'=>$index+1
			);
		}
	}
	

	/**
	 * get rendered tools html
	 * @param Model_Item $item
	 * @return string
	 */
	public function tools($item)
	{
		// parse & cache tools
		if($this->_tools === FALSE){
			$this->_tools = array();
			foreach($this->_settings['tools'] as $key => $val){
				if(is_numeric($key)){
					// it is a numeric element
					// but in the case there also is a key with this name
					// use that one and skip this
					if(isset($this->_settings['tools'][$val])){
						continue;
					}
					$action = $val;
					$settings = array();
				} else {
					$action = $key;
					$settings = $val;
				}
				$tool = array(
					'controller'=>$this->_controller,
					'action'=>$action,
					'params'=>array(),
					'route'=>FALSE,
					'attributes'=>array(),
					'view'=>FALSE,
					'acl'=>TRUE,
					'text'=>'label.'.$action,
					'icon'=>FALSE
				);
				foreach($settings as $setting => $value){
					$tool[$setting] = $value;
				}
				$this->_tools[]=$tool;
			}
		}
		
		// get cached parsed tools
		$tools = $this->_tools;
		
		// parse tools
		$callback = $this->_task === 'select' ? $this->_callback : FALSE;
		$create = FALSE;
		$update = FALSE;
		$delete = FALSE;
		$other = array();
		foreach($tools as $toolData){
			if($toolData['acl'] === FALSE || $this->_acl->allowed($toolData['controller'],$toolData['action'],$item->owner_id))
			{
				// create tool for view
				$tool = (object)$toolData;
				// add link
				$tool->link = array(
					$toolData['controller'].'@'.$toolData['action'].':'.$item->id,
					$toolData['params'],
					$toolData['route']
				);

				// add item
				$tool->item = $item;
				
				// store as update, delete or other
				if($toolData['action'] === 'create'){
					$create = $tool;
				} elseif($toolData['action'] === 'update'){
					if(!isset($item->updatable) || $item->updatable == '1'){
						$update = $tool;
					}
				} elseif($toolData['action'] === 'delete'){
					if(!isset($item->deletable) || $item->deletable == '1'){
						$delete = $tool;
					}
				} else {
					$other[]=$tool;
				}
			}
		}

		// load cached view or create new one
		if(!isset($this->_views[$this->_settings['view']['tools']])){
			$view = View::factory($this->_settings['view']['tools']);
			$this->_views[$this->_settings['view']['tools']] = $view;
		} else {
			$view = $this->_views[$this->_settings['view']['tools']];
		}
		$view->set('callback',$callback);
		$view->set('create',$create);
		$view->set('update',$update);
		$view->set('delete',$delete);
		$view->set('groups',$this->_group ? $this->_group->items() : FALSE);
		$view->set('other',$other);
		$view->set('item',$item);
		$view->set('route', $this->_route);
		return $view->render();
	}
	
	
	/**
	 * render a show/hide block
	 * @param type $item
	 * @return string
	 */
	public function show_hide($item)
	{
		if(isset($this->_settings['hidable']) && $this->_settings['hidable']){
			// load cached view or create new one
			if(!isset($this->_views[$this->_settings['view']['show_hide']])){
				$view = View::factory($this->_settings['view']['show_hide']);
				$this->_views[$this->_settings['view']['show_hide']] = $view;
			} else {
				$view = $this->_views[$this->_settings['view']['show_hide']];
			}
			$view->set('item', $item);
			$view->set('link_show', $this->_controller.'@show:'.$item->id);
			$view->set('link_hide', $this->_controller.'@hide:'.$item->id);
			
			return $view->render();
		} else {
			return '';
		}
	}
	
	/*
	 * Get groups
	 */
	public function groups()
	{
		if($this->_group){
			return $this->_group->items();
		} else {
			return FALSE;
		}
	}
	
	/**
	 * get current group
	 * @return type
	 */
	public function active_group()
	{
		return $this->_state->get('group');
	}
	
	
	/**
	 * get ungrouped
	 * @return type
	 */
	public function ungrouped()
	{
		return $this->_group->ungrouped();
	}
	
	
	/**
	 * Get possible filters
	 * @return type
	 */
	public function filter_settings()
	{
		
		$settings = array(
			'filters'=>array()
		);
		
		$text = Text::instance();
		
		$filters = array();
		foreach($this->_settings['filter'] as $field => $setting){
			$filter=array(
				'value'=>$field,
				'label'=>$text->get('label.'.$field),
				'type'=>$setting['type'],
				'operators'=>array(),
				'options'=>array()
			);
			foreach($setting['operators'] as $operator){
				$filter['operators'][$operator]= array(
					'value'=>$operator,
					'label'=>$text->get('option.operator.'.$operator)
				);	
			}
			if($setting['type'] === 'option'){
				foreach($setting['options'] as $option){
					$filter['options'][$option]=array(
						'value'=>$option,
						'label'=>$text->get('option.'.$field.'.'.$option)
					);
				}
			}
			if($setting['type'] === 'relation'){
				$model = ORM::factory($setting['model']);
				$options = $model->find_all()->as_array();
				foreach($options as $option){
					$filter['options'][$option->id]=array(
						'value'=>$option->id,
						'label'=>$option->{$setting['field']}
					);
				}
			}
			$filters[$field]=$filter;
		}
		return $filters;
	}
	
	
	/**
	 * Get current filters
	 * @return type
	 */
	public function filters()
	{
		$filters = array();
		foreach($this->_state->get('filter') as $id => $filter){
			$filters[]=(object)array(
				'field'=>$filter['field'],
				'operator'=>$filter['operator'],
				'value'=>$filter['value'],
				'link'=>array(
					$this->_controller.'@list',
					array('query'=>'unfilter='.$id)
				)
			);
		}
		return $filters;
	}
	
	
	/**
	 * get active id
	 * @return int
	 */
	public function active()
	{
		return $this->_state->get('active.id',0);
	}
	
	
	/**
	 * get url for a move action
	 * @return type
	 */
	public function url_move()
	{
		return URL::to($this->_controller.'@move:{{id}}',array('param1'=>'{{rank}}','param2'=>'{{parent}}'));
	}
	
	
	/**
	 * Get sortable
	 * @param type $sortable
	 * @return type
	 */
	public function sortable()
	{
		$filter = $this->_state->get('filter');
		if(count($filter) > 0){
			// filtered: we cant sort the items
			return FALSE;
		} else {
			// check if it is sortable
			return isset($this->_settings['sortable']) ? $this->_settings['sortable'] : FALSE;
		}
	}
	
	/**
	 * Check if an item is movable
	 * @param obj $item
	 * @return boolean
	 */
	public function movable($item)
	{
		if(
			$this->sortable()
			&& (!isset($item->movable) || $item->movable == '1')
			&& $this->_acl->allowed($this->_controller,'update',$item)
		){
			return TRUE;
		} else {
			return FALSE;
		}
	}
}