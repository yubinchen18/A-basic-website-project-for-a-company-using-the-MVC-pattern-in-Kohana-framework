<?php View::extend('base'); ?>

<?php View::start_block('content'); ?>
	<?php echo isset($_before)?$_before:'' ?>
	<?php echo View::factory('form',array('viewer'=>$viewer))->render(); ?>
	<?php echo isset($_after)?$_after:'' ?>
<?php View::end_block(); ?>