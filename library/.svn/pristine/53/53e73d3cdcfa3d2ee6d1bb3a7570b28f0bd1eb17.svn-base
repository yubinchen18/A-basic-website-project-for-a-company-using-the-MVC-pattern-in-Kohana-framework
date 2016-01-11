class Model_<?php echo $name; ?> extends <?php echo $extends; ?> 
{
	// table
	protected $_table_name = '<?php echo $table; ?>';

	// columns
	protected $_table_columns = array(
		'id'=>'int',<?php if($parent): ?> 
		'parent_id'=>'int',<?php endif;?><?php if($item_fields): ?> 
		'alias'=>'varchar',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		'rank'=>'int',
		'deletable'=>'int',
		'updatable'=>'int',
		'movable'=>'int',
		'status'=>'varchar',
		'title'=>'varchar',<?php endif; ?><?php foreach ($fields as $field): ?><?php if($field['name']!=''): ?> 
		'<?php echo $field['name'] ?>'=>'<?php echo $field['type'] ?>',<?php endif; ?><?php endforeach; ?><?php if($meta): ?> 
		'meta_title'=>'varchar(255)',
		'meta_keywords'=>'varchar(255)',
		'meta_description'=>'text',<?php endif; ?><?php foreach ($collections as $collection): ?><?php if($collection['name']!=''): ?> 
		'<?php echo $collection['key'] ?>'=>'int',<?php endif; ?><?php endforeach; ?><?php foreach ($belongs as $belong): ?><?php if($belong['name']!=''): ?> 
		'<?php echo $belong['key'] ?>'=>'int',<?php endif; ?><?php endforeach; ?><?php if($item_fields): ?>		
		'website_id'=>'varchar',
		'owner_id'=>'int',
		'editor_id'=>'int',<?php endif; ?> 
	);<?php if ($sortable): ?>


	// sortable
	protected $_sortable = TRUE;
<?php endif; ?>

	// belongs to
	protected $_belongs_to = array(<?php foreach ($collections as $collection): ?><?php if($collection['name']!=''): ?> 
		'<?php echo $collection['name']; ?>'=>array(
			'model'       => 'Collection_<?php echo $collection['model']; ?>',
        	'foreign_key' => '<?php echo $collection['key']; ?>',
		),<?php endif; ?><?php endforeach; ?><?php foreach ($belongs as $belong): ?><?php if($belong['name']!=''): ?> 
		'<?php echo $belong['name']; ?>'=>array(
			'model'       => '<?php echo $belong['model']; ?>',
        	'foreign_key' => '<?php echo $belong['key']; ?>',
		),<?php endif; ?><?php endforeach; ?> 
	);

	// load with
<?php $spacer = ''; ?>
	protected $_load_with = array(<?php foreach ($collections as $collection){
		if($collection['name']!='' && isset($collection['load']) && $collection['load'] == '1'){
			if(isset($collection['first']) && $collection['first'] == '1'){
				$first = ':first';
			} else {
				$first = '';
			}		
			echo $spacer."'".$collection['name'].$first."'";
			$spacer = ',';
		}
	} ?><?php foreach ($belongs as $belong){
		if($belong['name']!='' && isset($belong['load']) && $belong['load'] == '1'){	
			echo $spacer."'".$belong['name']."'";
			$spacer = ',';
		}
	} ?>);
}