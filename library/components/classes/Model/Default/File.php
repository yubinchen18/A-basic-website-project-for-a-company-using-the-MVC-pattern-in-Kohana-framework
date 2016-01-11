<?php

class Model_Default_File extends Model_Item
{
	protected $_table_name = 'file';

	// column names
	protected $_table_columns = array(
		'id'=>'int',
		'alias'=>'varchar',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		'hidden'=>'tinyint',
		'rank'=>'int',
		'status'=>'enum',
		'file'=>'varchar',
		'title'=>'varchar',
		'group_id'=>'int',
		'website_id'=>'varchar',
		'owner_id'=>'int',
		'editor_id'=>'int',
	);
	
	protected $_sortable = FALSE;
	
	// base url default
	protected static $_url_files_default = '';
	
	// base url
	protected $_url = FALSE;
	
	/**
	 * set default url
	 */
	public static function url_default($url)
	{
		self::$_url_files_default = $url;
	}
	
	/**
	 * set default url
	 */
	public function url($url)
	{
		$this->_url = $url;
	}
	
	
	/**
	 * get absolute path to the file
	 */
	public function href($url = FALSE)
	{
		if($url){
			$url = $url.$this->file;
		} elseif($this->_url) {	
			$url = $this->_url.$this->file;
		} else {
			$url = self::$_url_files_default.$this->file;
		}
		return $url;
	}
}