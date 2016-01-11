<?php View::extend('base') ?>

<?php View::start_block('content') ?>
<div style="height:100px;">
	<?php echo $item->title ?>
</div>
<div style="">
	<?php echo $item->raw('body') ?>
	<?php
	if ($form) {
		echo View::factory('form', array('form' => $form))->render();
	}
	
	if ($downloads) {
		echo '<br>';
		echo View::factory('common/downloads')->render();
	}
	//if ($page) {	
	//}
	?>
	<?php if (isset($query['form']) && $query['form'] == 'sent') {
	echo 'received'; } ?>
</div>

<?php View::end_block() ?>