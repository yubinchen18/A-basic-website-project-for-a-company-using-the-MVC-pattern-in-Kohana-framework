<div class="formElementWidget">
	<a href="#" class="btn link inactive"><span><?php echo text('label.link'); ?></span></a>&nbsp;
	<a href="#" class="btn image inactive"><span><?php echo text('label.image'); ?></span></a>
	<br />
	<textarea rows="20" cols="40" class="widget" name="<?php echo $element->name; ?>"><?php echo str_replace('&','&amp;',$element->value); ?></textarea>
</div>
<?php echo HTML::script($_path['js']['vendor'].'jquery_textinputs/jquery_textinputs.js') ?>
<script type="text/javascript">yf.library('form.widget',{
	controller_image:'<?php echo $element->controller_image; ?>',
	url_link: "<?php echo Route::url($_route,array('mode'=>'dialog','task'=>'link','controller'=>(isset($element->controller_link)?$element->controller_link:'link'),'action'=>'${action}','id'=>'${id}')); ?>",
	url_image: "<?php echo Route::url($_route,array('mode'=>'dialog','task'=>'image','controller'=>(isset($element->controller_image)?$element->controller_image:'image'),'action'=>'embed','id'=>'${id}','param1'=>'${size}')); ?>",
	dialog_image_title: "<?php echo text('header.add_image'); ?>",
	dialog_link_title: "<?php echo text('header.add_link'); ?>"
});</script>