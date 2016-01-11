<?php

class Model_Menu extends Model_Default_Menu
{
	// relationships
	protected $_belongs_to = array(
		'link'=>array(
			'model'       => 'Link',
        	'foreign_key' => 'link_id',
		),
		'page'=>array(
			'model'       => 'Page',
        	'foreign_key' => 'item_id',
		),
	);
	
	// autoload
	protected $_load_with = array('link','page');
    
    // autodelete
    protected $_delete_with = array('link');
}