<?php

class Model_Tree extends Model_Item
{
	// column names
	protected $_table_columns = array(
		'id'=>'int',
		'parent_id'=>'int',
		'alias'=>'varchar',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		'rank'=>'int',
		'deletable'=>'int',
		'movable'=>'int',
		'status'=>'varchar',
		'title'=>'varchar',

		'website_id'=>'varchar',
		'owner_id'=>'int',
		'editor_id'=>'int',
	);
	
	// items sortable
	protected $_sortable = FALSE;
	
	// the created tree
	protected $_tree = FALSE;
	
	// the depth of a node
	protected $_depth = 0;
	
	// the node's shildren
	protected $_children = array();
	
	/**
	 * get / set the depth of a node
	 * @param type $depth
	 * @return type
	 */
	public function depth($depth=FALSE)
	{
		if($depth===FALSE){
			return $this->_depth;
		} else {
			$this->_depth = $depth;
		}
	}
	
	/**
	 * add a child
	 */
	public function child($child)
	{
		$this->_children[]=$child;
	}
	
	
	/**
	 * get or set children
	 */
	public function children($children = FALSE)
	{
		if($children===FALSE){
			return $this->_children;
		} else {
			$this->_children = $children;
		}
	}
	
	
	/**
	 * get list of items
	 *
	 * @return array
	 */
	public function items($parent = 0)
	{
		return $this->branch($parent)->items();
	}
	
	
	/**
	 * Model_Item::branch()
	 * get a branch from the tree
	 * set wrapped to get the wrapping branche node as well
	 * 
	 * @param integer $id
	 * @param bool $include include the node belonging to $id
	 * @return
	 */
	public function branch($id=0,$include=FALSE)
	{
		// get id
		$id = $this->_id($id);
		// get a tree
		$tree = $this->tree();
		// return a branch of the tree
		return $tree->branch($id,$include);
	}
	
	
	/**
	 * convert alias to id or just return id
	 * 
	 * @param mixed $id
	 * @return id or FALSE
	 */
	protected function _id($id){
		if(is_numeric($id)){
    		// id is given
    		return (int)$id;
   		} else {
   			// alias is given: get the id
			$query = DB::select($this->_table_name.'.id')
	    			->from($this->_table_name)
	    			->where($this->_table_name.'.alias','=',$id);
			
			$this->apply_filters($query);
			$result = $query->execute()->as_array();

			if(isset($result[0])){
				return $result[0]['id'];
			} 
		}
		return FALSE;
	}
	
	
	/**
	 * Model_Item::move()
	 * Move a node within a branch
	 * 
	 * @param integer $after item-id after which this should be moved. 
	 * FALSE if it should be move to the top
	 * TRUE (default) if it should be moved to the bottom
	 * @param integer $parent new parent id
	 *  * @return void
	 */
	public function move($after = TRUE,$parent=FALSE)
	{
		// check if it is loaded
		if($this->loaded()==false){
			throw HTTP_Exception::factory(500,'Trying to move unloaded item');
		}
		
		if($parent!==FALSE){
			$this->parent_id = $parent;
		}
		
		// set init values
		$current=1;
		$placed = FALSE;
		
		// get the sibling ids
		$siblings =  DB::select($this->_table_name.'.id')
		->from($this->_table_name)
		->where($this->_table_name.'.parent_id','=',$this->parent_id)
		->where($this->_table_name.'.id','<>',$this->id)
		->order_by('rank','ASC')
		->execute()
		->as_array();

		// re-sort the siblings. maybe optimze: this does a lot of queries for a long list.
		foreach($siblings as $sibling){
			// place as first
			if($after === FALSE && $placed == FALSE){
				$this->rank = $current;
				$current++;
				$placed = TRUE;
			} 
			
			// update the sibling
			DB::update($this->_table_name)
				->set(array('rank'=>$current))
				->where($this->_table_name.'.id','=',$sibling['id'])
				->execute();
			
			// place item?
			if($after !== FALSE &&  $after !== TRUE && $sibling['id'] == $after && $placed == FALSE){
				$current++;
				$this->rank = $current;
				$placed = TRUE;
			}
			
			// increment rank	
			$current++;
		}
		
		if($placed === FALSE){
			// if not placed, place it as the next highest
			$this->rank = $current;
		} 
		
		// save it
		$this->save();
	}
	
	
	/**
	 * Delete an item
	 * @param bool $branch Delete the entire branch
	 * 
	 * @return void 
	 */
	public function delete($branch=TRUE)
	{
		// check if it is loaded
		if($this->loaded()==false){
			throw HTTP_Exception::factory(500,'Trying to delete unloaded item');
		}
		
		if($branch === FALSE){
			// save deleted
			$deleted = array(clone($this));
			// just delete item
			parent::delete();
			// return it
			return $deleted;
		} else {
			// get id
			$id = $this->id;
			// unload
			$this->clear();
			// get tree
			$tree = $this->tree();
			// get the wrapped branch
			$items = $tree->branch($id,TRUE)->items();
			// go through items and delete all, save deleted
			$deleted = array();
			foreach($items as $item){
				$deleted[]=clone($item);
				$item->delete(FALSE);
			}
			// return deleted
			return $deleted;
		}
	}
	
	
	/**
	 * Model_Item::_tree()
	 * select all items and pass them to a tree
	 * 
	 * @return void
	 */
	public function tree($reload = FALSE)
	{		
		// return cached tree if that's ok
		if($this->_tree!==FALSE && $reload === FALSE){
			return $this->_tree;
		}
		
		// clear all
		$this->clear();
	
		//  sort items by rank
		if($this->_sortable === TRUE){
			$this->order_by($this->_table_name.'.rank','ASC');
		} 
		
		//get items
		$items = $this->find_all()->as_array();
		
		// fill up & cache tree
		$this->_tree = Tree::factory($items);
		
		// return it
		return $this->_tree;
	}
}
