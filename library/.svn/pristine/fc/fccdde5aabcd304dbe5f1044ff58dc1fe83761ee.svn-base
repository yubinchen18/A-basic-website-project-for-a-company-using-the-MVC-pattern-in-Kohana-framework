<?php View::extend('base'); ?>

<div class="row">
<?php View::start_block('content'); ?>
	<?php foreach ($sections as $section=>$modules): ?>
		<div class="col-md-2">
			<h4>
				<?php echo text('section.'.$section); ?>
			</h4>
			<?php foreach ($modules as $module=>$settings): ?>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="<?php echo URL::to($module); ?>">
							 <h3 class="panel-title">
								<?php if(isset($settings['icon'])): ?>
									<i class="glyphicon glyphicon-<?php echo $settings['icon'] ?>"></i>
								<?php endif; ?>
								<?php echo text($module.':module.name'); ?>
							</h3>
						</a>
					</div>
					<div class="panel-body">
						<span><?php echo text($module.':module.description') ?></span>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endforeach; ?>
</div>
<?php View::end_block(); ?>
