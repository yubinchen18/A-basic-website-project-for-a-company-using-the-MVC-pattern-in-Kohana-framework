<?php

class Model_Default_Image extends Model_File
{
	protected $_table_name = 'image';

	// column names
	protected $_table_columns = array(
		'id'=>'int',
		'alias'=>'varchar',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		'rank'=>'int',
		'status'=>'enum',
		
		'file'=>'varchar',
		'sizes'=>'text',
		'title'=>'varchar',
		'group_id'=>'int',
		'website_id'=>'varchar',
		'owner_id'=>'int',
		'editor_id'=>'int',
	);
	
	protected $_serialize_columns = array('sizes');
	
	// base url default
	protected static $_url_default = '';
	
	
	// base url
	protected $_url = FALSE;
	
	/**
	 * set default url
	 */
	public static function url_default($url)
	{
		static::$_url_default = $url;
	}
	
	/**
	 * set default url
	 */
	public function url($url)
	{
		$this->_url = $url;
	}
	

	/**
	 * get a specific size
	 *
	 * @param mixed $size 
	 */
	public function size()
	{
		$args = func_get_args();

		// check if model is loaded
		if( !isset($this->file) || !isset($this->sizes) ){
			return false;
		}
		
		// go through the requested size + alternatives
		for($i=0;$i<count($args);$i++){
			$size = $args[$i];
			if(is_array($this->sizes) && isset($this->sizes[$size]) && $this->sizes[$size]!=false){
				// return sizedata if size exists
				return (object) array(
					'size'=>$size,
					'file'=>$this->file,
					'width'=>$this->sizes[$size]['width'],
					'height'=>$this->sizes[$size]['height']
				);
			}
		}
		// nothing there: return false
		return false;
	}
	
	
	
	/**
	 * get absolute path to the requested size
	 *
	 */
	public function src($size,$url = FALSE)
	{
		// make size an array
		if(!is_array($size)){
			$size = array($size);
		}
	
		// $_url_imagesget size
		$size = call_user_func_array(array($this,'size'),$size);
		
		if($size!==FALSE){
			if($url){
				$src = $url.$size->size.'/'.$size->file;
			} elseif($this->_url){
				$src = $this->_url.$size->size.'/'.$size->file;
			} else {
				$src = static::$_url_default.$size->size.'/'.$size->file;
			}
		} else {
			$src = '';
		}
		return $src;
	}
	
	
	/**
	 * Create an alternative as_array method
	 * create a sizes array with src key
	 * @return type
	 */
	public function as_array()
	{
		$array = parent::as_array();
		
		if(isset($this->file) && isset($this->sizes)){
			$sizes =array();
			foreach($this->sizes as $size => $data){
				$data['src'] = $this->src($size);
				$sizes[$size]=$data;
			}
			$array['sizes'] = $sizes;
		}
		return $array;
	}
	

	
	/**
	 * Create sizes
	 *
	 * @param string $file sourcefile
	 * @param array $sizes the size s to create
	 * @param string $destination target location
	 */
	public function create_sizes($file,$sizes,$path)
	{
		// set original in available sizes
		$originalSize = getimagesize($file);
		
		$sizesData = array(
			'original'=>array(
				'width'=>$originalSize[0],
				'height'=>$originalSize[1]
			)
		);
		
		foreach($sizes as $name => $size){
			
			// get size directory
			$sizePath = $path.$name.DIRECTORY_SEPARATOR;
			$destination = $sizePath.pathinfo($file,PATHINFO_BASENAME);
		
			// create directory if it doenst exist
			if(!is_dir($sizePath)){
				mkdir($sizePath);
			}
			
			// create image processor
			$image = Image::factory($file,'GD');
			
			// process image and get size data
			$sizeData = $image->create_size($size, $destination);
			
			
			// store size data
			if($sizeData){
				$sizesData[$name]=$sizeData;
			}
			unset($image);
		}
		// store sizes in model
		$this->sizes = $sizesData;
	}
	
	
	
	
	/**
	 * remove size-files
	 *
	 * @param files path $path
	 */
	public function delete_sizes($path)
	{
		// check if model is loaded
		if(!$this->_loaded){
			throw HTTP_Exception::factory(500,'Trying to delete sizes unloaded image');
		}
		if(is_array($this->sizes)){
			// delete all sizes from disk
			foreach($this->sizes as $name=>$size){
				$file = $path.$name.DIRECTORY_SEPARATOR.$this->file;
				if(file_exists($file)){
					unlink($file);
				}
			}
		}
	}
	
	
	/**
	 * Override loaded
	 * @param Bool $loaded
	 */
	public function set_loaded($loaded = TRUE)
	{
		$this->_loaded = $loaded;
	}
}