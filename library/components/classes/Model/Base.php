<?php
class Model_Base extends ORM
{
	// persistent sorts
	protected $_sorts=array();
	
	// persistent filters
	protected $_filters=array();
	
	// persistent limit
	protected $_amount=FALSE;
	
	// persistent offset
	protected $_skip=FALSE;
	
	// extra data 
	protected $_data=array();
	
	// related items to delete
	protected $_delete_with=array();

	/**
	 * init: overwrite in children
	 * call parent also
	 */
	protected function init()
	{
		// listen for delete 
		Event::listen($this,Event::BEFORE_DELETE,array($this,'handle_delete'));
	}
	
	
	
	/**
	 * remove automatic relations
	 * @param Bool | string | array $relationOrRelationsOrAll
	 */
	public function without($relationOrRelationsOrAll = FALSE)
	{
		if($relationOrRelationsOrAll === TRUE){
			$this->_load_with = array();
		} else {
			if(!is_array($relationOrRelationsOrAll)){
				$relations = array($relationOrRelationsOrAll);
			} else {
				$relations = $relationOrRelationsOrAll;
			}
			
			$with = array();
			foreach($this->_load_with as $relation){
				if(!in_array($relation, $relations)){
					$with[] = $relation;
				}
			}
			$this->_load_with = $with;
		} 
		return $this;
	}
	
	
	
	public function delete_with()
	{
		return $this->_delete_with;
	}
	
	/**
	 * Get model name without Model_
	 * @return string
	 */
	public function model()
	{
		$model = get_class($this);
		$parts = explode('_',$model);
		array_shift($parts);
		return implode('_',$parts);
	}
	
	/**
	 * Model_Base::data()
	 * set or retrieve data
	 * 
	 * @param string $name
	 * @param mixed $value
	 * @return mixed: void / data
	 */
	public function data($name,$value=null)
	{
		if($value===null){
			if(isset($this->_data[$name])){
				return $this->_data[$name];
			} else {
				return false;
			}
		} else {
			$this->_data[$name] = $value;
		}
	}

	
	/**
	 * create an id IN(1,2,3) filter
	 * @param mixed string of array $columnOrIds
	 * @param array $ids
	 */
	public function in($columnOrIds, $ids = FALSE)
	{
		if($ids === FALSE){
			$column = 'id';
			$ids = $columnOrIds;
		} else {
			$column =$columnOrIds;
		}
		$this->filter($column,'IN',$ids);
		return $this;
	}
	
	
	/**
	 * Model_Base::filter()
	 * add a persistent filter
	 * filter will be applied after all where statements are done
	 * 
	 * @param string $column
	 * @param string $valueOrOperator value or operator
	 * @param mixed $value value or null
	 * @return void
	 */
	public function filter($columnOrFilterArray,$valueOrOperator=NULL,$value=NULL)
	{
		if(is_string($columnOrFilterArray)){
			if($value === NULL){
				$value = $valueOrOperator;
				$operator = '=';
			} else {
				$operator = $valueOrOperator;
			}
			if(!isset($this->_filters[$columnOrFilterArray])){
				$this->_filters[$columnOrFilterArray] = array();
			}
			$this->_filters[$columnOrFilterArray][]=array('operator'=>$operator,'value'=>$value);
		} else {
			$this->_filters[]=$columnOrFilterArray;
		}
		return $this;
	}
	
	
	/**
	 * Model_Base::remove_filter()
	 * remove all filters from given column
	 * will leaves array filters alone
	 * 
	 * @param mixed $column
	 * @return void
	 */
	public function remove_filter($column)
	{
		unset($this->_filters[$column]);
	}
	
	
	/**
	 * Model_Base::remove_filters()
	 * remove all filters 
	 * @return void
	 */
	public function remove_filters()
	{
		$this->_filters = array();
	}
	
	
	
	
	
	/**
	 * Model_Base::sort()
	 * add a persistent sort
	 * sort will be applied after all order_by statements are done
	 * 
	 * @param string $columnOrSorts column or assoc array column => direction
	 * @param mixed $direction string or null
	 * @return void
	 */
	public function sort($columnOrSorts, $direction = 'ASC')
	{
		if(is_array($columnOrSorts)){
			foreach($columnOrSorts as $column => $direction){
				$this->_sorts[$column]=strtoupper($direction);
			}
		} else {
			$this->_sorts[$columnOrSorts]=strtoupper($direction);
		}
		return $this;
	}
	
	
	/**
	 * Model_Base::remove_sort()
	 * remove all sorts from given column
	 * 
	 * @param mixed $column
	 * @return void
	 */
	public function remove_sort($column)
	{
		unset($this->_sorts[$column]);
	}
	

	/**
	 * Model_Base::remove_sorts()
	 * remove all sorts
	 * 
	 * @return void
	 */
	public function remove_sorts()
	{
		$this->_sorts = array();
	}
	
	
	
	/**
	 * Model_Base::amount()
	 * create a limit on the results
	 * 
	 * @param bool $amount
	 * @return
	 */
	public function amount($amount = FALSE)
	{
		$this->_amount = $amount;
		
		return $this;
	}
	
	
	/**
	 * remove amount
	 * @return Model_Base 
	 */
	public function remove_amount()
	{
		$this->_amount = FALSE;
		
		return $this;
	}
	
		
	
	/**
	 * Model_Base::amount()
	 * create a limit on the results
	 * 
	 * @param bool $amount
	 * @return
	 */
	public function skip($skip = FALSE)
	{
		$this->_skip = $skip;
		
		return $this;
	}
	
	
	
	/**
	 * remove amount
	 * @return Model_Base 
	 */
	public function remove_skip()
	{
		$this->_skip = FALSE;
		
		return $this;
	}
	
	/**
	 * Model_Base::apply_filters()
	 * apply filters to a ORM or Database_Query_Builder object
	 * if no object is given: $this is used
	 * 
	 * @param ORM / Database_Query_Builder $object
	 * @return
	 */
	protected function apply_filters($object=null)
	{
		if($object==null){
			$object = $this;
		}
		
		foreach($this->_filters as $column => $filter){
			

			if(is_string($column)){
				if(strpos($column,'.')>-1){
					$column = $column;
				} else {
					if(is_callable(array($object,'object_name'))){
						$column = $object->object_name().'.'.$column;
					} else {
						$column = $this->_object_name.'.'.$column;
					}
				}
				foreach($filter as $filterData){
					$object->where($column,$filterData['operator'],$filterData['value']);
				}	
			} else {
				foreach($filter as $part){
					if(is_array($part)){
						if(isset($part[1])){
							if(strpos($part[1],'.')>-1){
								$part1 = $part[1];
							} else {
								$part1 = $this->_object_name.'.'.$part[1];
								if(is_callable(array($object,'object_name'))){
									$column = $object->object_name().'.'.$column;
								} else {
									$column = $this->_object_name.'.'.$column;
								}
							}
							// normal where's of or_where's
							$object->{$part[0]}($part1,$part[2],$part[3]);
						} else {
							// where-groups
							$object->{$part[0]}();
						}
					} else {
						// where-groups (extra service, pass without array())
						$object->{$part}();
					}
				}
			}
		}
		return $object;
	}
	
	
	/**
	 * Model_Base::apply_sorts()
	 * apply sorts to a ORM or Database_Query_Builder_Select object
	 * if no object is given: $this is used
	 * 
	 * @param ORM / Database_Query_Builder_Select $object
	 * @return
	 */
	protected function apply_sorts($object=null)
	{
		if($object==null){
			$object = $this;
		}
		
		foreach($this->_sorts as $column => $direction){
			if(strpos($column,'.')>-1){
				$column = $column;
			} elseif(strpos($column,':')>-1){
				$parts = explode(':',$column);
				$column = $parts[1];
			} else {
				if(is_callable(array($object,'object_name'))){
					$column = $object->object_name().'.'.$column;
				} else {
					$column = $this->_object_name.'.'.$column;
				}
			}
				
			$object->order_by($column,$direction);

		}
		return $object;
	}
	
	
	
	/**
	 * Model_Base::apply_amount()
	 * apply limit to a ORM or Database_Query_Builder_Select object
	 * if no object is given: $this is used
	 * 
	 * @param ORM / Database_Query_Builder_Select $object
	 * @return
	 */
	protected function apply_amount($object=null)
	{
		if($object==null){
			$object = $this;
		}
		
		if($this->_amount !== FALSE){
			$object->limit($this->_amount);
		}
		
		return $object;
	}
	
	
	
	/**
	 * Model_Base::apply_skip()
	 * apply offset to a ORM or Database_Query_Builder_Select object
	 * if no object is given: $this is used
	 * 
	 * @param ORM / Database_Query_Builder_Select $object
	 * @return
	 */
	protected function apply_skip($object=null)
	{
		if($object==null){
			$object = $this;
		}
		
		if($this->_skip !== FALSE){
			$object->offset($this->_skip);
		}
		
		return $object;
	}
	
	
	
	/**
	 * load a record
	 *
	 * @param mixed $mixed id or assoc array
	 * @return Model
	 */
	public function load($mixed = FALSE)
	{
		if(is_numeric($mixed)){
			// find by id
			$this->where($this->_object_name.'.id','=',$mixed);
		} else if(is_string($mixed)){
			// find by alias
			$this->where($this->_object_name.'.alias','=',$mixed);
		} else if(is_array($mixed)){
			// find by other
			foreach($mixed as $var=>$val){
				$this->where($this->_object_name.'.'.$var,'=',$val);
			}
		}
		// get it
		$this->find();

		//return this
		return $this;
	}
	
	/**
	 * Model_Base::find()
	 * apply filters and sorts before find
	 * 
	 * @return
	 */
	public function find()
	{
		$this->apply_filters();
		$this->apply_sorts();
		$this->apply_amount();
		$this->apply_skip();
		return parent::find();
	}
	
	
	/**
	 * Model_Base::find_all()
	 * apply filters and sorts before find all
	 * 
	 * @return
	 */
	public function find_all()
	{
		$this->apply_filters();
		$this->apply_sorts();
		$this->apply_amount();
		$this->apply_skip();
		return parent::find_all();
	}
	
	/**
	 * Does the same as as_array
	 * but also load the ids of has_many ans has_many_though relations
	 * Careful: this does extra queries!
	 * @return type
	 */
	public function as_map()
	{
		$map = parent::as_array();
		foreach($this->has_many() as $key => $data){
			
			$items = $this->{$key}->find_all();
			$ids = array();
			foreach($items as $item){
				$ids[] = $item->id;
			}
			$map[$key] = $ids;
		}
		return $map;
	}
	
	
	/**
	 * Count the results in the current model
	 */
	public function count()
	{
		// create query, only select id
		$query = DB::select(array(DB::expr('count(*)'),'count'));
		$query->from(array($this->_table_name, $this->_object_name));
		
		foreach($this->_db_pending as $pending){
			call_user_func_array(array($query, $pending['name']), $pending['args']);
		}

		// set filters and amount
		$this->apply_filters($query);
		$this->apply_amount($query);
		
		$result = $query->execute($this->_db);
		$count = $result[0]['count'];

		//done
		return $count;
	}

	

	/**
	 * delete related records flagged for automatic removal
	 */ 
	public function handle_delete($data)
	{
		// get model
		$model = $data->model;

		foreach($model->delete_with() as $relation){
			// delete belongs to relations
			$belongs_to = $model->belongs_to();
			if(isset($belongs_to[$relation])){
				$class = $belongs_to[$relation]['model'];
				$key = $belongs_to[$relation]['foreign_key'];
				$id = $model->$key;
				$related = ORM::factory($class,$id);
				if($related->loaded() == TRUE){
					$related->delete();
				}
			}
			// delete has_one relations
			$has_one = $model->has_one();
			if(isset($has_one[$relation])){
				$class = $has_one[$relation]['model'];
				$key = $has_one[$relation]['foreign_key'];
				$relateds = ORM::factory($class,array($key=>$model->id));
				foreach($relateds as $related){
					$related->delete();
				}
			}
			
			// delete has many relations
			$has_many = $model->has_many();
			if(isset($has_many[$relation])){
				$class = $has_many[$relation]['model'];
				$key = $has_many[$relation]['foreign_key'];
				$relateds = ORM::factory($class,array($key=>$model->id));
				foreach($relateds as $related){
					$related->delete();
				}
			}
		}
	}
}