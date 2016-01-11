<?php
class Model_Info extends Model_Item
{
	protected $_table_name = 'info';
	
	protected $_table_columns = array(
		'id'=>NULL,
		'alias'=>NULL,
		'created'=>NULL,
		'timestamp'=>NULL,
		'title'=>NULL,
		'body'=>NULL,
	);
	
}