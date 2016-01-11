<?php

class Model_Default_Item extends Model_Base
{
	// constants
	const STATUS_NEW = 'new';
	const STATUS_EDIT = 'edit';
	const STATUS_REVIEW = 'review';
	const STATUS_LIVE = 'live';

	// column names
	protected $_table_columns = array(
		'id'=>'int',
		'alias'=>'varchar',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		'rank'=>'int',
		'deletable'=>'int',
		'movable'=>'int',
		'status'=>'varchar',
		'title'=>'varchar',
		
		'group_id'=>'varchar',
		'website_id'=>'varchar',
		'owner_id'=>'int',
		'editor_id'=>'int',
	);


	// sortable
	protected $_sortable = FALSE;
	
	
	/**
	 * Set the sortable property
	 * @return type
	 */
	public function sortable($sortable = '__getter__')
	{
		if($sortable === '__getter__'){
			return $this->_sortable;
		}
		$this->_sortable = $sortable;
		// chainable
		return $this;
	}
	
	/**
	 * Get collection info from _belongs_to array
	 * Get collection info from has_many array
	 * @return array
	 */
	public function collections()
	{
		$collections = array();
		
		foreach($this->_belongs_to as $key=>$data){
			// check if the model starts with Collection_
			$parts = explode('_',$data['model']);
			$first = array_shift($parts);
			if($first === 'Collection'){
				// add the needed collection data to the output
				$collections[]= array(
					'type'=>'collection',
					'key'=>$key,
					'column'=>$data['foreign_key'],
					'collection'=>implode('_',$parts),
					'meta'=> isset($data['meta']) ? $data['meta'] : array()
				);
			}
		}
		foreach($this->_has_many as $key=>$data){
			// check if the through key is set
			if(isset($data['through']) &&  $data['through'] != ''){
				// add the needed collection data to the output
				$collections[]= array(
					'type'=>'many_through',
					'key'=>$key,
					'meta'=> isset($data['meta']) ? $data['meta'] : array()
				);
			}
		}
		return $collections;
	}
	
	
	/**
	 * get list of items
	 *
	 * @return array
	 */
	public function items()
	{
		if($this->_sortable === TRUE){
			$this->order_by($this->_table_name.'.rank','ASC');
		}
		// get all items
		return $this->find_all()->as_array();
	}
	

	/**
	 * Model_Item::move()
	 * Move an item 
	 * 
	 * @param integer $after items after which this should be moved. 
	 * FALSE if it should be move to the top
	 * TRUE (default) if it should be moved to the bottom
	 * @return void
	 */
	public function move($after=TRUE)
	{
		// check if it is loaded
		if($this->loaded()==false){
			throw HTTP_Exception::factory(500,'Trying to move unloaded item');
		}
		
		// set init values
		$current = 1;
		$placed = FALSE;
		
		// get all the entries		
		$items =  DB::select($this->_table_name.'.id')
		->from($this->_table_name)
		->where($this->_table_name.'.id','<>',$this->id)
		->order_by('rank','ASC')
		->execute()
		->as_array();
				
		// re-sort the siblings. maybe optimze: this does a lot of queries for a long list.
		foreach($items as $item){
			// place as first
			if($after === FALSE && $placed == FALSE){
				$this->rank = $current;
				$current++;
				$placed = TRUE;
			} 

			// update the sibling
			DB::update($this->_table_name)
				->set(array('rank'=>$current))
				->where($this->_table_name.'.id','=',$item['id'])
				->execute();
			
			// place item?
			if($after !== FALSE &&  $after !== TRUE && $item['id'] === $after && $placed == FALSE){
				$current++;
				$this->rank = $current;
				$placed = TRUE;
			}
			
			// increment rank	
			$current++;
		}
		
		// if not placed, place it as the next highest
		if($placed === FALSE){
			$this->rank = $current;
		}
		
		// save
		$this->save();
	}
}