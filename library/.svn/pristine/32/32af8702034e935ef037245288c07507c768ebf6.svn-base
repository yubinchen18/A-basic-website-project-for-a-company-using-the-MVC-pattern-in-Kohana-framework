<?php

class Model_Group extends Model_Tree
{

	// table name
	protected $_table_name = 'group';
	
	// columns
	protected $_table_columns = array(
		'id'=>'int',
		'parent_id'=>'int',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		'rank'=>'int',
		'deletable'=>'tinyint',
		'movable'=>'tinyint',
		'updatable'=>'tinyint',
		'title'=>'varchar(255)',
		
		'owner_id'=>'int',
		'editor_id'=>'int',
		'module_id'=>'varchar',
		'website_id'=>'varchar',
	);
	
	// group-items sortable
	protected $_sortable = TRUE;
	
	// amounts of grouped items
	protected $_counts = array(0=>0);
	
	// amount of a loaded group
	protected $_count = 0;
	
	// cached groups
	protected $_groups = FALSE;
	
	/**
	 * set model group_ids to 0 where group id is $id
	 * @param type $id
	 * @param type $model
	 */
	public function ungroup($id,$model)
	{
		DB::update($model->table_name())
		->set(array(
			'group_id'=>0
		))
		->where('group_id','=',$id)
		->execute();
	}

	
	/*
	 * Set the items that are grouped
	 * Get the amount per group id
	 */
	public function grouped($grouped)
	{
		
		// count by group
		foreach($grouped as $item){
			$group = $item->group_id;
			
			if(!isset($this->_counts[$group])){
				$this->_counts[$group] = 0;
			}
			$this->_counts[$group]++;
		}
		// chainable
		return $this;
	}
	
	
	/*
	 * Get or set the count for a loaded item
	 */
	public function count($count = FALSE)
	{
		if($count === FALSE){
			//getter
			return $this->_count;
		} else {
			// setter
			$this->_count = $count;
		}
	}
	
	
	/**
	 * get groups
	 * @return type
	 */
	public function items($parent = 0)
	{
		if($this->_groups === FALSE){
			// get groups only once
			$this->_groups = $this->branch()->items();
			// add amounts to all the groups
			foreach($this->_groups as $group){
				$group->count(isset($this->_counts[$group->id]) ? $this->_counts[$group->id] : 0);
			}
		}
		//return them
		return $this->_groups;
	}
	
	
	/**
	 * get amount of items with group 0
	 */
	public function ungrouped()
	{
		return $this->_counts[0];
	}
}
