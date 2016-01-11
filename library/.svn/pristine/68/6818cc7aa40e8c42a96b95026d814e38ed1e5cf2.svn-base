<?php
/**
 * Class that created a list with items woth an added ->depth property
 * Also creates a nested structure with add->depth and ->children property
 */
class Tree
{
	
	public static function factory($data, $map = FALSE, $root = 0)
	{
		// create new tree
		$tree = new Tree($data, $map, $root);

		// return it
		return $tree;
	}
	
	
	// the raw data
	protected $_data = array();
	// root node
	protected $_root = 0;
	// mapped nodes
	protected $_map = array();
	// prepared items
	protected $_items = array();
	// prepared structure
	protected $_structure = array();

	
	/**
	 * Cosntructor
	 * @param array $data
	 * @param array $map
	 */
	protected function __construct($data, $map = FALSE, $root = 0)
	{
		$this->_data = $data;
		$this->_map = $map;
		$this->_root = $root;
		
		if($map === FALSE){
			// create map
			$this->map();
		} 
	}
	
	
	/**
	 * Creates _map, an array of the form:
	 *[
	 *  $item->id=>[
	 * 		'item'=>$item,
	 * 		'id' => $id
	 * 		'parent' => $id
	 * 		'children'=>[$id,$id,...],
	 * 		'descendants'=>[$id,$id,...],
	 * 	],
	 * 	.
	 * 	.
	 * ]
	 * @return void
	 */
	protected function map()
	{		
		// empty map 
		$this->_map = array();
		
		// create map 
		foreach($this->_data as $item){
			if(!isset($this->_map[$item->id])){
				// item was not yet encountered
				$this->_map[$item->id] = array(
					'id'=>$item->id,
					'item'=>$item,
					'parent'=>$item->parent_id,
					'children'=>array(),
					'descendants'=>array(),
				);
			} else {
				// item was encountered as being someone's parent
				// supply it with the actual item and parent
				$this->_map[$item->id]['id'] = $item->id;
				$this->_map[$item->id]['item'] = $item;
				$this->_map[$item->id]['parent'] = $item->parent_id;
			}

			if(!isset($this->_map[$item->parent_id])){
				// this item doesnt exist yet: create a placeholder
				// item and parent might be filled in later, or maybe not
				// for instance for parent_id = 0
				$this->_map[$item->parent_id] = array(
					'id'=>$item->parent_id,
					'item'=>FALSE,
					'parent'=>FALSE,
					'children'=>array(),
					'descendants'=>array(),
				);
			}
			// add the item to the parents children
			$this->_map[$item->parent_id]['children'][] = $item->id;
			// add the item to the parents descendants
			$this->_map[$item->parent_id]['descendants'][] = $item->id;
			
			// traverse up from item
			$traverser = $this->_map[$item->id];
			// precaution: check for self-nested branches
			$parents = array();
			$recursive = FALSE;
			while(isset($this->_map[$traverser['parent']]) && $recursive === FALSE){
				// check if parent was encountered before
				// if so, there is recursion somewhere
				if(in_array($traverser['parent'],$parents)){
					$recursive = TRUE;
				}
				$parents[] = $traverser['parent'];
				
				// add the descendants of the traverser to the descendants of the parent of the traverser
				// also make sure there are no doubles
				$this->_map[$traverser['parent']]['descendants'] = array_unique(array_merge(
					$this->_map[$traverser['parent']]['descendants'],
					$traverser['descendants']
				));
		
				// next step: set the $traverser as the parent of the $traverser
				// to move one step up the chain
				$traverser = $this->_map[$traverser['parent']];
			}
		}
	}
	
	
	/**
	 * prepare a list and a nested structure
	 * @param int $max
	 * @param int $depth
	 * @return mixed
	 */
	protected function prepare($max=FALSE,$depth=0,$id=FALSE)
	{
		// startup of prepare function
		if($id === FALSE){
			// create an empty items array
			$this->_items = array();
			// create empty structure array
			$this->_structure = array();
		}
		// check if the max depth was not exceeded
		if($max !== FALSE && $depth > $max){
			return;
		}
		
		
		if($id === FALSE){
			// start with root id
			$id = $this->_root;
			// start-item is a dummy object, wont be used so dont add to the prepared _items list
			$item = FALSE;
			// get elements with this id as parent
			if(is_numeric($id)){
				$children = array_keys(array_filter($this->_map,create_function('$array','return $array["parent"]=='.$id.';')));
			} else {
				$children = array();
			}
			// set these as the base depth 0 array of our structure
			// the rest of the structure will be nested in the ->children key of these items
			foreach($children as $childId){
				$this->_structure[]=$this->_map[$childId]['item'];
			}
		} else {
			// get the item
			$item = $this->_map[$id]['item'];
			// add the item to the prepared items list
			$this->_items[] = $item;
			// get it's children
			$children = $this->_map[$id]['children'];
		}

		// go through children
		foreach($children as $childId){
			// get the child item
			$child =$this->_map[$childId]['item'];
			// set the depth in the child
			$child->depth($depth);
			// add the child to the item's children
			// but only if there actually is an item
			if($item){
				$item->child($child);
			}

			// *** RECURSIVE: prepare with the child as $id
			$this->prepare($max, $depth+1, $childId);
		}
	}
		
	
	
	/**
	 * Cut a branch
	 * @param int $id
	 * @param also cut the $id itself $include
	 * @return \Tree
	 */
	public function cut($id, $include = TRUE)
	{
		// check if id exists at all
		if(isset($this->_map[$id])){
			// get descendants to remove
			$remove = isset($this->_map[$id])?$this->_map[$id]['descendants']:array();
			// remove the item itself or not
			if($include == TRUE){
				// if the id itself must also be deleted
				// add the id to the removal array
				$remove[]=$id;
				// remove the id from the parent's children
				if(isset($this->_map[$this->_map[$id]['parent']])){
					$this->_map[$this->_map[$id]['parent']]['children'] = array_diff(
						$this->_map[$this->_map[$id]['parent']]['children'],
						array($id,'cant-make-a-single-int-array-without-this-part')
					);
				}
			} else {
				// dont delete the id itself
				// but this node doesnt have any descendants anymore
				$this->_map[$id]['children'] = array();
				$this->_map[$id]['descendants'] = array();
			}

			// traverse up from item to remove decsendants
			$traverser = $this->_map[$id];

			// precaution: check for self-nested branches
			$parents = array();
			$recursive = FALSE;
			while(isset($this->_map[$traverser['parent']]) && $recursive === FALSE){
				// check if parent was encountered before
				// if so, there is recursion somewhere
				if(in_array($traverser['parent'],$parents)){
					$recursive = TRUE;
				}
				$parents[] = $traverser['parent'];

				// remove the identified descendants from the descendants of the parent of the traverser
				$this->_map[$traverser['parent']]['descendants'] = array_diff(
					$this->_map[$traverser['parent']]['descendants'],
					$remove
				);

				// next step: set the $traverser as the parent of the $traverser
				// to move one step up the chain
				$traverser = $this->_map[$traverser['parent']];
			}

			// now actually remove the items themselves
			foreach($remove as $removeId){
				unset($this->_map[$removeId]);
			}
		}
		// return this for chaining
		return $this;
	}
	
	
	/**
	 * Get a branch
	 * @param int $node
	 * @param bool $include include the wanted node itself
	 * @return Tree
	 */
	public function branch($id, $include = FALSE)
	{
		// get descendant ids
		$descendants = isset($this->_map[$id])?$this->_map[$id]['descendants']:array();
		// get all descendants
		$data = array();
		$map = array();
		foreach($descendants as $descendant){
			$data[]= $this->_map[$descendant]['item'];
			$map[$descendant]=$this->_map[$descendant];
		}
		// new root is the wanted node
		$root = $id;

		if($include == TRUE){
			// prepend items with from item
			if(isset($this->_map[$id]['item']) && $this->_map[$id]['item']!== FALSE){
				// when the parent is an actual element
				// prepend data
				array_unshift( $data, $this->_map[$id]['item'] );
				// new root is the node's parent
				$root = $this->_map[$id]['parent'];
			}
			if(isset($this->_map[$id])){
				$map[$id] =  $this->_map[$id];
			}
		}


			
		// new tree with prepared map
		return Tree::factory($data,$map,$root);
	}
	
	
	/**
	 * Get a nested structure
	 * @param int $depth
	 * @return array
	 */
	public function structure()
	{
		// prepare
		$this->prepare();

		// return structure
		return $this->_structure;
	}
	
	
	/**
	 * Get items
	 * @return array
	 */
	public function items($depth = FALSE)
	{
		// prepare
		$this->prepare($depth);
		
		// return structure
		return $this->_items;
	}
	
	
	/**
	 * Get Path for a specific id
	 * @return array Array of items starting with the lowest depth
	 */
	public function path($id,$include = TRUE)
	{
		if(!isset($this->_map[$id])){
			return array();
		}
		// traverse up from item
		$traverser = $this->_map[$id];
		
		if($include === TRUE){
			$path = array($traverser['item']);
		} else {
			$path = array();
		}
		
		// precaution: check for self-nested branches
		$parents = array();
		$recursive = FALSE;
		while(isset($this->_map[$traverser['parent']]) && $recursive === FALSE){
			// check if parent was encountered before
			// if so, there is recursion somewhere
			if(in_array($traverser['parent'],$parents)){
				$recursive = TRUE;
			}
			// add to path
			array_unshift($path,$this->_map[$traverser['parent']]['item']);
			
			// next step: set the $traverser as the parent of the $traverser
			// to move one step up the chain
			$traverser = $this->_map[$traverser['parent']];
		}
		return $path;
	}
}