<?php
class Viewer_Default_Form extends Viewer
{
	protected $_unique = 0;
	
	protected $_text = FALSE;
	

	public function text($text)
	{
		$this->_text = $text;
		return $this;
	}

	
	public function title()
	{
		return $this->_title;
	}
	
	public function attributes()
	{
		return $this->raw()->attributes();
	}
	
	public function classes($classes)
	{
		if(is_string($classes)){
			$classes = explode(' ',$classes);
		}
		return implode(' ',$classes);
	}
	
	
	
	/**
	 * Create form html
	 * @return string
	 */
	public function html()
	{
		// normalize the elements to a nice nested array
		$normalized = $this->normalize($this->_data->elements);
		
		// render that array
		return $this->render($normalized);
	}
	
	
	
	/**
	 * normalize groups to a nested array of nodes
	 * @param array $elements
	 * @return object (node)
	 */
	protected function normalize($elements)
	{
		// create root node
		$node = $this->node('root');
		
		for($i=0; $i<count($elements); $i++){
			// current element
			$element = $elements[$i];

	
			if($element instanceof Form_Element){
				// close open columns or tabs wrappers
				$node = $this->wrapper_close($element,$node);
				// add a real element
				$node->children[]= $this->node('element',$element,$node);
			} else {
				// markup element
				switch($element->type){
					case 'tabs':
					case 'tab':
					case 'columns':
					case 'column':
					case 'section':
					case 'line':
						// first close similar or higher groups
						$node = $this->group_close($element->type,$node);
						// close open columns or tabs wrappers
						$node = $this->wrapper_close($element,$node);
						// create new group
						$node = $this->group_open($element,$node);
						break;
					case '/tabs':
					case '/tab':
					case '/columns':
					case '/column':
					case '/section':
					case '/line':
						// close group
						$node = $this->group_close($element->type,$node);
						break;
					default:
						// close open columns or tabs wrappers
						$node =  $this->wrapper_close($element,$node);
						// add to nodes children
						$node->children[]= $this->node('markup',$element,$node);
				}
			}
		}
		
		// rewind to root node
		while($node->parent !== FALSE){
			$node = $node->parent;
		}
		// return the normalized object
		return $node;
	}
	
	
	
	/**
	 * create a normalized node
	 * @param string $type
	 * @param object $element
	 * @param object(node) $parent
	 * @return object(node)
	 */
	protected function node($type,$element=FALSE,$parent=FALSE)
	{
		return (object)array(
			'type'=>$type,
			'element'=>$element,
			'children'=>array(),
			'parent'=>$parent
		);
	}
	
	
	
	/**
	 * Create a new node and return it
	 * @param object $element
	 * @param object $node
	 * @return object(node)
	 */
	protected function group_open($element,$node)
	{
		// tab-nodes must be directly nested in an empty tabs-node
		if($element->type === 'tab' && $node->type !== 'tabs'){
			$tabs = $this->node('tabs',FALSE,$node);
			$node->children[]=$tabs;
			$node = $tabs;
		}
		
		// column-nodes must be directly nested in an empty columns-node
		if($element->type === 'column' && $node->type !== 'columns'){
			$columns = $this->node('columns',FALSE,$node);
			$node->children[]=$columns;
			$node = $columns;
		}
		
		// create a new childnode
		$child = $this->node($element->type,$element,$node);
		
		// add it to the node's children
		$node->children[] = $child;
		
		// return it as the new node
		return $child;
	}
	
	
	/**
	 * traverse up to one above the given type
	 * return that node
	 * @param string $type
	 * @param object $node
	 * @return object(node)
	 */
	protected function group_close($type,$node)
	{
		$type = trim($type,'/');
		
		// order of elements
		$order = array(
			'root'=>0,
			'tabs'=>1,
			'tab'=>2,
			'columns'=>3,
			'column'=>4,
			'section'=>5,
			'line'=>6,
		);
		
		while(
			// while we're not at the root
			$node->parent !== FALSE
			// close groups with a higher order numbers
			&& $order[$node->type] >= $order[$type]
		){
			// traverse up to the parent-node
			$node = $node->parent;
		}
		return $node;
	}
	
	
	/**
	 * If the given node is 'tabs' or 'columns'
	 * and the given element is not 'tab' or 'column'
	 * Traverse up one layer, so that other elements cant be directly nested in tabs or columns
	 * @param object $element
	 * @param object $node
	 * @return object(node)
	 */
	protected function wrapper_close($element,$node)
	{
		// other nodes than tab-nodes cannot be placed directly in a tabs node
		if($node->type === 'tabs' && $element->type !== 'tab'){
			$node = $this->group_close('tabs',$node);
		}

		// other nodes than column-nodes cannot be placed directly in a columns node
		if($node->type === 'columns' && $element->type !== 'column'){
			$node = $this->group_close('columns',$node);
		}

		return $node;
	}
	
	
	/**
	 * Render a normalized element node tree
	 * @param object $node
	 * @return string
	 */
	protected function render($node)
	{
		switch($node->type){
			case 'element':
				return $this->element($node->element);
				break;
			case 'markup':
				return $this->markup($node->element);
				break;
			case 'line':
			case 'section':
				$html = '';
				foreach($node->children as $child){
					$html.= $this->render($child);
				}
				return $this->group($node->element,$html);
				break;
			case 'column':
			case 'tab':
			case 'root':
				$html = '';
				foreach($node->children as $child){
					$html.= $this->render($child);
				}
				return $html;
			case 'columns':
				$columns = array();
				foreach($node->children as $column){
					$column->html = $this->render($column);
					$columns[]= $column;
				}
				return $this->columns($columns);
				break;
			case 'tabs':
				$tabs = array();
				foreach($node->children as $tab){
					$tab->html = $this->render($tab);
					$tabs[]= $tab;
				}
				return $this->tabs($tabs);
				break;
		}
	}
	
	
	
	/**
	 * Render an element
	 * @param object $element
	 * @return string
	 */
	protected function element($element)
	{

		// set id
		if(!isset($element->attributes['id'])){
			$element->id = $this->id();
			$attributes = $element->attributes;
			$attributes['id'] = $element->id;
			$element->attributes = $attributes;
		} else {
			$element->id = $element->attributes['id'];
		}
		
		// set class
		if(!isset($element->attributes['class'])){
			// set bootstap class
			$attributes['class']= '';
		} 
		
		// set label
		if(!$element->label){
			if($element->text){
				$element->label = $this->_text->get($element->text);
			} else {
				$element->label = $this->_text->get('label.'.$element->key);
			}
		}
		
		// set error
		if($error = $element->error()){
			// create  errormessage
			$element->error = $this->_text->get('error.'.$element->key.'.'.$error);
		} else {
			$element->error = FALSE;
		}
		
		// set comment
		if(!isset($element->comment)){
			if($comment = $this->_text->get('comment.'.$element->key)){
				$element->comment = $comment;
			} else {
				$element->comment = FALSE;
			}
		}

		// set default view
		$view = 'form/element';
		
		// render the element itself
		switch($element->type){
			case 'radio':
			case 'checkbox':
			case 'select':
				if(Arr::is_assoc($element->options) === FALSE){	
					$options = array();
					foreach($element->options as $value=>$label){
						$value = $label;
						$label = $this->_text->get('option.'.$element->key.'.'.$value);
						$options[$value] = $label;
					}
					$element->options = $options;
				} 
				
				if($element->type === 'radio'){
					$view = 'form/radio';
				}
				
				if($element->type === 'checkbox'){
					$view = 'form/checkbox';
				}
				
				if($element->type === 'select'){
					if(isset($element->first_option)){
						$option = $element->first_option;
						$value = is_array($option) && isset($option['value'])?$option['value']:$option;
						$label = is_array($option) && isset($option['label'])?$option['label']:$this->_text->get('option.'.$element->key.'.'.$value);
						// add to the beginning of options
						$reverse = array_reverse($element->options, TRUE);
						$reverse[$value] = $label;
						$element->options = array_reverse($reverse, TRUE); 
					}
					// set bootstap class
					$attributes['class'].= ' form-control';
				
					$element->html = FormHTML::select($element->name,$element->options,$element->value,$attributes);
				}
				break;
			case 'hidden':
				$view = FALSE;
				$element->html = FormHTML::hidden($element->name,$element->value,$attributes);
				break;
			case 'submit':
				$view = FALSE;
				$label = isset($element->label)?$element->label:$this->_text->get('label.'.$element->key);
				$element->html = FormHTML::submit($element->name,$label,$attributes);
				break;
			case 'btn':
				$view = FALSE;
				$label = isset($element->label)?$element->label:$this->_text->get('label.'.$element->key);
				$href = isset($element->href)?$element->href:'#'; 
				$element->html = HTML::anchor($href,$label,$attributes);
				break;
			case 'button':
				$view = FALSE;
				$label = isset($element->label)?$element->label:$this->_text->get('label.'.$element->key);
				$element->html = FormHTML::button($element->name,$label,$attributes);
				break;
			case 'file':
				$element->html = FormHTML::file($element->name,$attributes);
				break;
			case 'image':
				$element->html = FormHTML::image($element->name, $element->value, $attributes,FALSE);
				break;
			case 'text':
			case 'password':
				if(!isset($attributes['placeholder'])){
					$attributes['placeholder'] = $this->_text->get('placeholder.'.$element->key);
				}
			
				// set bootstap class
				$attributes['class'].= ' form-control';
		
				if($element->type === 'text'){
					$element->html = FormHTML::input($element->name,$element->value,$attributes);
				}
				if($element->type === 'password'){
					$element->html = FormHTML::password($element->name,$element->value,$attributes);	
				}
				break;
			case 'textarea':
				$attributes['class'].= ' form-control';
				
				$element->html = FormHTML::textarea($element->name,$element->value,$attributes,FALSE);
				break;
			default:
				$element->html = View::factory('form/'.$element->type,array(
					'viewer'=>$this,
					'element'=>$element
				))->render();
		}
		
		// wrap element
		if($view){
			$html = View::factory($view,array('element'=>$element))->render();
		} else {
			$html = $element->html;
		}
		
		return $html;
	}
	
	
	
	/**
	 * Render markup
	 * @param object $element
	 * @return string
	 */
	protected function markup($element)
	{
		$html = View::factory('form/markup/'.$element->type,array(
			'viewer'=>$this,
			'element'=>$element
		))->render();
		return $html;
	}
	
	
	
	/**
	 * Render a group with content of given html
	 * if no valid element is given, just return the html (in case of the root group)
	 * @param object $element
	 * @param string $html
	 * @return string
	 */
	protected function group($element,$html)
	{
		if($element){
			// set label
			$element->label = isset($element->label) ? $element->label : (
				$element->key ? $this->_text->get('label.'.$element->key) : FALSE
			);
			$html = View::factory('form/group/'.$element->type,array(
				'viewer'=>$this,
				'group'=>$element,
				'html'=>$html
			))->render();
			
			return $html;
		} else {
			return $html;
		}
	}
	
	
	/**
	 * Render columns
	 * @param array $columns
	 * @return string
	 */
	protected function columns($columns)
	{
		$prepared = array();
		// distribute spans
		$total = 0;
		$defined = 0;
		foreach($columns as $column){
			// get total colspans by manually defined spans
			$total += isset($column->element->span)?$column->element->span:0;
			// get numer of defined columns
			$defined += isset($column->element->span)?1:0;
		}
		// dont divide by zero
		$undefined = count($columns)-$defined > 0 ?count($columns)-$defined : 1;
		// get the remaing spans and divide them amongst the undefined columns, round down
		$default = floor ( (12-$total) / $undefined );
		// with a minimum of one
		$default = $default == 0 ? 1 : $default;
		
		foreach($columns as $column){
			$element = $column->element;
			$element->html = $column->html;
			$element->attributes['class'] .= ' col-md-'.(isset($element->span)?$element->span:$default);
			$element->label = isset($element->label) ? $element->label : (
				$element->key ? $this->_text->get('label.'.$element->key) : FALSE
			);
			$prepared[]=$element;
		}
		
		$html = View::factory('form/group/columns',array(
				'viewer'=>$this,
				'columns'=>$prepared,
			))->render();
		
		return $html;
	}
	
	
	
	/**
	 * Render tabs
	 * @param array $tabs
	 * @return string
	 */
	protected function tabs($tabs)
	{
		$first = TRUE;
		$prepared = array();
		foreach($tabs as $tab){
			$element = $tab->element;
			$element->attributes['class'] .= ' tab-pane';
			$element->attributes['class'] .= ($first ? ' active' : '');
			$element->active = $first;
			$element->html = $tab->html;
			$element->id = $this->id();
			$element->attributes['id'] = $element->id ;
			$element->label = isset($element->label) ? $element->label : (
				$element->key ? $this->_text->get('label.'.$element->key) : FALSE
			);
			$prepared[]=$element;
			$first = FALSE;
		}
		
		$html = View::factory('form/group/tabs',array(
				'viewer'=>$this,
				'tabs'=>$prepared,
			))->render();
		
		return $html;
	}
	
	
	
	protected function id()
	{
		$this->_unique++;
		return 'form_'.$this->_data->id.'_element_'.$this->_unique;
	}
}