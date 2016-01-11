<?php
return Settings::extend('item',array(
	'list' => array(
		'type'=>'table',
		'keys'=>Settings::lock(array(
			'timed'=>array(
				'view'=>'timed',
				'width'=>15
			),
			'timestamp'=>array(
				'view'=>'timestamp',
				'width'=>150
			),
			'time_publication'=>array(
				'view'=>'timestamp',
				'width'=>150
			),
			'title',
		)),
		'sort'=>Settings::lock(array(
			'time_publication'=>'DESC'
		))
	)
));