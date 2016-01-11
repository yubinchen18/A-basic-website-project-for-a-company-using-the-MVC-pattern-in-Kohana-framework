<?php View::extend('base'); ?>

<?php View::start_block('content'); ?>
	<?php echo isset($_before)?$_before:'' ?>
	<?php echo View::factory('list/navigation',array('viewer'=>$viewer))->render(); ?>
	<?php echo View::factory('list/'.$viewer->type(),array('viewer'=>$viewer))->render(); ?>
	<?php echo isset($_after)?$_after:'' ?>
<?php View::end_block(); ?>