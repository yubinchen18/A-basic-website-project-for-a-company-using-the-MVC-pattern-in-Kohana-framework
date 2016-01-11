<script class="yf" name="form-email" type="text/html">
<div class="yf-email section">
	<div class="row">
		<div class="col-md-3">
			<label><?php echo text('label.to_email'); ?></label>
			<select class="yf-email-to_element form-control" name="<?php echo $element->name; ?>[{{email_id}}][to_element]">
			</select>
			<div class="yf-section-email-to_email">
			<label><?php echo text('label.manual'); ?></label>
			<input class="yf-email-to_email form-control" name="<?php echo $element->name; ?>[{{email_id}}][to_email]" type="text" value="" />
			</div>
			<label><?php echo text('label.to_name'); ?></label>
			<input class="yf-email-to_name form-control" name="<?php echo $element->name; ?>[{{email_id}}][to_name]" type="text" value="" />
		</div>
		<div class="col-md-3">
			<label><?php echo text('label.from_email'); ?></label>
			<input class="yf-email-from_email form-control" name="<?php echo $element->name; ?>[{{email_id}}][from_email]" type="text" data-domain="<?php echo $element->from_domain;?>" />
			<label><?php echo text('label.from_name'); ?></label>
			<input class="yf-email-from_name form-control" name="<?php echo $element->name; ?>[{{email_id}}][from_name]" type="text" value="" />
		</div>	
		<div class="col-md-5">
			<label><?php echo text('label.subject'); ?></label>
			<input class="yf-email-subject form-control" name="<?php echo $element->name; ?>[{{email_id}}][subject]" type="text" value="" />
			<label><?php echo text('label.body'); ?></label>
			<textarea class="yf-email-body form-control" rows="8" name="<?php echo $element->name; ?>[{{email_id}}][body]"></textarea>
		</div>
		<div class="col-md-1">
			<a href="#" class="yf-remove  btn btn-default btn-xs pull-right"><span class="glyphicon glyphicon-trash"></span></a>
		</div>
	</div>
</div>
</script>

<script class="yf" name="form-email-option-manual" type="text/html">
<option value="manual"><?php echo text('option.email.manual'); ?></option>
</script>

<div class="yf-emails" data-emails='<?php echo json_encode($element->value); ?>'></div>

<a href="#" class="yf-add-email btn btn-primary"><?php echo text('label.add_email'); ?></a>



