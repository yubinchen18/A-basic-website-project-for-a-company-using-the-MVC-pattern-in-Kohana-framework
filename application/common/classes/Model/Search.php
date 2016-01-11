<?php
class Model_Search extends Model_Base
{
	protected $_table_name = 'search';
	
	protected $_table_columns = array(
		'id'=>NULL,
		'created'=>NULL,
		'query'=>NULL,
		'website_id'=>NULL,
	);
}
	