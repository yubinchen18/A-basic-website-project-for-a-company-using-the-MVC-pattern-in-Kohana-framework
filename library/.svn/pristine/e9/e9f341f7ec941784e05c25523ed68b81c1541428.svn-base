<div class="yf row" data-use="backend.form.Timed">

	
	<div class="yf-start col-md-6">
		<label>
			<?php echo FormHTML::checkbox($element->name.'[use_time_show_start]','1',$element->value['use_time_show_start']=='1',array('class'=>'yf-use')); ?>
			<?php echo text('label.time_show_start'); ?>
		</label>
		<div class="yf-date">
			<?php echo View::factory('form/date',array('element'=>(object)array(
				'time'=>TRUE,
				'name'=>$element->name.'[time_show_start]',
				'value'=>isset($element->value['time_show_start']) ? $element->value['time_show_start'] : date('Y-m-d H:i:s',time())
			))); ?>
		</div>
	</div>



	<div class="yf-end col-md-6">
		<label>
			<?php echo FormHTML::checkbox($element->name.'[use_time_show_end]','1',$element->value['use_time_show_end']=='1',array('class'=>'yf-use')); ?> 
			<?php echo text('label.time_show_end'); ?>
		</label>

		<div class="yf-date">
			<?php echo View::factory('form/date',array('element'=>(object)array(
				'time'=>TRUE,
				'name'=>$element->name.'[time_show_end]',
				'value'=>isset($element->value['time_show_end']) ? $element->value['time_show_end'] : date('Y-m-d H:i:s',time())
			))); ?>
		</div>
	</div>

</div>