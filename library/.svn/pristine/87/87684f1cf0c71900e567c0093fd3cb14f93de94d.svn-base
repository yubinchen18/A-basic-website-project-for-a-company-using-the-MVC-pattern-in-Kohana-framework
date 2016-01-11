<div class="yf  form-inline" data-use="backend.form.Item" data-settings='<?php echo json_encode(array(
	'url_create'=>URL::to('{{module}}@list',array('viewport'=>'module','task'=>'select','callback'=>'{{callback}}')),
	'url_update'=>URL::to('{{module}}@list:{{id}}',array('viewport'=>'module','task'=>'select','callback'=>'{{callback}}')),
	'url_json'=>URL::to('{{module}}@json:{{id}}'),
))?>'>
	
	<?php echo FormHTML::hidden(
		$element->name.'[item_id]',
		$element->value['item_id'],
		array('class'=>'yf-item_id')
	); ?>
	
	<?php echo FormHTML::hidden(
		$element->name.'[params]',
		isset($element->value['params']) && !empty($element->value['params']) ? json_encode($element->value['params']) : '{}',
		array('class'=>'yf-params')
	); ?>
	
	<?php echo FormHTML::hidden(
		$element->name.'[request]',
		$element->value['request'],
		array('class'=>'yf-request')
	); ?>
	
	<div class="section">
		<div class="form-group">
			<select class="yf-item-module form-control" name="<?php echo $element->name.'[module]' ?>">
				<?php foreach($element->modules as $value => $label): ?>
					<option value="<?php echo $value; ?>" <?php echo $element->value['module'] == $value && $element->value['request'] == '' ? 'selected' : '' ?> >
						<?php echo text($value.':module.single')?>
					</option>
				<?php endforeach; ?>
				<?php foreach($element->requests as $value => $label): ?>
					<option data-request="1" value="<?php echo $value; ?>" <?php echo $element->value['request'] == $value ? 'selected' : '' ?> >
						<?php echo $label; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		
		<div class="form-group">
			<?php echo HTML::anchor(
				'#',
				text('label.add'),
				array('class'=>'yf-create btn btn-default btn-md','title'=>text('abel.add'))
			); ?>
		</div>
		
		<div class="form-group pull-right">
			<?php echo HTML::anchor(
				'#',
				'<span class="glyphicon glyphicon-pencil"></span>',
				array('class'=>'yf-update btn btn-default btn-xs','title'=>text('label.update',array(),FALSE))
			); ?><?php echo HTML::anchor(
				'#',
				'<span class="glyphicon glyphicon-trash"></span>',
				array('class'=>'yf-delete btn btn-default btn-xs','title'=>text('label.delete',array(),FALSE))
			); ?>
		</div>
		
		<div class="yf-item-preview form-group">

		</div>

	</div>
</div>