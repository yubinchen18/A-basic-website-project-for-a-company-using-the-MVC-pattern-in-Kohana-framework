<script class="yf" name="form-element" type="text/html">
<div class="yf-element section">

	<div class="row">
		<div class="col-md-1">
			<span class="yf-handle-element handle glyphicon glyphicon-move"></span>
			<span class="yf-name label label-info">{{element_id}}</span>
		</div>
		
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-2">
					<select class="yf-element-type form-control" name="<?php echo $element->name; ?>[{{element_id}}][type]">
						<?php foreach ($element->element_types as $type): ?>
							<option value="<?php echo $type; ?>"><?php echo text('option.element_type.'.$type); ?></option>
						<?php endforeach; ?>	
					</select>
				</div>
				<div class="col-md-2">
					<input class="yf-element-label form-control" name="<?php echo $element->name; ?>[{{element_id}}][label]" type="text" value="<?php echo text('label.label'); ?>" />
				</div>
				<div class="col-md-2">
					<input class="yf-element-comment form-control" name="<?php echo $element->name; ?>[{{element_id}}][comment]" type="text" value="<?php echo text('label.comment'); ?>" />
				</div>
				<div class="col-md-6">
					<div class="checkbox">
						<label class="yf-element-place-after">
							<input type="checkbox" name="<?php echo $element->name; ?>[{{element_id}}][place_after]" value="1" /> <?php echo text('label.place_after'); ?>
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1">
			<a href="#" class="yf-remove btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-trash"></span></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="yf-section-options section section-nested">
				<div class="row">
					<div class="col-md-3">
						<a href="#" class="yf-add-option btn btn-md btn-default" style="margin-bottom:3px;"><?php echo text('label.add_option'); ?></a>
					</div>
					<div class="yf-options col-md-9"></div>
				</div>
			</div>

			<div class="yf-section-rules section section-nested">
				<div class="row">
					<div class="col-md-3">
						<a href="#" class="yf-add-rule btn btn-md btn-default" style="margin-bottom:3px;"><?php echo text('label.add_rule'); ?></a>
					</div>
					<div class="yf-rules  col-md-9"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</script>


<script class="yf" name="form-option" type="text/html">
<div class="yf-option form-inline">
	<div class="form-group">
		<span class="yf-handle-option handle glyphicon glyphicon-move"></span>
	</div>
	&nbsp;
	<div class="form-group">
		<input class="yf-option-value form-control" name="<?php echo $element->name; ?>[{{element_id}}][options][]" type="text" value="<?php echo text('label.option'); ?>" style="margin-bottom:3px;" />
	</div>
	&nbsp;
	<div class="form-group">
		<a href="#" class="yf-remove-option"><span class="glyphicon glyphicon-remove"></span></a>
	</div>
</div>
</script>

<script class="yf" name="form-rule" type="text/html">
<div class="yf-rule form-inline">
	<div class="form-group">
		<select class="yf-rule-type form-control" name="<?php echo $element->name; ?>[{{element_id}}][rule][{{rule_id}}][type]" style="margin-bottom:3px;">
			<?php foreach ($element->rule_types as $type): ?>
				<option value="<?php echo $type; ?>"><?php echo text('option.rule_type.'.$type); ?></option>
			<?php endforeach; ?>	
		</select>
	</div>
	&nbsp;
	<div class="form-group">
		<input class="yf-rule-value form-control" name="<?php echo $element->name; ?>[{{element_id}}][rule][{{rule_id}}][value]" type="text" value=""/>
	</div>
	&nbsp;
	<div class="form-group">
		<input class="yf-rule-error form-control" name="<?php echo $element->name; ?>[{{element_id}}][rule][{{rule_id}}][error]" type="text" value="<?php echo text('label.error'); ?>" />
	</div>
	&nbsp;
	<div class="form-group">
		<a href="#" class="yf-remove-rule"><span class="glyphicon glyphicon-remove"></span></a>
	</div>
</div>
</script>

<div class="yf-elements" data-elements='<?php echo json_encode($element->value); ?>'></div>

<a href="#" class="yf-add-element btn btn-primary"><?php echo text('label.add_element'); ?></a>



