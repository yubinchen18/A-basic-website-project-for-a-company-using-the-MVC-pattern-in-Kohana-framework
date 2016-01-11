<div class="form-group<?php echo $element->error ? ' has-error' : '' ?>">
	<?php if ($element->label != '' || $comment = $element->comment): ?>
		<label for="<?php echo $element->id ?>">
			<?php if($comment = $element->comment): ?>
				<span class="glyphicon glyphicon-question-sign yf-comment" data-trigger="hover" data-title="<?php echo $element->label ?>" data-content="<?php echo $comment ?>"></span>
			<?php endif; ?>
			<?php echo $element->label ?>
		</label>
	<?php endif; ?>
	
	<?php if ($element->error !== FALSE): ?>
		<span class="help-block"><span class="glyphicon glyphicon-warning-sign"></span> <?php echo $element->error; ?></span>
	<?php endif; ?>

	<?php foreach($element->options as $value => $label): ?>
		<?php
		if(is_array($element->value)){
			$checked = (in_array($value,$element->value));
		} else {
			$checked = $value==$element->value;
		}
		?>
		<div class="checkbox">
			<label>
				<input name="<?php echo $element->name; ?>" value="<?php echo $value; ?>" type="checkbox" <?php echo $checked ? 'checked' : ''; ?> <?php echo HTML::attributes($element->attributes); ?> /> <?php echo $label ?>
			</label>
		</div>
	<?php endforeach; ?>
</div>