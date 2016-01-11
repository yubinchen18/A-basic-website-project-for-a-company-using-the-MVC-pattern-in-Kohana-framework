<div class="imageEmbed">

	<script class="imageEmbeddedTemplate" type="text/x-jquery-tmpl">
		<img src=<?php echo $_path['files'].'images/admin/' ?>${file} width="90" height="90" />
	</script>
	
	<?php echo FormHTML::hidden($element->name.'[id]',$element->value['id'],array('class'=>'imageId')); ?>
	<?php echo FormHTML::hidden($element->name.'[file]',$element->value['file'],array('class'=>'imageFile')); ?>
	<?php echo FormHTML::hidden($element->name.'[title]',$element->value['title'],array('class'=>'imageTitle')); ?>
	
	<div class="imageEmbedded">
	</div>
	
		<?php echo HTML::anchor(
			Route::url($_route,array('mode'=>'browse','task'=>'select','controller'=>$element->controller)),
			'<span>'.text($element->controller.':label.browse').'</span>',
			array('class'=>'browse btn')
		); ?>
</div>

<script type="text/javascript">yf.library('form.image.internal');</script>