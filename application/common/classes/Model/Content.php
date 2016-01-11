<?php
class Model_Content extends Model_Item
{
	protected $_table_name = 'content';
	
	protected $_table_columns = array(
		'id'=>NULL,
		'created'=>NULL,
		'timestamp'=>NULL,
		'status'=>NULL,
		'rank'=>NULL,
		'alias'=>NULL,
		'type'=>NULL,
		'title'=>NULL,
		'caption'=>NULL,
		'body'=>NULL,
		'text'=>NULL,
		'cta'=>NULL,
		'importance'=>NULL,
		'amount'=>NULL,
		'more'=>NULL,
		'more_label'=>NULL,
		'image_collection_id'=>NULL,
		'image_id'=>NULL,
		'link_id'=>NULL,
		'website_id'=>NULL,
		'owner_id'=>NULL,
		'editor_id'=>NULL
	);
	
	// collections
	protected $_belongs_to = array(
		'image_collection'=>array(
			'model'       => 'Collection_Image',
        	'foreign_key' => 'image_collection_id',
		),
		'image'=>array(
			'model'       => 'Image',
        	'foreign_key' => 'image_id',
		),
		'link'=>array(
			'model'       => 'Link',
        	'foreign_key' => 'link_id',
		),
	);
	
	protected $_load_with = array('image_collection','image','link');

}