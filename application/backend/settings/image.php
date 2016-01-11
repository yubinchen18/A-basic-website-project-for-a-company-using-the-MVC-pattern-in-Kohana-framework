<?php
return Settings::extend('default/image',array(
	'unzip' => TRUE,
	'group' => TRUE,
	'sizes' => array(
		'admin'=>array('width'=>90,'height'=>90,'method'=>Image::METHOD_SCALE,'enlarge'=>TRUE),
		'tiny'=>array('width'=>30,'height'=>30,'method'=>Image::METHOD_SCALE,'enlarge'=>TRUE),
		'thumb'=>array('width'=>100,'height'=>100,'method'=>Image::METHOD_CROP,'enlarge'=>TRUE),
		'small'=>array('width'=>300,'height'=>1000,'method'=>Image::METHOD_SCALE,'enlarge'=>TRUE),
		'normal'=>array('width'=>600,'height'=>2000,'method'=>Image::METHOD_SCALE,'enlarge'=>TRUE),
		'wide'=>array('width'=>800,'height'=>350,'method'=>Image::METHOD_CROP,'enlarge'=>TRUE),
		'big'=>array('width'=>800,'height'=>4000,'method'=>Image::METHOD_SCALE,'enlarge'=>FALSE),
		'huge'=>array('width'=>1000,'height'=>4000,'method'=>Image::METHOD_SCALE,'enlarge'=>FALSE),
		'slide'=>array('width'=>1180,'height'=>349,'method'=>Image::METHOD_CROP,'enlarge'=>TRUE),
	 ), 
	'sizes_embed' => array('tiny','small','normal')
));