<?php View::extend('base'); ?>
<?php View::start_block('content'); ?>
	<div class="yf" data-use="backend.Dialog" data-settings='<?php echo str_replace("'","&#039;",json_encode(array(
		'data'=>$data,
		'callback'=>$callback,
		'remove'=>TRUE
	)));?>'></div>
<?php View::end_block(); ?>