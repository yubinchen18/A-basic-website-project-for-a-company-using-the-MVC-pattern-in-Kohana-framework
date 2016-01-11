<?php if ($element->multiple): ?>
	<div
		class="yf form-control tag-box clearfix"
		data-use="backend.form.Alias,backend.form.Tags"
		data-source = "<?php echo $element->source ?>"
		data-multiple = "true"
		data-hidden = "<?php echo $element->hidden ? 'true' : 'false' ?>"
		data-template = "tag_item,tag_value"
	>
		<input type="text" class="yf-input tag-input" />
	
		<?php if($element->multiple && is_array($element->value )): ?>
			<?php foreach ($element->value as $value): ?>
				<input type="hidden" class="yf-value" name="<?php echo $element->name; ?>" value="<?php echo $value ?>" />
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<script class="yf" name="tag_item" type="text/html">
		<span class="tag-item yf-item">
			<span class="label label-primary">{{value}}&nbsp;<a href="#" class="yf-remove remove">&times;</a></span>
			&nbsp;
		</span>
	</script>

	<script class="yf" name="tag_value" type="text/html">
		<input type="hidden" class="yf-value" name="<?php echo $element->name; ?>" value="{{value}}" />
	</script>
<?php else: ?>
	<div
		class="yf"
		data-use="backend.form.Alias"
		data-source = "<?php echo $element->source ?>"
		data-multiple = "false"
		data-hidden = "<?php echo $element->hidden ? 'true' : 'false' ?>"
	>
		<?php 
		// make this backwards compatible
		// it is possible that a global alias exists that doesnt have multiple = true in the form
		if(is_array($element->value)){
			if(isset($element->value[0])){
				$value = $element->value[0];
			} else {
				$value = '';
			}
		} else {
			$value = $element->value;
		}
		?>
		<input type="text" class="yf-value form-control" name="<?php echo $element->name; ?>" value="<?php echo $value ?>" />
	</div>
<?php endif; ?>
	
	



