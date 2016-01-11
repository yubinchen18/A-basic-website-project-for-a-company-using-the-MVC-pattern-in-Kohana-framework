class Model_Collection_<?php echo $name; ?> extends Model_Collection
{
	// table name
	protected $_table_name = '<?php echo $table; ?>_collection';
	// model name
	protected $_item_model = '<?php echo $name; ?>';
}