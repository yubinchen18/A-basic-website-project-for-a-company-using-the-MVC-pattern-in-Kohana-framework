 <?php
class Viewer_Default_Navigation extends Viewer
{
		// acl
	protected $_acl = FALSE;
	
	// request
	protected $_request = FALSE;

	// breadcrumbs in the array
	protected $_breadcrumbs = array();
	
	// title of the cuurent page
	protected $_title = '';
	
	// item (only if relevant)
	protected $_item = FALSE;
	
	
	/**
	 * Get / Set request
	 * @param type $request
	 * @return type
	 */
	public function request($request=FALSE)
	{
		if($request === FALSE){
			return $this->_request;
		} else {
			$this->_request = $request;
			return $this;
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
			return $this;
		}
	}
	
	
	/**
	 * Add a breadcrumb
	 * @param type $label
	 * @param type $href
	 */
	public function breadcrumb($label,$href)
	{
		$this->_breadcrumbs[]=(object)array(
			'label'=>$label,
			'href'=>$href,
			'first'=>count($this->_breadcrumbs) == 0
		);
		return $this;
	}
	
	
	/**
	 *  retrieve all the breadcrumbs
	 * @return type
	 */
	public function breadcrumbs()
	{
		return $this->_breadcrumbs;
	}
	
	
	/**
	 * Get or set a title
	 * @param type $title
	 */
	public function title($title = FALSE)
	{
		if($title === FALSE){
			return $this->_title;
		} else {
			$this->_title = $title;
			return $this;
		}
	}
	
	
	/**
	 * Set an item
	 * @param type $item
	 */
	public function item($item)
	{
		$this->_item = $item;
		return $this;
	}
	
	
	/**
	 * get the tools for the navigation
	 * all the information will have to be set to get the tools
	 */
	public function tools()
	{
		$tools = array();
		if(isset($this->_settings['tools']) && isset($this->_settings['tools'][$this->_request->action()])){
			$toolsSettings = $this->_settings['tools'][$this->_request->action()];
			foreach($toolsSettings as $key => $value){
				$tool = array(
					'id'=>$this->_item !== FALSE ? $this->_item : FALSE,
					'action'=>'',
					'controller'=>$this->_request->controller(),
					'link'=>$this->_request->controller(),
					'text'=>'',
					'attributes'=>array(),
					'view'=>FALSE,
					'acl'=>TRUE
				);
				
				if(is_numeric($key)){
					// it is a numeric element
					// but in the case there also is a key with this name
					// use that one and skip this
					if(isset($toolsSettings[$value])){
						continue;
					}
					// value is action: everything default
					$tool['action'] = $value;
					$tool['link'] = $this->_request->controller().'@'.$value.($this->_item !== FALSE ? ':'.$this->_item->id:'');
					$tool['text'] = 'label.'.$value;
				} else {
					// set key as action
					$tool['action'] = $key;
					$tool['link'] = $this->_request->controller().'@'.$key.($this->_item !== FALSE ? ':'.$this->_item->id:'');
					$tool['text'] = 'label.'.$key;
					// complement / overwrite settings
					foreach($value as $param=>$setting){
						$tool[$param] = $setting;
					}
				}
				
				// check if allowed
				$allowed = $tool['acl'] ? $this->_acl->allowed($this->_request->controller(),$tool['action']) : TRUE;
				
				if($allowed){
					$tools[]=(object)$tool;
				}
			}
		}
		return $tools;
	}
}