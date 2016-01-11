<?php
return Settings::extend('item',array(
	'navigation'=>Settings::lock(array(
		'tools'=>array(
			'default'=>array(),
			'index'=>array(),
			'list'=>array(),
			'create'=>array(),
			'update'=>array(),
		),
	))
));