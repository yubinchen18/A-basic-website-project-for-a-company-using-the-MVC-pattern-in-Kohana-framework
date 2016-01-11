
<?php $tools = $viewer->create(); ?>

<?php if (count($tools) > 1): ?>

	<div class="btn-group">
		<button class="btn btn-md btn-primary"><?php echo text('label.create'); ?></button>
		<button class="btn btn-md btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<?php foreach ($tools as $tool): ?>
				<li>
					<?php if ($view = $tool->view): ?>
						<?php echo View::factory($view,array('tool'=>$tool))->render(); ?>
					<?php else: ?>
						<a href="<?php echo URL::to($tool->link[0],$tool->link[1],$tool->link[2]); ?>"><?php echo text($tool->text); ?></a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php elseif(count($tools) == 1): ?>
	<?php $tool = $tools[0]; ?>
	<?php if ($view = $tool->view): ?>
		<?php echo View::factory($view,array('tool'=>$tool)); ?>
	<?php else: ?>
		<a class="btn btn-md btn-primary" href="<?php echo URL::to($tool->link[0],$tool->link[1],$tool->link[2]); ?>"><?php echo text($tool->text); ?></a>
	<?php endif; ?>
<?php endif; ?>
