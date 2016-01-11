<?php

class Model_Default_Menu extends Model_Tree
{
	const TYPE_NONE = 'none';
	const TYPE_LINK = 'link';
	const TYPE_CONTROLLER = 'controller';
	const TYPE_ITEM = 'item';
	
	// table name
	protected $_table_name = 'menu';
	
	// columns
	protected $_table_columns = array(
		'id'=>'int',
		'parent_id'=>'int',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		'rank'=>'int',
		'status'=>'tinyint',
		'deletable'=>'tinyint',
		'movable'=>'tinyint',
		'updatable'=>'tinyint',
		'title'=>'varchar(255)',
		
		'type'=>'enum',
		'link_id'=>'int',
		'controller'=>'varchar(255)',
		'module'=>'varchar(255)',
		'item_id'=>'int',
		'request'=>'int',
		
		'owner_id'=>'int',
		'editor_id'=>'int',
		'website_id'=>'int',
	);
	// items sortable
	protected $_sortable = TRUE;
	
	// relationships
	protected $_belongs_to = array(
		'link'=>array(
			'model'       => 'Link',
        	'foreign_key' => 'link_id',
		),
	);
	
	// autoload
	protected $_load_with = array('link');
    
    // autodelete
    protected $_delete_with = array('link');

}