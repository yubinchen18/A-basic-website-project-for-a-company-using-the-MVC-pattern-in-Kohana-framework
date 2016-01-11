<?php
return Text::extend('branch',array(
	'module'=>array(
		'name'=>'groepen',
		'article'=>'de',
		'single'=>'groep',
		'plural'=>'groepen',
		'this'=>'deze',
		'that'=>'die',
		'new'=>'nieuwe',
		'description'=>'beheer van groepen'
	),
	'option'=>array(
		'parent_id'=>array(
			0=>'als hoofdgroep plaatsen',
		),
	)
));