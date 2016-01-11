<label>
	<?php if($label = text('label.'.$element->key) ): ?>
		<?php //echo $label; ?>
	<?php elseif($element->multiple()): ?>
		<?php echo text($element->controller.':module.plural'); ?>
	<?php else: ?>
		<?php echo text($element->controller.':module.single'); ?>
	<?php endif; ?>
</label>

<?php

// url to the selection dialog
$params = array(
	'viewport'=>'module',
	'task'=>'select',
	'controller'=>$element->controller,
	'action'=>'list',
	'callback'=>'{{callback}}',
	'arguments'=>'type={{type}}'
);
// extra arguments
if(isset($element->arguments)){
	foreach($element->arguments as $argument => $value){
		$params['arguments'].= ';'.$argument.'='.$value;
	}
}
$url_add = URL::to('',array_merge($params,isset($element->params) ? $element->params : array()));


// url to an update
$params = array(
	'viewport'=>'item',
	'controller'=>$element->controller,
	'action'=>'update',
	'id'=>'{{id}}',
	'callback'=>'{{callback}}'
);
$url_update = URL::to('',array_merge($params,isset($element->params) ? $element->params : array()));


// url to the json data
$url_json = URL::to($element->controller.'@json:{{id}}');

// get types
$types = isset($element->types) ? $element->types : array();

// get an array with values
$value = $element->value();

// collection is also used as connection 
// so a single value in an array
// put null as an empty array
if(is_array($value)){
	$values = $value;
} elseif($value) {
	$values = array();
	$values[]=$value;
} else {
	$values = array();
}


?>


<div 
	class="yf collection section <?php echo isset($element->attributes['class']) ? $element->attributes['class'] : ''; ?>" 
	data-use="backend.form.Collection" 
	data-ids='<?php echo json_encode($values); ?>'
	data-settings='<?php echo json_encode(array(
		'url_add'=>$url_add,
		'url_update'=>$url_update,
		'url_json'=>$url_json,
		'max'=>isset($element->max)?$element->max:980,
		'multiple'=>$element->multiple()
	)); ?>'>
	
	
	<!-- backup: when js fails, the original values will not be lost -->
	<!-- hidden will be removed directly when js loads -->
	<?php foreach ($values as $value): ?>
		<?php echo FormHTML::hidden($element->name,$value,array('class'=>'yf-value-backup')); ?>
	<?php endforeach; ?>
	
	<!-- value template -->
	<script class="yf-template-backup" type="text/html">
		<?php echo FormHTML::hidden($element->name,'{{value}}',array('class'=>'yf-value-backup')); ?>
	</script>
	
	<!-- item template -->
	<script class="yf-template" type="text/html">
		<div class="yf-item item">
			<input type="hidden" name="<?php echo $element->name; ?>" value='{{id}}' />
			<div class="pull-right">
				<a href="#" class="yf-update btn btn-default btn-xs" title="<?php echo text('label.update').' '.text($element->controller.':module.single',array(),FALSE) ?>"><span class="glyphicon glyphicon-pencil"></span></a>
				<a href="#" class="yf-delete btn btn-default btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
			</div>
			<?php echo View::factory('form/collection/'.$element->view); ?>
		</div>
	</script>

	<!-- container -->
	<div class="yf-items"></div>
	
	<div class="form-inline">
		<div class="form-group">
			<!-- type select -->
			<?php if(isset($element->types) && count($element->types)>1 ): ?>
				<select class="yf-type form-control">
					<?php foreach ($element->types as $type): ?>
						<option value="<?php echo $type; ?>"><?php echo text($element->controller.':option.type.'.$type); ?></option>
					<?php endforeach; ?>
				</select>
			<?php elseif(isset($element->types) && count($element->types)==1): ?>
				<input type="hidden" class="yf-type" value="<?php echo $element->types[0]; ?>" />
			<?php else: ?>
				<input type="hidden" class="yf-type" value="none" />
			<?php endif; ?>
		</div>
		
		<!-- add button -->
		<div class="form-group">
			<?php
			$title = text($element->controller.':label.collection_add',$element->controller.':module');
			echo HTML::anchor(
				'#',
				$title,
				array(
					'class'=>'yf-add btn btn-default btn-md',
					'title'=>$title
				)
			); 
			?>
		</div>
	</div>
</div>