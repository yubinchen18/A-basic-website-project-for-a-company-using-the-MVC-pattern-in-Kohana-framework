<?php

class Model_Default_Link extends Model_Item
{
	// type constants
	const TYPE_URL = 'url';
	const TYPE_ITEM = 'item';
	
	// table name
	protected $_table_name = 'link';
	
	// columns
	protected $_table_columns = array(
		'id'=>'int',
		'created'=>'datetime',
		'timestamp'=>'timestamp',

		'title'=>'text',
		'target'=>'enum _self/_blank',
		'type'=>'enum url/item',
		'url'=>'text',
		'module'=>'varchar',
		'item_id'=>'int',
		'request'=>'varchar',
		'params'=>'text',
	
		'owner_id'=>'int',
		'editor_id'=>'int',
		'website_id'=>'int',
	);
	
	protected $_serialize_columns = array('params');
	

	/**
	 * Default route to create a url
	 * @var string 
	 */
	protected static $_route = FALSE;
	
	
	/**
	 * Website object to pass to URL::to
	 * so URL::to can use domainnames
	 * @var Website 
	 */
	protected static $_website = FALSE;
	
	/**
	 * Alias object to pass to URL::to
	 * so URL::to can use aliases
	 * @var Alias 
	 */
	protected static $_alias = FALSE;

	
	/**
	/* set default route
	*/
	public static function route($route)
	{
		self::$_route = $route;
	}
	
	
	/**
	/* set website object
	*/
	public static function website($website)
	{
		self::$_website = $website;
	}
	
	
	/**
	/* set alias object
	*/
	public static function alias($alias)
	{
		self::$_alias = $alias;
	}
	
	
	/**
	 * Model_Link::url()
	 * Get url for link
	 * 
	 * @param string $route
	 * @return
	 */
	public function url($route=FALSE)
	{
		
		// set route
		if($route===FALSE){
			$route = self::$_route;
		}
		
		// check if loaded
		if($this->loaded() == FALSE){
			return '';
		}

		// declare url
		$url = '';
		
		// get external link, add // if needed
		if($this->type == Model_Link::TYPE_URL){
			$url = $this->url;
			if(substr($url,0,7)!= 'http://' && substr($url,0,8)!= 'https://' && substr($url,0,6)!= 'ftp://'&& substr($url,0,7)!= 'mailto:'){
				$url = '//'.$url;
			}
		}

		// get internal link
		if($this->type == Model_Link::TYPE_ITEM){
			if($this->request != NULL && $this->request != ''){
				$request = $this->request;
			} else {
				$request = $this->module.'@view:'.$this->item_id;
			}
			
			// get params and add website_id from the model data
			$params = is_array($this->params) ? $this->params : array();
			$params['website'] = $this->website_id;
	
			if(isset($params['route'])) {
				$route = $params['route'];
				// making an assumption: if we're using an explicit route and there is an alias
				// use that alias
				if(isset($params['alias']) && $params['alias'] !== '') {
					$params['id'] = $params['alias'];
				}
			};
			// create url
			// 
			// also pass in the website object, so URL can use domains
			// From the backend we dont want to mess up the normal cms links,
			// so dont use URL::website but inject it instead
			// 
			// also pass in the alias object, so URL can use aliasses
			// From the backend we dont want to use aliases
			// so dont use URL::alias but inject it instead
			$url = URL::to($request, $params, $route,self::$_website,self::$_alias);
		}
		return $url;
	}

	
	/**
	 * overwrite default as_array tp set additional parsed url in the data
	 */
	public function as_array()
	{
		// get regular data
		$array = parent::as_array();
		if($this->loaded()===TRUE){
			// set parsed url
			$array['url'] =$this->url();
		}
		return $array;
	}

	
	/**
	 * Model_Link::review()
	 * 
	 * check all links for exitence
	 * create a report of usage
	 * 
	 * @param mixed $modules
	 * @return
	 */
	/*
	public function review($modules)
	{
		// get all links
		$links = $this->find_all();
		// dead links array
		$deadLinks = array();
		// check all links
		foreach($links as $link){
			if($link->type == Model_Link::TYPE_REQUEST){
				// internal link
				$controller = $link->request->param_controller;
				$action = $link->request->param_action;
				$id = $link->request->param_id;
				$dead = TRUE;
				if($controller != NULL  && $controller!=''){
					if($id != NULL && $id != '') {
						// check if item exists
						$model = ORM::factory($controller,$id);
						if($model->loaded() === TRUE){
							$dead = FALSE;
						}
					} else {
						$dead = FALSE;
					}
				} 
				
				if($dead){
					$link->data('usage',array());
					$deadLinks[]=$link;
				}
			} else {
				if(self::url_exists($link->url) === FALSE){
					$link->data('usage',array());
					$deadLinks[]=$link;
				}
			}
		}
		// search modules for dead links
		foreach($modules as $module=>$moduleData){
			// check ik model should be checked
			if(!isset($moduleData['link_columns']) || !is_array($moduleData['link_columns'])) {
				continue;
			}
			// get link columns
			$columns = $moduleData['link_columns'];
			
			// get model
			$model = ORM::factory($module);

			
			if(!empty($columns)){
				// get all items
				$items = $model->find_all();
				foreach($items as $item){
					// go through all link coumns
					foreach($columns as $column){
						$content = $item->{$column};
						// check the use of each dead link
						foreach($deadLinks as $link){
							if(
								(
									strpos($column,'_id') !== FALSE
									&& strpos($column,'link_') !== FALSE
									&& is_numeric($content)
									&& $content == $link->id
								)
								|| strpos($content,'id="link_'.$link->id.'"') !== FALSE
							){
								$item->data('controller',$module);
								// add item to usage data of link
								$usage = $link->data('usage');
								$usage[]=$item;
								$link->data('usage',$usage);
								
							}
						}
					}
				}
			}
		}
		return $deadLinks;
	}
	*/


	/**
	 * Model_Link::recreate()
	 * recreate link for different base url
	 * 
	 * @param mixed $modules
	 * @return void
	 */
	/*
	public function recreate($modules)
	{		
		
		// go through modules
		foreach($modules as $module=>$moduleData){
			// check ik model should be checked
			if(!isset($moduleData['link_columns']) || !is_array($moduleData['link_columns'])) {
				continue;
			}
			
			// get link columns
			$columns = $moduleData['link_columns'];
			
			
			// try to create a model
			$model = ORM::factory($module);

			if(!empty($columns)){
				// get all items
				$items = $model->find_all();
				foreach($items as $item){
					
					// go through columns
					foreach($columns as $column){
						
						// get content
						$content = $item->{$column};
						
						if(strpos($content,'id="link_') !== FALSE || strpos($content,'id="image_') !== FALSE){
							

							// recreate href
							$pattern = '/(<a[^>]+href=["\']{1})([^"^\']+)(["\']{1}[^>]+id=["\']{1}link_)([0-9]+)(["\']{1}[^>]*>)/i';
							$result = preg_replace_callback(
								$pattern,
								array($this,'callback_replace_href'),
								$content
							);
							
							// recreate images
							$pattern = '/(<img[^>]+src=["\']{1})([^"^\']+)(["\']{1}[^>]+id=["\']{1}image_)([0-9]+)(["\']{1}[^>]+data-size=["\']{1})([0-9a-zA-Z]+)(["\']{1}[^>]*>)/i';
							$result = preg_replace_callback(
								$pattern,
								array($this,'callback_replace_image'),
								$result
							);
							$item->{$column} = $result;
							$item->save();
							
						}
					}
				}
			}
		}
	}
	*/
	
	/**
	 * Model_Link::callback_replace_href()
	 * 
	 * @param mixed $matches
	 * @return
	 */
	/*
	protected function callback_replace_href($matches)
	{
		// load link
		$link = ORM::factory('Link',$matches[4]);
		
		// create url
		if($link->loaded()){
			// create url
			$url = $link->url();
		} else {
			$url = '#';
		}
		
		// create replace
		$string = $matches[1].$url.$matches[3].$matches[4].$matches[5]; 
		
		// return
		return $string;	
	}
	*/
	
	
	
	/**
	 * Model_Link::callback_replace_iamge()
	 * 
	 * @param mixed $matches
	 * @return
	 */
	/*
	protected function callback_replace_image($matches)
	{
		// get full image path
		$imageExplode = explode('/',$matches[2]);
		// extract image
		$image = $imageExplode[count($imageExplode)-1];
		//get size
		$size = $matches[6];
		// create new src
		$src = Kohana::$base_url.'files/images/'.$size.'/'.$image;
		
		// create replacement
		$string = $matches[1].$src.$matches[3].$matches[4].$matches[5].$matches[6].$matches[7]; 
	
		// return
		return $string;	
	}
	*/

	




	/**
	 * Helper: Check if url exists
	 */
	/*
	static function url_exists($url)
	{
		$parts=parse_url($url);
		if(!$parts){
			// the URL was seriously wrong 
			return FALSE; 
		}
		
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		
		// set the user agent - might help, doesn't hurt 
		curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
		
		// try to follow redirects
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		
		// timeout after the specified number of seconds. assuming that this script runs
		// on a server, 20 seconds should be plenty of time to verify a valid URL
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 15);
		curl_setopt($curl, CURLOPT_TIMEOUT, 20);
		
		// don't download the page, just the header (much faster in this case)
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_HEADER, true);
		
		// handle HTTPS links
		if(isset($parts['scheme']) && $parts['scheme']=='https'){
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,  1);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		}
		
		$response = curl_exec($curl);
		curl_close($curl);
		
		// get the status code from HTTP headers
		if(preg_match('/HTTP\/1\.\d+\s+(\d+)/', $response, $matches)){
			$code=intval($matches[1]);
		} else {
			return false;
		};
		
		// see if code indicates success
		return (($code>=200) && ($code<400));
	}
	*/
}