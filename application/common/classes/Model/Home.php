<?php
class Model_Home extends Model_Item
{
	protected $_table_name = 'home';
	
	protected $_table_columns = array(
		"id"=>NULL,
		"created"=>NULL,
		"status"=>NULL,
		"title"=>NULL,
		"alias"=>NULL,
		"slide_collection_id"=>NULL,
		"content_collection_1_id"=>NULL,
		"content_collection_2_id"=>NULL,
		"website_id"=>NULL,
		"owner_id"=>NULL,
		"editor_id"=>NULL
	);
	

	// collections
	protected $_belongs_to = array(
		'slide_collection'=>array(
			'model'       => 'Collection_Slide',
        	'foreign_key' => 'slide_collection_id',
		),
		'content_collection_1'=>array(
			'model'       => 'Collection_Content',
        	'foreign_key' => 'content_collection_1_id',
		),	
		'content_collection_2'=>array(
			'model'       => 'Collection_Content',
        	'foreign_key' => 'content_collection_2_id',
		),
	);
	
	protected $_load_with = array('slide_collection','content_collection_1','content_collection_2');

}