<?php View::asset('js',URL::get('vendor').'tinymce/tinymce.min.js'); ?>
<?php View::asset('js',URL::get('library').'js/backend/tinymce/yflink/plugin.js'); ?>
<?php View::asset('js',URL::get('library').'js/backend/tinymce/yfimage/plugin.js'); ?>
<?php View::asset('template','<script class="yf" name="tinymce-image-default" type="text/html">
<img align="left" data-id="{{id}}" src="{{src}}" alt="{{title}}" data-size="{{size}}" data-enlarge="{{enlarge}}" />
</script>'); ?>
<!-- Text area -->
<span class="yf" data-use="backend.form.Tinymce" data-template="tinymce-image-default" data-settings='<?php echo json_encode(array(
	'tinymce'=>array(
		'mode'=>'textareas',
		'selector'=>'',//done in js,
		'content_css'=> URL::get('base').'style/css/default.css,'.URL::get('base').'style/css/style.css,'.URL::get('base').'style/css/wysiwyg.css', 
		'convert_urls' => FALSE,
		'force_p_newlines'=>FALSE,
		'language'=>$_language,
		'paste_word_valid_elements'=> 'b,strong,i,em,h1,h2',
		'menubar' => 'edit, insert, view, format, table',
		'valid_elements'=>'object[height|width|style|data|type],param[name|value|style],embed[src|type|allowscriptaccess|allowfullscreen|width|height],span[name|value|style],strong/b,em/i,u/underline,a[href|target|id|class|title|data-id|style],p[style],h2[style],h3[style],hr[style],br,ul[style],ol[style],li[style],img[src|alt|title|align|width|height|id|class|rel|data-size|data-id|data-enlarge|style],table[style|width|height],tr[width|height],td[width|height|rowspan|colspan],th,tbody,sub,sup,iframe[src|width|height|frameborder|style],pre[style],div[class|style],blockquote[class|style],code[class|style]',
		'toolbar1' => 'undo redo | styleselect | bold italic | bullist numlist | yflink yfimage | code',
		'width'=>'100%',
		'height'=>400,
		'plugins'=>'paste,media,table,yfimage,yflink,code',
	),
	'url_link'=>URL::to((isset($element->controller_link)?$element->controller_link:'link').'@{{action}}:{{id}}',array('viewport'=>'item','callback'=>'{{callback}}')),
	'title_link'=>text('link:module.single'),
	'url_image'=>URL::to((isset($element->controller_image)?$element->controller_image:'image').'@embed:{{id}}',array('viewport'=>'item','param1'=>'{{size}}','callback'=>'{{callback}}')),
	'title_image'=>text('image:module.single'),
	'path_images'=>URL::get('files').'images/'
)); ?>'>
	
	<?php echo FormHTML::textarea($element->name,HTML::chars($element->value),$element->attributes,FALSE); ?>
</span>
