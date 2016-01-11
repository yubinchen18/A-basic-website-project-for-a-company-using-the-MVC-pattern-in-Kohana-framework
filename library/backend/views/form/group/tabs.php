<ul class="nav nav-tabs">
	<?php foreach ($tabs as $tab): ?>
		<li class="<?php echo $tab->active ? 'active' : '' ?>">
			<a href="#<?php echo $tab->id ?>" data-toggle="tab">
				<?php if ($label= $tab->label): ?>
					<?php echo $label; ?>
				<?php endif; ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>

<div class="tab-content">
	<?php foreach ($tabs as $tab): ?>
		<div <?php echo HTML::attributes($tab->attributes); ?>>
			<?php echo $tab->html ?>
		</div>
	<?php endforeach; ?>
</div>