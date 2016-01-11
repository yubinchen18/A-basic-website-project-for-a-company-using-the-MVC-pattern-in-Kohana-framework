<?php
return Text::extend('item',array(
	'module'=>array(
		'name'=>'pagina\'s',
		'article'=>'de',
		'single'=>'pagina',
		'plural'=>'pagina\'s',
		'this'=>'deze',
		'that'=>'die',
		'new'=>'nieuwe',
		'description'=>'algemene contentpagina\'s op de website beheren'
	),
	'label'=>array(
		'template'=>'template',
		'subtitle'=>'ondertitel',
		'summary'=>'samenvatting',
		'body'=>'inhoud',
		'content_collection_1'=>'inhoud in de eerste kolom',
		'content_collection_2'=>'inhoud in de tweede kolom',
		'form_id'=>'formulier',
	),
	'option'=>array(
		'menu'=>array('1'=>'probeer submenu uit hoofdmenu te halen'),
		'breadcrumbs'=>array('1'=>'probeer breadcrumbs uit hoofdmenu te halen')
	)
));