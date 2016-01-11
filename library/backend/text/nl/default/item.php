<?php
return Text::extend('base',array(
	'module'=>array(
		'name'=>'items',
		'article'=>'het',
		'single'=>'item',
		'plural'=>'items',
		'this'=>'dit',
		'that'=>'dat',
		'new'=>'nieuw',
		'description'=>'beheer standaardcontent'
	),
	'label'=>array(
		'created'=>'gemaakt',
		'timestamp'=>'gewijzigd',
		'title'=>'titel',
		'alias'=>'url alias',
		'collection_add'=>':single toevoegen',
		'connection_add'=>':single toevoegen',
		'request'=>'plaatsen',
		'status'=>'status',
		'owner_id'=>'eigenaar',
		'editor_id'=>'gewijzigd door',
		'meta_title'=>'meta titel',
		'meta_keywords'=>'meta keywords',
		'meta_description'=>'meta description',
		'time_show_start'=>'tonen vanaf',
		'time_show_end'=>'tonen tot',
	),
	'option'=>array(
		'operator'=>array(
			'='=>'is',
			'<>'=>'is niet',
			'>'=>'groter dan',
			'<'=>'kleiner dan',
			'LIKE'=>'bevat',
		),
		'status'=>array(
			Model_Item::STATUS_EDIT=>'niet gepubliceerd',
			Model_Item::STATUS_LIVE=>'gepubliceerd'
		)
	),
	'comment'=>array(
		'alias'=>'Fungeert als een \'shortcut\' naar :article :single',
	),
	'error'=>array(
		'title'=>array('not_empty'=>'vul een titel in'),
		'alias'=>array('not_empty'=>'vul een url in'),
	),
	'message'=>array(
		'uploaded'=> 'de :plural zijn geüpload'
	)
));