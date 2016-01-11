<?php
class Model_Slide extends Model_Item
{
	protected $_table_name = 'slide';
	
	protected $_table_columns = array(
		"id"=>NULL,
		"created"=>NULL,
		"timestamp"=>NULL,
		"status"=>NULL,
		"alias"=>NULL,
		"title"=>NULL,
		"cta"=>NULL,
		"image_id"=>NULL,
		"link_id"=>NULL,
		"website_id"=>NULL,
		"owner_id"=>NULL,
		"editor_id"=>NULL
	);
	
	// collections
	protected $_belongs_to = array(
		'image'=>array(
			'model'       => 'Image',
        	'foreign_key' => 'image_id',
		),
		'link'=>array(
			'model'       => 'Link',
        	'foreign_key' => 'link_id',
		),
	);
		
	protected $_load_with = array('image','link');
	
	protected $_delete_with = array('link');
	
}