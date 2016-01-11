<?php
class Model_Page extends Model_Item
{
	protected $_table_name = 'page';
	
	protected $_table_columns = array(
		'id'=>NULL,
		'created'=>NULL,
		'timestamp'=>NULL,
		'status'=>NULL,
		'rank'=>NULL,
		'template'=>NULL,
		'alias'=>NULL,
		'master_id'=>NULL,
		'title'=>NULL,
		'subtitle'=>NULL,
		'summary'=>NULL,
		'body'=>NULL,
		'breadcrumbs'=>NULL,
		'menu'=>NULL,
		'meta_title'=>NULL,
		'meta_keywords'=>NULL,
		'meta_description'=>NULL,
		'form_id'=>NULL,
		'image_collection_id'=>NULL,
		'file_collection_id'=>NULL,
		'slide_collection_id'=>NULL,
		'content_collection_1_id'=>NULL,
		'content_collection_2_id'=>NULL,
		'content_collection_3_id'=>NULL,
		'website_id'=>NULL,
		'owner_id'=>NULL,
		'editor_id'=>NULL
	);
	
	
	// collections
	protected $_belongs_to = array(
		'master'=>array(
			'model'       => 'Page',
        	'foreign_key' => 'master_id',
		),
		'image_collection'=>array(
			'model'       => 'Collection_Image',
        	'foreign_key' => 'image_collection_id',
		),
		'file_collection'=>array(
			'model'       => 'Collection_File',
        	'foreign_key' => 'file_collection_id',
		),
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
		'content_collection_3'=>array(
			'model'       => 'Collection_Content',
        	'foreign_key' => 'content_collection_3_id',
		),
		'form'=>array(
			'model'       => 'Form',
        	'foreign_key' => 'form_id',
		)
	);
	
	protected $_load_with = array('master','image_collection','file_collection','slide_collection','content_collection_1','content_collection_2','content_collection_3','form');

}