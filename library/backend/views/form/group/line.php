<?php if ($label= $group->label): ?>
	<label><?php echo $label; ?></label>
<?php endif; ?>
	
<?php 
$group->attributes['class'].= ' form-inline';
?>

<div <?php echo HTML::attributes($group->attributes); ?>>
	<?php echo $html?>
</div>