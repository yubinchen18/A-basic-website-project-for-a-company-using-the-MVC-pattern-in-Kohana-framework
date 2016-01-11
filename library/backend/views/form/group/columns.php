<div class="row">
	<?php foreach ($columns as $column): ?>
		<div <?php echo HTML::attributes($column->attributes); ?>>
			<?php if ($label= $column->label): ?>
				<h5><?php echo $label; ?></h5>
			<?php endif; ?>
			<?php echo $column->html ?>
		</div>
	<?php endforeach; ?>
</div>