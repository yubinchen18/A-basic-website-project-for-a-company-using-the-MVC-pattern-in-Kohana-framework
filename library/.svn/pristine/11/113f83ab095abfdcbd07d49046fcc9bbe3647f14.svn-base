<div class="yf" data-use="backend.form.Link" data-settings='<?php echo json_encode(array(
	'url_create'=>URL::to('Link@create',array('viewport'=>'item','callback'=>'{{callback}}')),
	'url_update'=>URL::to('Link@update:{{id}}',array('viewport'=>'item','callback'=>'{{callback}}')),
	'url_delete'=>URL::to('Link@delete:{{id}}'),
	'url_json'=>URL::to('Link@json:{{id}}'),
))?>'>
	
	<script class="yf-template" type="text/html">
		<div>
			<span>{{title}</span><br />
			<span>{{url}}</span>
		</div>
	</script>

	<?php echo FormHTML::hidden(
		$element->name,
		$element->value,
		array('class'=>'yf-value')
	); ?>

	<div class="section">
		<?php echo HTML::anchor(
			'#',
			text('label.link_create'),
			array('class'=>'yf-create btn btn-default btn-md','title'=>text('label.link_create'))
		); ?>
		<div class="pull-right">
			<?php echo HTML::anchor(
				'#',
				'<span class="glyphicon glyphicon-pencil"></span>',
				array('class'=>'yf-update btn btn-default btn-xs','title'=>text('label.link_update'))
			); ?><?php echo HTML::anchor(
				'#',
				'<span class="glyphicon glyphicon-trash"></span>',
				array(
					'class'=>'yf-delete  btn btn-default btn-xs',
					'title'=>text('label.link_delete'),
					'data-question'=>text('question.link_delete')
				)
			); ?>
		</div>
		<div class="yf-preview"></div>
	</div>
</div>