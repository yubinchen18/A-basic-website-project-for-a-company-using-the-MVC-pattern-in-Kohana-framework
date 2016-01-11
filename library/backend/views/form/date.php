<div class="yf date" data-use="backend.form.Date" data-settings='<?php echo json_encode(array(
	'type'=>$element->time ? 'time' : 'date',
	'days'=>text('time.days'),
	'days_short'=>text('time.days_short'),
	'months'=>text('time.months'),
	'months_short'=>text('time.months_short'),
	'hour'=>text('time.hour'),
	'minute'=>text('time.minute'),
	'today'=>text('time.today'),
	'now'=>text('time.now'),
	'close'=>text('label.close'),
	'previous'=>text('label.previous'),
	'next'=>text('label.next'),
	'time'=>text('time.time'),
	'format_date'=>text('time.format.date',array(),FALSE),
	'format_separator'=>text('time.format.separator',array(),FALSE),
	'format_time'=>text('time.format.time',array(),FALSE)
)); ?>'>
	<!-- http://trentrichardson.com/examples/timepicker/ -->
	<input type="text" class="yf-date date form-control" />
	<input type="hidden" class="yf-value" name="<?php echo $element->name; ?>" value="<?php echo $element->value; ?>" />
</div>