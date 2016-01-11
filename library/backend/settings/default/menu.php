<?php
return Settings::extend('branch',array(
	'list'=>array(
		'keys'=>Settings::lock(array(
			'menu'=>array(
				'view'=>'menu'
			)
		)),
	),
	'modules'=>array('Item'),
	'requests'=>array()
));