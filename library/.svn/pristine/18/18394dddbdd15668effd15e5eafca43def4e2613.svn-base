<?php defined('SYSPATH') or die('No direct script access.');


/**
 * Extension of basic ORM
 * 
 * provides event hooks
 *
 */
class ORM extends Kohana_ORM {
	
	/**
	 * wrapper for factory
	 */
	public static function factory($model, $id = NULL)
	{
		// uppercase name
		$model = ucfirst($model);
		// create model
		$model = parent::factory($model,$id);
		// call hook
		Event::raise($model,Event::BEFORE_INIT,array('model'=>$model));
		// call init in model
		if(method_exists($model,'init')){
			$model->init();
		}
		// call hook
		Event::raise($model,Event::AFTER_INIT,array('model'=>$model));
		//return the model
		return $model;
	}
	
	
	
	/**
	 * wrapper for create
	 * 
	 * @param Validation $validation
	 * @return ORM
	 */
	public function create(Validation $validation = NULL)
	{
		// hook
		Event::raise($this,Event::BEFORE_CREATE,array('model'=>$this));
		// create
		$result = parent::create($validation);
		// hook
		Event::raise($this,Event::AFTER_CREATE,array('model'=>$this));
		//return orm
		return $result;
	}
	
	
	
	
	
	/**
	 * wrapper for update
	 *
	 * @param Validation $validation
	 * @return ORM
	 */
	public function update(Validation $validation = NULL)
	{
		// hook
		Event::raise($this,Event::BEFORE_UPDATE,array('model'=>$this));
		// update
		$result = parent::update($validation);
		// hook
		Event::raise($this,Event::AFTER_UPDATE,array('model'=>$this));
		// return orm
		return $result;
	}
	
	
	

	/**
	 * wrapper for delete
	 *
	 * @return ORM
	 */
	public function delete()
	{
		// hook
		Event::raise($this,Event::BEFORE_DELETE,array('model'=>$this));
		// delete
		$result = parent::delete();
		// hook
		Event::raise($this,Event::AFTER_DELETE,array('model'=>$this));
		// return orm
		return $result;
	}
}