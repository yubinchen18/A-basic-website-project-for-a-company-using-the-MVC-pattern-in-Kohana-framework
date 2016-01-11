<?php
class Dom
{
	// dom or fragment
	protected $_type = 'node';
	// for dom: tagname
	protected $_tag = NULL;
	// for dom: attributes
	protected $_attributes = array();
	// for dom: children
	protected $_children=array();
	
	// for fragment: html content
	protected $_html = '';
	// anchor for appending
	protected $_anchor='<!--append-->';
	

	/**
	 * Dom::node()
	 * create a Dom with type node
	 * 
	 * @param string $tag
	 * @return Dom
	 */
	public static function node($tag = NULL,$attributes=array())
	{
		return new Dom('node',$tag,$attributes);
	}
	
	
	
	/**
	 * Dom::fragment()
	 * create a Dom with type fragment (contents will be rendere as-is)
	 * 
	 * @param string $html
	 * @return Dom
	 */
	public static function fragment($html='',$anchor='<!--append-->')
	{
		return new Dom('fragment',$html,$anchor);
	}	
	
	
	/**
	 * Dom::__construct()
	 * 
	 * @param string $type: node/fragment
	 * @param string $tagOrHtml: tag or html
	 * @return Dom
	 */
	protected function __construct($type,$tagOrHtml,$attributesOrAnchor)
	{
		$this->_type = $type;
		
		if($this->_type === 'node'){
			$this->_tag = $tagOrHtml;
			$this->_attributes = $attributesOrAnchor;
		} else {
			$this->_html = $tagOrHtml;
			$this->_anchor = $attributesOrAnchor;
		}
	}
	


	/**
	 * Dom::attribute()
	 * add an attribute to the dom element
	 * append instead of overwrite with append = true
	 * 
	 * 
	 * @param string $var
	 * @param string $val
	 * @param bool $append
	 * @param string $separator
	 * @return void
	 */
	public function attribute($var,$val,$append = FALSE, $separator = ' ')
	{
		if($append == TRUE){
			if(isset($this->_attributes[$var])){
				$this->_attributes[$var] = $this->_attributes[$var].$separator.$val;
			} else {
				$this->_attributes[$var]=$val;
			}
		} else {
			$this->_attributes[$var]=$val;
		}
		
		return $this;
	}


	/**
	 * Dom::anchor()
	 * set the spot in ht html that should be replaced by children
	 * 
	 * @param string $anchor
	 * @return void
	 */
	public function anchor($anchor)
	{
		$this->_anchor = $anchor;
	}



	/**
	 * Dom::append()
	 * append child
	 * 
	 * @param mixed $child
	 * @return void
	 */
	public function append($child)
	{
		$this->_children[]=$child;
		return $this;
	}
	
	
	/**
	 * Dom::first_child()
	 * get first child
	 * 
	 * @return
	 */
	public function first_child()
	{
		return $this->child(0);
	}
	
	
	/**
	 * Dom::last_child()
	 * get last child
	 * 
	 * @return
	 */
	public function last_child()
	{
		return $this->child(count($this->_children)-1);
	}
	
	
	/**
	 * Dom::child()
	 * get child by index
	 * 
	 * @param mixed $index
	 * @return
	 */
	public function child($index)
	{
		if(isset($this->_children[$index])){
			return $this->_children[$index];
		} else {
			return FALSE;
		}
	}


	/**
	 * Dom::render()
	 * output html
	 * 
	 * @return string
	 */
	public function render()
	{
		$output = '';
	
		if($this->_type == 'node'){
			// NODE
			
			// open tag
			if($this->_tag != NULL){
				$output .= '<'.$this->_tag.' '.HTML::attributes($this->_attributes).'>'."\n";
			}
			// children
			foreach($this->_children as $child){
				if(is_callable(array($child,'render'))){
					$output.= $child->render()."\n";
				}
			}
			// close tag
			if($this->_tag != NULL){
				$output .= '</'.$this->_tag.'>'."\n";
			}
		} else {
			// FRAGMENT
			
			// children
			foreach($this->_children as $child){
				if(is_callable(array($child,'render'))){
					$output.= $child->render()."\n";
				}
			}
	
			if(strpos($this->_html,$this->_anchor) !== FALSE){
				// replace anchor with children
				$output = str_replace($this->_anchor,$output,$this->_html)."\n";
			} else {
				if(strrpos($this->_html,'</') !== FALSE){
					// put children before last closing tag
					$tagPos = strrpos($this->_html,'</');
					$output = substr($this->_html,0,$tagPos).$output.substr($this->_html,$tagPos);		
				} else {
					// put children after html
					$output = $this->_html.$output;
				}
			}
		} 
		
		return $output;
	}
}