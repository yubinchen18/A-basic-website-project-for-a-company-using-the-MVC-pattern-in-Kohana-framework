<?php
class Model_Collection extends Model_Base
{
	// colummn names
	protected $_table_columns = array(
		"id"=>NULL,
		"rank"=>NULL,
		"collection_id"=>NULL,
		"item_id"=>NULL
	);
	
	// the item model name
	// set in the extension of the class
	protected $_item_model = FALSE;

	// flag to check if items were loaded
	protected $_items_loaded = FALSE;
	
	// the items in the collection
	protected $_items = array();
	
	// number of items in current collection
	protected $_item_count = 0;

	// next iterator index, used in next()
	protected $_next = 0;
	
	// filters that are set on the collection, but will be passed on to the item model in ::load()
	protected $_item_filters = array();
	
	
	/**
	 * Add a relation to the collection that shortcuts to the first element of the collection
	 */
	protected function init()
	{
		parent::init();
		
		// first item as 'first' alias
		$this->_belongs_to = array(
			'first'=>array(
				'model'       => $this->_item_model,
				'foreign_key' => 'item_id',
			),
		);
	}
	
	
	/**
	 * delete collection
	 *
	 */
	public function delete()
	{
		if($this->loaded()){
			// delete all the item links
			$this->clean();
			
			// delete collection
			parent::delete();
		}
	}
	
	
	
	/**
	 * delete all links in a collection
	 *
	 */
	public function clean()
	{
		if($this->loaded()){
			DB::delete($this->_table_name)
			->where('collection_id','=',$this->id)
			->execute();
		}
	}
	
	
	/**
	 * store filters
	 * pass them along to the item model later on 
	 */ 
	public function filter($arg1,$arg2=NULL,$arg3=NULL)
	{
		$this->_item_filters[]=array($arg1,$arg2,$arg3);
		// chaniable
		return $this;
	}


	/**
	 * clean collection and fill with given ids
	 *
	 * @param array $ids
	 */
	public function refill($ids=array())
	{
		// delete all links
		$this->clean();
		// create new links
		$this->fill($ids);
	}
	
	

	/**
	 * fill collection with give ids
	 *
	 * @param array $ids
	 */
	public function fill($ids=array())
	{
		// create a collection if it doesn't exist
		if(!$this->loaded()){
			$this->create();
		}
		
		// create links for all given ids
		foreach($ids as $id){
			DB::insert($this->_table_name,array('collection_id','item_id'))
			->values(array($this->id,$id))
			->execute();
		}
		
		// set the first id as item_id in the collection link
		if(isset($ids[0])){
			$first = $ids[0];
		} else {
			$first = 0;
		}
		
		DB::update($this->_table_name)
		->set(array('item_id'=>$first))
		->where('id','=',$this->id)
		->execute();
	}
	
	
	/**
	 * Load the collection items
	 * Will trigger automatically when items(), items(), next(), first(), last() is called
	 *
	 * @param int $id
	 * @param boolean $force
	 * @return boolean
	 */
	public function load($id=FALSE,$force=FALSE)
	{
		if($this->_items_loaded && $force==FALSE){
			// items allready loaded
			return true;
		} 

		if($id == false){
			// if no id was given
			if(!$this->loaded()){
				// ...and no collection was loaded
				// return false
				return false;
			}
		} else {
			// simply set the id internally
			$this->id = $id;
		}
		
		if($this->_item_model == false){
			// there is no model name given for the items
			throw HTTP_Exception::factory(500,'Trying to load collection but _item_model was not set. Provide a model-name in the model class');
		}
		
		// create a item model
		$model = ORM::factory($this->_item_model);
		
		
		// join the collection table
		$model->join(array($this->table_name(),'collection_items'),'INNER')
				->on('collection_items.item_id','=',$model->table_name().'.id')
				->join(array($this->table_name(),'collection'),'INNER')
				->on('collection.id','=','collection_items.collection_id')
				->where('collection.id','=',$this->id)
				->order_by('collection_items.id','ASC');
		
		// apply item filters on model
		foreach($this->_item_filters as $filter){
			$model->filter($filter[0],$filter[1],$filter[2]);
		}

		// get the items
		$this->_items = $model->find_all()->as_array();

		// items were loaded
		$this->_items_loaded = TRUE;
		
		// count them
		$this->_item_count = count($this->_items);
		
		//reset pointer
		$this->_next = 0;
		
		return TRUE;
	}
	
	
	
	/**
	 * load again
	 *
	 */
	public function reload()
	{
		// force-load the collection
		// no id is given to load, as it was stored internally before
		$this->load(false,true);
	}
	
	
	
	/**
	 * get array with ids
	 *
	 * @return array
	 */
	public function ids()
	{
		if($this->_items_loaded == FALSE){
			// fetch ids from db
			$ids = DB::select('item_id')
			->from($this->table_name())
			->where('collection_id','=',$this->id)
			->execute()
			->as_array(NULL,'item_id');
		} else {
			// fetch ids from loaded set
			$ids = array();
			foreach($this->_items as $item){
				$ids[]=$item->id;
			}
		}
		return $ids;
	}
	
	/**
	 * Check if the collection has a certain id
	 * 
	 * Second parameter doe nothing
	 * Just to keep Strict warnings at bay considering ORM::has
	 */
	public function has($id,$far_keys = NULL)
	{
		$ids = $this->ids();
		return (in_array($id,$ids));
	}
	
	
	/**
	 * get array with items
	 *
	 * @return array
	 */
	public function items()
	{
		// load items
		if(!$this->load()){
			return array();
		}
		return $this->_items;
	}
	
	
	
	/**
	 * get items that use the given id in a collection
	 * 
	 * Usage:
	 * We have articles that have a contributor collection
	 * 
	 * now we have a contributor of which we want all the articles he has contributed to
	 * 
	 $contributor = ORM::factory('Contributor',$id);
	 $articles = ORM::factory('Collection_Contributor')->used(
		$contributor,
		ORM::factory('Article')
	 );
	 * 
	 * 
	 * 
	 * @return array
	 */ 
	public function used($idOrModel,$model)
	{
		$model->join(array($this->_table_name,'temp_pivot'),'INNER')
		->on('temp_pivot.collection_id','=',$model->object_name().'.'.$this->_table_name.'_id');
		if(is_numeric($idOrModel)){
			$model->where('temp_pivot.item_id','=',$idOrModel);
		} elseif(is_object($idOrModel)){
			$model->where('temp_pivot.item_id','=',$idOrModel->id);
		} else {
			return array();
		}
		// item_id is also used to cache the first item in the collection
		// we dont want these
		// collection_id is 0 for these instances.
		$model->where('temp_pivot.collection_id','<>',0);
		
		// get the items
		return $model->find_all()->as_array();			
	}
	
	
	
	
	
	/**
	 * return next item in the collection or fals when there are no more items left
	 *
	 * @return mixed Object / false
	 */
	public function next()
	{
		// load items
		if(!$this->load()){
			return false;
		}
		
		if($this->_next+1 > $this->_item_count){
			// the end was reached, reset & return false
			$this->_next = 0;
			$item = false;
		} else {
			// get item
			$item = $this->_items[$this->_next];
			
			// incement current
			$this->_next++;
		}
		

		
		// return it
		return ($item);
	}
	
	
	
	/**
	 * Get the first item or false when there is none
	 *
	 * @return mixed Object / false
	 */
	public function first($only_preloaded = TRUE)
	{
		// check & return preloaded first
		if(isset($this->first) && $this->first->loaded()===TRUE){
			return $this->first;
		} elseif($only_preloaded === FALSE){

			// load items
			if(!$this->load()){
				return FALSE;
			}

			if(isset($this->_items[0])){
				return $this->_items[0];
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	
	/**
	 * Get the last item or false when there is none
	 *
	 * @return mixed Object / false
	 */
	public function last()
	{
		// load items
		if(!$this->load()){
			return FALSE;
		}
		
		if(isset($this->_items[$this->_item_count-1])){
			return $this->_items[$this->_item_count-1];
		} else {
			return FALSE;
		}
	}
	
	/**
	 * get number of items
	 *
	 * @return int
	 */
	public function count()
	{
		// load items
		if(!$this->load()){
			return FALSE;
		}
		return $this->_item_count;
	}
	
	
	
	
	/**
	 * Return array with ids
	 * used to overwrite ORM::as_array, so collection can be used for filling a form
	 *
	 * @return array
	 */
	public function as_array()
	{
		return $this->ids();
	}
}