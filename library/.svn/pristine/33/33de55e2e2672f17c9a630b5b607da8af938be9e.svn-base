<?php
return Text::extend('item',array(
	'module'=>array(
		'name'=>'link',
		'article'=>'de',
		'single'=>'link',
		'plural'=>'links',
		'this'=>'deze',
		'that'=>'die',
		'new'=>'nieuwe',
		'description'=>'overzicht van linkgebruik in de website'
	),
	'label'=>array(
		'type'=>'type :single',
		'target'=>'openen in',
		'url'=>'adres (inclusief http://)',
		'item'=>'selecteer',
	),
	'option'=>array(
		'type'=>array(
			Model_Link::TYPE_ITEM=>'link naar item selecteren',
			Model_Link::TYPE_URL=>'handmatig adres invoeren',
		),
		'target'=>array(
			'_self'=>'hetzelfde venster',
			'_blank'=>'nieuw venster',
		),
	),
	'error'=>array(
		'item'=>array(
			'valid'=>'kies een item'
		)
	)
));