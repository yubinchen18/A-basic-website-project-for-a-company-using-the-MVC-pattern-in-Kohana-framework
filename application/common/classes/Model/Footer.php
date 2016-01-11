<?php
class Model_Footer extends Model_Item
{
	protected $_table_name = 'footer';
	
	protected $_table_columns = array(
		"id"=>NULL,
		"created"=>NULL,
		"status"=>NULL,
		"alias"=>NULL,
		"content_collection_id"=>NULL,
		"website_id"=>NULL,
		"owner_id"=>NULL,
		"editor_id"=>NULL
	);
	

	// collections
	protected $_belongs_to = array(
		'content_collection'=>array(
			'model'       => 'Collection_Content',
        	'foreign_key' => 'content_collection_id',
		),	
	);
	
	protected $_load_with = array('content_collection');

}