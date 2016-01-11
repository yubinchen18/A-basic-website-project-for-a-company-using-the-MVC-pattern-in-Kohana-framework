<?php if ($extends): ?>
return Text::extend('<?php echo $extends; ?>',array(
<?php else: ?>
return array(
<?php endif; ?>
	'module'=>array(
		'name'=>'<?php echo $text['name']; ?>',
		'article'=>'<?php echo $text['article']; ?>',
		'single'=>'<?php echo $text['single']; ?>',
		'plural'=>'<?php echo $text['plural']; ?>',
		'this'=>'<?php echo $text['this']; ?>',
		'that'=>'<?php echo $text['that']; ?>',
		'new'=>'<?php echo $text['new']; ?>',
		'description'=>'<?php echo $text['description']; ?>'
	),
	'label'=>array(<?php if($labels): ?><?php foreach ($fields as $field): ?><?php if($field['name']!=''): ?> 
		'<?php echo $field['name']; ?>'=>'<?php echo $field['label']; ?>',<?php endif; ?><?php endforeach; ?><?php foreach ($collections as $collection): ?><?php if($collection['name']!=''): ?> 
		'<?php echo $collection['name']; ?>'=>'<?php echo $collection['label']; ?>',<?php endif; ?><?php endforeach; ?><?php foreach ($belongs as $belong): ?><?php if($belong['name']!=''): ?> 
		'<?php echo $belong['name']; ?>'=>'<?php echo $belong['label']; ?>',<?php endif; ?><?php endforeach; ?><?php endif; ?> 
	),
	'option'=>array(
	),
	'error'=>array(<?php 
		if($errors){
			$all = array_merge($fields,$collections,$belongs);
			foreach ($all as $field){
				 if($field['name']!='' && isset($field['rules'])){
					 if(!is_array($field['rules'])){
						 $field['rules'] = array($field['rules']);
					 }
					 echo "\n\t\t'".$field['name']."'=>array(";
					 foreach($field['rules'] as $rule){
						 echo "\n\t\t\t'".$rule."'=>'".$field[$rule.'_error']."',";
					 }
					 echo "\n\t\t),";
				 }
			 }
		}?> 
	)
<?php if ($extends): ?>
));
<?php else: ?>
);
<?php endif; ?>
