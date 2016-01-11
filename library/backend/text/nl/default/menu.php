<?php
return Text::extend('branch',array(
	'module'=>array(
		'name'=>'menu\'s',
		'article'=>'het',
		'single'=>'menu-item',
		'plural'=>'menu-items',
		'this'=>'dit',
		'that'=>'dat',
		'new'=>'nieuw',
		'description'=>'Beheer van menu\'s'
	),
	'label'=>array(
		'behaviour'=>'wat moet :this :single doen?',
		'title'=>'label',
		'link_id'=>'selecteer link',
		'module'=>'link naar module',
		Model_Menu::TYPE_NONE=>'label',
		Model_Menu::TYPE_LINK=>'link',
		Model_Menu::TYPE_CONTROLLER=>'module',
		Model_Menu::TYPE_ITEM=>'selecteer item',
	),
	'option'=>array(
		'type'=>array(
			Model_Menu::TYPE_NONE=>'alleen een label tonen',
			Model_Menu::TYPE_LINK=>'label heeft een link',
			Model_Menu::TYPE_CONTROLLER=>'label linkt naar een module',
			Model_Menu::TYPE_ITEM=>'op deze plek een item plaatsen',
		),
		'parent_id'=>array(
			0=>'als hoofdmenu plaatsen',
		),
	),
	'error'=>array(
		'link_id'=>array('valid'=>'kies een link'),
		'controller'=>array('valid'=>'kies een module'),
		'item'=>array('valid'=>'kies een item'),
	),
));