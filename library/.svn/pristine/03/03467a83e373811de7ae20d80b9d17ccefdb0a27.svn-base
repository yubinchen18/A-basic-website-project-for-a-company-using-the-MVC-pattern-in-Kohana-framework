<?php
/**
 * Alias class
 * Frontend usage: use with Router to filter for global alias
 * set Router::cache($cache) to use cached aliases
 * To select by alias in a model, also filter by website_id, because they can be non-unique
 * 
 * Backend: 
 * $alias = Alias::factory(website_id), $alias->create('uri',[params]) for global alias creation
 * $alias = Alias::factory(website_id, $model) for alias creation in a model under the 'alias' key
 */
class Alias
{
	
	/**
	 * Cache instance
	 */
	protected static $_cache = FALSE;
	
	/**
	 * cache key
	 * @var string 
	 */
	protected static $_cache_key = '__alias_data_';
		
	/**
	 * alias lookuptables for this request
	 * @var array 
	 */
	protected static  $_aliases = array();
	
	/**
	 * Table name
	 * @var string 
	 */
	protected static $_table = 'alias';
	
	
	/**
	 * Table of not allowed urls
	 * @var array 
	 */
	protected static $_blacklist = array();
	
	
	/**
	 * Set a cache instance
	 * @param Cache $cache
	 */
	public static function cache($cache)
	{
		self::$_cache = $cache;
	}
	
	/**
	 * Set a table
	 * @param Cache $cache
	 */
	public static function table($table)
	{
		self::$_table = $table;
	}
	
	
	/**
	 * Set a blacklist
	 * @param array $blacklist
	 */
	public static function blacklist($blacklist)
	{
		self::$_blacklist = array_merge(self::$_blacklist, $blacklist);
	}
	
	
	/**
	 * return an instance of Alias
	 *
	 * @return Alias
	 */
	public static function factory($website=FALSE,$model=FALSE)
	{
		return new Alias($website,$model);
	}
	

	/**
	 * website
	 */
	protected $_website = FALSE;
	
	
	/**
	 * model
	 */
	protected $_model = FALSE;
	
	
	/**
	 * constructor 
	 * @param String $website
	 * @param ORM $model
	 */
	protected function __construct($website=FALSE,$model=FALSE)
	{
		$this->_website = $website;
		$this->_model = $model;
	}
	
	
	/**
	 * Set website id
	 * @param Website $website
	 */
	public function website($website)
	{
		$this->_website = $website;
	}
	
	
	/**
	 * Set model
	 * @param ORM $model
	 */
	public function model($model)
	{
		$this->_model = $model;
	}
	
	

	/**
	 * get params by uri
	 * 
	 * @param String $uri
	 * @param String $website
	 * @param boolean $cached
	 * @return array
	 */
	public function params($uri,$website=FALSE,$cached=TRUE)
	{
		if($website === FALSE){
			$website = $this->_website;
		}
		if($website == FALSE){
			throw HTTP_Exception::factory(500,'Trying to get alias params without a website id');
		}
		
		// trim uri	strtolower uri
		$uri = strtolower(trim($uri, '/'));

		if($cached){
			// get aliases
			$aliases = $this->aliases($website);

			if(isset($aliases[$uri])){
				return $this->request_to_params($aliases[$uri]);
			} else {
				return FALSE;
			}
		} else {
			$result = DB::select('request')
			->from(self::$_table)
			->where('website_id','=',$website)
			->where('uri','=',$uri)
			->execute()
			->as_array(NULL,'request');

			if(isset($result[0])){
				return $this->request_to_params($result[0]);
			} else {
				return FALSE;
			}
		}
	}
	
	
	/**
	 * get uris by params
	 * 
	 * @param array $params
	 * @param boolean $cached
	 * @return array
	 */
	public function uris($params,$cached = TRUE)
	{
		// get website
		$website = isset($params['website']) && $params['website'] ? $params['website'] : $this->_website;
		if($website == FALSE){
			throw HTTP_Exception::factory(500,'Trying to get alias uri without a website id');
		}
		// get requeststring
		$request = $this->params_to_request($params);
		// get uri from preloaded set
		if($cached === TRUE){
			// find uris
			if($uris = array_keys($this->aliases($website),$request) ) {
				return $uris;
			} else {
				return FALSE;
			}
		// get uri directly from db
		} else {
			//create select query
			return DB::select('uri')
			->from(self::$_table)
			->where('website_id','=',$website)
			->where('request','=',$request)
			->execute()
			->as_array(NULL,'uri');
		}
	}
	
	
	/**
	 * get uri by params
	 * 
	 * @param array $params
	 * @param boolean $cached
	 * @return string
	 */
	public function uri($params,$cached = TRUE)
	{
		// get all uris
		$uris = $this->uris($params,$cached);
		// return first result
		if(is_array($uris) && isset($uris[0])){
			return $uris[0];
		} else {
			return FALSE;
		}
	}

	
	/**
	 * take a string of the form Controller@action:id
	 * and create an array with the form ['controller'=>'c','action'=>'a','id'=>'id']
	 * @param string $request
	 * @return array
	 */
	protected function request_to_params($request)
	{
		$parts = explode('@',$request,2);
		$controller = ucfirst($parts[0]);
		if(count($parts)==2){
			$pieces = explode(':',$parts[1],2);
			$action = strtolower($pieces[0]);
			if(count($pieces)==2){
				$id = strtolower($pieces[1]);
			} else {
				$id = NULL;
			}
		} else {
			$action = 'view';
			$id = NULL;
		}
		return array(
			'controller'=>$controller,
			'action'=>$action,
			'id'=>$id,
		);
	}
	
	
	/**
	 * take an array with the form ['controller'=>'c','action'=>'a','id'=>'id'] 
	 * and create a string of the form Controller@action:id
	 * @param string $request
	 * @return array
	 */
	protected function params_to_request($params)
	{
		$request = '';
		if(isset($params['controller']) && $params['controller']){
			$request = ucfirst($params['controller']);
		} else {
			return $request;
		}
		if(isset($params['action']) && $params['action']){
			$request .= '@'.strtolower($params['action']);
		} else {
			$request .= '@view';
		}
		if(isset($params['id']) && $params['id']){
			$request .= ':'.strtolower($params['id']);
		}
		return $request;
	}

	
	/**
	 * load all the aliases from database
	 * 
	 * @return void
	 */
	protected function aliases($website)
	{


		// get hotcached
		if(isset(self::$_aliases[$website])){
			return self::$_aliases[$website];
		}
		
		// get cached
		if(self::$_cache != FALSE){
			// get aliases
			try {
				$cached = self::$_cache->get(self::$_cache_key.$website,FALSE);
			} catch (Exception $e){
				$cached = FALSE;
			}

			// return if ok
			if($cached !== FALSE){
				// hotcache
				self::$_aliases[$website] = $cached;
				// done
				return $cached;
			}
		}

		// still here, load aliases from database
		$result = DB::select()
		->from(self::$_table)
		->where('website_id','=',$website)
		->execute()
		->as_array('uri','request');

		// cache results
		if(self::$_cache != FALSE){
			self::$_cache->set(self::$_cache_key.$website,$result);
		}
		// hotcache result
		self::$_aliases[$website] = $result;
		// done
		return $result;
	}
	
	
	/**
	 * Alias::create()
	 * 
	 * @param string $uri
	 * @param array $params
	 * @return String uri
	 */
	public function create($uri,$params=array())
	{
		// get website
		$website = isset($params['website'])?$params['website']:$this->_website;
		if($website == FALSE){
			throw HTTP_Exception::factory(500,'Trying to create alias uri without a website id');
		}
		// clean uri
		$uri = $this->clean($uri);
		// unique uri
		$uri = $this->unique($uri);
		// get request
		$request = $this->params_to_request($params);
		// if a model was set
		if($this->_model){
			//store in model
			$this->_model->alias = $uri;
		} else {
			// get unique
			$uri = $this->unique($uri);
			// get request
			$request = $this->params_to_request($params);
			// insert
			DB::insert(self::$_table,array('uri','request','website_id'))
			->values(array($uri,$request,$website))
			->execute();
		}
	}
	
	
	/**
	 * Alias::update()
	 * Delete & reset aliases, then create a new one
	 * 
	 * @param string $uri
	 * @param array $params
	 * @return String uri
	 */
	public function update($uri,$params=array())
	{
		// delete alias
		$this->delete($params);
		// create a new alias
		$uri = $this->create($uri,$params);
	}
	
	
	/**
	 * Alias::delete()
	 * delete alias 
	 * 
	 * @param mixed $mixed String: uri, Array: params
	 * @return void
	 */
	public function delete($mixed,$website=FALSE)
	{
		if($this->_model){
			// model is set, so we're not talking about a global alias
			// there is nothing to delete
		} else {
			if(is_array($mixed)){
				$website = isset($params['website'])?$params['website']:$this->_website;
			} else {
				if($website===FALSE){
					$website = $this->_website;
				}
			}
			if($website == FALSE){
				throw HTTP_Exception::factory(500,'Trying to delete alias uri without a website id');
			}
		
			// create delete query
			$query =  DB::delete(self::$_table);
			// add website
			$query->where('website_id','=',$website);
			// delete by params
			if(is_array($mixed)){
				// add request as where
				$query->where('request','=',$this->params_to_request($mixed))->execute();
			} elseif(is_string($mixed)) {
				// delete by cleaned uri
				$query->where('uri','=',$this->clean($mixed))->execute();
			} 
		}
	}
	
	
	/**
	 * create a clean uri
	 * @param string $uri 
	 * @return string 
	 */
	public function clean($uri)
	{
		// no emprty uri's
		if($uri == ''){
			$uri = '-';
		}
		// replace spaces with dash
		$uri = str_replace(' ','-',$uri);
		// replace all funny chars
		try{
			$uri = iconv('UTF-8', 'ASCII//TRANSLIT', $uri);
		} catch(Exception $e){
			$uri = str_replace(
				array('À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','ß','à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ'),
				array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','ss','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y'),
				$uri
			);
		}
		// remove all other chars
		$uri = preg_replace('/[^A-Za-z0-9-]/', '', $uri);
		// remove mulptiple dashes
		$uri = preg_replace('/-+/', '-', $uri);
		// trim dashes
		$uri = trim($uri,'-');
		// to lower
		$uri = strtolower($uri);
		// done
		return $uri;
	}
	
	
	/**
	 * create a unique uri
	 * @param string $uri
	 * @param string $column
	 * @param string $separator for adding number
	 * @return string 
	 */
	public function unique($uri, $_column= FALSE, $separator = '-')
	{
		if($this->_model){
			$table = $this->_model->table_name();
			$column = 'alias';
		} else {
			$table = self::$_table;
			$column = 'uri';
		}
		if($_column){
			$column = $_column;
		}
		
		$query = DB::select($column)
		->from($table)
		->where($column,'LIKE',$uri.'%')
		->where('website_id','=',$this->_website);
				
		if($this->_model && $this->_model->loaded()){
			$query->where('id','<>',$this->_model->id);
		}
		
		$result = $query->execute()->as_array($column,$column);

		// create lowercase lookup
		$lookup = array();
		foreach($result as $key => $val){
			$lookup[strtolower($key)] = $val;
		}
		
		if(!isset($lookup[strtolower($uri)]) && !in_array($uri, self::$_blacklist)){
			// no exact matches: uri is ok
			return $uri;
		} else {
			// try to add a number to it and see if it exists	
			$number = 2;
			while(isset($lookup[strtolower($uri).$separator.$number]) || in_array(strtolower($uri).$separator.$number, self::$_blacklist)){
				$number++;
			}
			return $uri.$separator.$number;
		}
	}
}