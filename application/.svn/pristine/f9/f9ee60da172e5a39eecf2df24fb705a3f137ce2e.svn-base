<?php
class Model_News extends Model_Item
{
	protected $_table_name = 'news';
	
	protected $_table_columns = array(
		'id'=>NULL,
		'alias'=>NULL,
		'created'=>NULL,
		'timestamp'=>NULL,
		'status'=>NULL,
		
		'use_time_show_start'=>NULL,
		'time_show_start'=>NULL,
		'use_time_show_end'=>NULL,
		'time_show_end'=>NULL,
		'time_publication'=>NULL,
		
		'title'=>NULL,
		'body'=>NULL,
		'href'=>NULL,
		'image_collection_id'=>NULL,
		'website_id'=>NULL,
		'owner_id'=>NULL,
		'editor_id'=>NULL
	);
	

	// collections
	protected $_belongs_to = array(
		'image_collection'=>array(
			'model'       => 'Collection_Image',
        	'foreign_key' => 'image_collection_id',
		)
	);
	
	protected $_load_with = array('image_collection:first');
	
	
	
	public function current()
	{
		$this->filter(array(
			'where_open',
			array('where','use_time_show_start','=','0'),
			array('or_where','time_show_start','<',date('Y-m-d H:i:s',time())),
			'where_close',
			'where_open',
			array('where','use_time_show_end','=','0'),
			array('or_where','time_show_end','>',date('Y-m-d H:i:s',time())),
			'where_close',
		));
		
		return $this;
	}
}
	