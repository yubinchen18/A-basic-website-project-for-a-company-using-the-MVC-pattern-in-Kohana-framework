<?php
class Version
{
	
	
	/**
	 * default config
	 * can be overridden by ::config()
	 *
	 * @var object
	 */
	protected static $_config =  array(
		'table' => 'version',
		'columns' => array(
			'model'  => 'model',
			'item_id'  => 'item_id',
			'revision'  => 'revision',
			'data'  => 'data',
		)
	);
	
	
	/**
	 * return an instance of Version
	 *
	 * @return Version
	 */
	public static function factory($model)
	{
		if($model->loaded() === FALSE && !isset($model->id) && !is_int($model->id)){
			throw HTTP_Exception::factory(500,'Trying to version-manage an unloaded or unsaved model');
		}
		return new Version($model);
	}
	
	
	
	/**
	 * Alias::config()
	 * set or get config
	 * setting config will reset instance to FALSE
	 * 
	 * @param bool $config
	 * @return array / void
	 */
	public static function config($config = FALSE)
	{
		if($config === FALSE){
			return self::$_config;
		} else {
			self::$_config = $config;
			self::$_instance = FALSE;
		}
	}
	
	
	
	/**
	 * the model that is versioned
	 */ 
	protected $_model = FALSE;
	
	

	
	/**
	 * Version::__construct()
	 * 
	 * @param ORM $model
	 * @return void
	 */
	protected function __construct($model)
	{
		$this->_model = $model;
	}
	
	
	
	/**
	 * Version::history()
	 * get an array of models with revision numbers as keys
	 * 
	 * @return array
	 */
	public function history()
	{
		$id = $this->_model->id;
		$class = get_class($this->_model);
		
		$versionsData = DB::select(array(self::$_config['columns']['data'],'data'),array(self::$_config['columns']['revision'],'revision'))
			->from(self::$_config['table'])
			->where(self::$_config['columns']['model'],'=',$class)
			->where(self::$_config['columns']['item_id'],'=',$id)
			->order_by('revision','ASC')
			->execute();
			
		$versions = array();
		foreach($versionsData as $versionData){
			$version = clone($this->_model);
			$data = json_decode($versionData['data'],TRUE);
			$version->values($data);
			$version->data('revision',$versionData['revision']);
			$versions[]=$version;
		}
		return $versions;
	}
	
	
	/**
	 * 
	 * Version::revision()
	 * 
	 * get a certain revision of a model
	 * returns false if revision doenst exist
	 * 
	 * @param ORM $revision
	 * @return
	 */
	public function revision($revision)
	{
		$id = $this->_model->id;
		$class = get_class($this->_model);
		
		$versionData = DB::select(array(self::$_config['columns']['data'],'data'))
			->from(self::$_config['table'])
			->where(self::$_config['columns']['model'],'=',$class)
			->where(self::$_config['columns']['item_id'],'=',$id)
			->where(self::$_config['columns']['revision'],'=',$revision)
			->execute();
		
		if(count($versionData)> 0)	{
			$version = clone($this->_model);
			$data = json_decode($versionData[0]['data'],TRUE);
			$version->values($data);
			return $version;
		} else {
			return FALSE;
		}
	}
	
	
	/**
	 * Version::revert()
	 * reverts the model to an earlier revision
	 * then commits that version as a new revision
	 * 
	 * @param mixed $revision
	 * @return void
	 */
	public function revert($revision)
	{
		// get version
		$version = $this->revision($revision);
		if($version=== FALSE){
			throw HTTP_Exception::factory(500,'Trying to revert to non existent revision');
		}
		// set values of old version
		$this->_model->values($version->as_array());
		
		// save the model
		$this->_model->save();
		
		// commit as new version
		$this->commit();
	}
	
	
	
	/**
	 * Version::commit()
	 * Save the model and create a new revision
	 * 
	 * @return void
	 */
	public function commit()
	{
		// get the data
		$data = json_encode($this->_model->as_array());
		
		// get next revision
		$id = $this->_model->id;
		$class = get_class($this->_model);
		$versionData = DB::select(array(self::$_config['columns']['revision'],'revision'))
			->from(self::$_config['table'])
			->where(self::$_config['columns']['model'],'=',$class)
			->where(self::$_config['columns']['item_id'],'=',$id)
			->order_by('revision','DESC')
			->limit(1)
			->execute();
		
		if(count($versionData) > 0){
			$revision = $versionData[0]['revision'] + 1 ;
		} else {
			$revision = 1;
		}
		
		// creata a new revision	
		DB::insert(self::$_config['table'],self::$_config['columns'])
			->values(array(
				$class,
				$id,
				$revision,
				$data
			))
			->execute();
	}
	
	
	
	/**
	 * Version::delete()
	 * Delete all versions of a document
	 * 
	 * @return void
	 */
	public function delete()
	{
		$id = $this->_model->id;
		$class = get_class($this->_model);
		DB::delete(self::$_config['table'])
			->where(self::$_config['columns']['model'],'=',$class)
			->where(self::$_config['columns']['item_id'],'=',$id)
			->execute();
	}
}



