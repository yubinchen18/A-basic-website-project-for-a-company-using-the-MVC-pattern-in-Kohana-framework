<?php if ($viewer->filter_settings()): ?>


	<span class="yf filter" data-use="backend.list.Filter" data-template="filter_select,filter_operator,filter_text,filter_date,,filter_options,filter_add" data-settings='<?php
	echo json_encode($viewer->filter_settings()); 
	?>'>
		<a class="yf-add btn btn-default btn-md" href="<?php echo URL::to($viewer->controller().'@list',array('query'=>'filter={{field}}&operator={{operator}}&value={{value}}'))?>" style="display:none"><span class="glyphicon glyphicon-search"></span></a>
	</span>

	<script class="yf" name="filter_select" type="text/html">
		<div class="form-group">
			<select class="input-md form-control yf-value">
				{{#options :option :value}}
					<option value="{{value}}">{{option.label}}</option>
				{{/options}}
			</select>
		</div>
	</script>

	<script class="yf" name="filter_operator" type="text/html">
		<div class="form-group">
			<select class="input-md form-control yf-value">
				{{#options :option :value}}
					<option value="{{value}}">{{option.label}}</option>
				{{/options}}
			</select>
		</div>
	</script>

	<script class="yf" name="filter_text" type="text/html">
		<div class="form-group">
			<input type="text" class="form-control input-md yf-value" value="">
		</div>
	</script>

	<script class="yf" name="filter_options" type="text/html">
		<div class="form-group">
			<select class="input-md form-control yf-value">
				{{#options :option :value}}
					<option value="{{value}}">{{option.label}}</option>
				{{/options}}
			</select>
		</div>
	</script>

	<script class="yf" name="filter_date" type="text/html">
		<div class="form-group">
			<?php
				$dateElement = (object) array(
					'time'=>TRUE,
					'name'=>'value',
					'value'=>'',
					'attributes'=>array(
						'class'=>'yf-value',
						'data-settings'=>'{}'
					)
				);
				echo View::factory('form/date',array('element'=>$dateElement));
			?>
		</div>
	</script>

	<div class="filter">
		<?php foreach($viewer->filters() as $filter): ?>
			<div class="alert alert-info pull-left">
				<a type="button" class="close" href="<?php echo URL::to($filter->link[0],$filter->link[1]) ?>">&times;</a>
				<?php echo text('label.'.$filter->field)?> <?php echo text('option.operator.'.$filter->operator,array(),FALSE) ?>  <?php echo HTML::chars($filter->value) ?>
			</div>
		<?php endforeach; ?>
	</div>

<?php endif; ?>