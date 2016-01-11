<?php

class Model_Config extends Model_Default_Config
{
	protected $_table_name = 'config';
	
	protected $_table_columns = array(
		'id'=>NULL,
		'created'=>NULL,
		'timestamp'=>NULL,
		
		'title'=>'varchar(255)',
		'seo_title'=>'varchar(255)',
		'seo_description'=>'text',
		'seo_keywords'=>'text',
		'image_id'=>'int',
		'facebook'=>'varchar(255)',
		'twitter'=>'varchar(255)',
		'vimeo'=>'varchar(255)',
		'youtube'=>'varchar(255)',
		'ga'=>'varchar(255)',
			
		'website_id'=>NULL,
		'owner_id'=>NULL,
		'editor_id'=>NULL
	);
	
	
	
	protected $_belongs_to = array(
		'logo'=>array(
			'model'       => 'Image',
        	'foreign_key' => 'image_id',
		),
	);
		
	protected $_load_with = array('logo');
	
	protected $_serialize_columns = array();
}