<?php if ($extends): ?>
return Text::extend('<?php echo $extends; ?>',array(
<?php else: ?>
return array(
<?php endif; ?>
	'module'=>array(
		'name'=>'<?php echo $text['name']; ?>',
		'single'=>'<?php echo $text['single']; ?>',
	),
	'label'=>array(
	)
<?php if ($extends): ?>
));
<?php else: ?>
);
<?php endif; ?>