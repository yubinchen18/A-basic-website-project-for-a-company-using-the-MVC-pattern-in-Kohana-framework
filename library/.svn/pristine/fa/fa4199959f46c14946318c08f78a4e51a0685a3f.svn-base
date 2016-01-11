<?php
return Settings::extend('file',array(
	'form_embed'=>'Embed',
	'list'=>array(
		'keys'=>Settings::lock(array(
			'thumb'=>array(
				'view'=>'thumb'
			),
			'file',
			'title'
		)),
	),
	'unzip' => TRUE,
	'extensions' => array('jpg','jpeg','png','gif'),
	'url_files'=>'files/images/original',
	'path_files'=>FILESPATH.'images'.DIRECTORY_SEPARATOR.'original'.DIRECTORY_SEPARATOR,
	'url_images'=>'files/images/',
	'path_images'=>FILESPATH.'images'.DIRECTORY_SEPARATOR,
	'sizes' => array(
		'admin'=>array('width'=>90,'height'=>90,'method'=>Image::METHOD_SCALE,'enlarge'=>TRUE),
		'icon'=>array('width'=>30,'height'=>30,'method'=>Image::METHOD_CROP,'enlarge'=>TRUE),
		'thumb'=>array('width'=>100,'height'=>100,'method'=>Image::METHOD_CROP,'enlarge'=>TRUE),
		'small'=>array('width'=>300,'height'=>1000,'method'=>Image::METHOD_SCALE,'enlarge'=>TRUE),
		'normal'=>array('width'=>600,'height'=>2000,'method'=>Image::METHOD_SCALE,'enlarge'=>TRUE),
		'big'=>array('width'=>1000,'height'=>4000,'method'=>Image::METHOD_SCALE,'enlarge'=>FALSE),
		'huge'=>array('width'=>2000,'height'=>8000,'method'=>Image::METHOD_SCALE,'enlarge'=>FALSE),
	),
	'sizes_embed' => array('small','normal'),
	'size_enlarge' => 'big'
));