<?php View::start_wrap('base'); ?>
<?php echo isset($_before)?$_before:'' ?>

<div class="sectionHeader">

		<?php echo HTML::anchor(
			Route::url($_route,array('controller'=>strtolower(Request::initial()->controller()),'action'=>'index')),
			text('label.cancel'),
			array(
				'class'=>'back_btn',
			)
		); ?>

	<span><?php echo text('label.version'); ?></span>
</div>
<?php echo View::factory('list/base',array('list'=>$list))->render(); ?>
<?php echo isset($_after)?$_after:'' ?>
<?php View::end_wrap(); ?>