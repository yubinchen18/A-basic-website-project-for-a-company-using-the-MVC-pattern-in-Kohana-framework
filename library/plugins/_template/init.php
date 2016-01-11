<?php
// get settings
$settings = Kohana::$config->load('template');

// create plugin
$plugin = Plugin::factory('template',$settings);

// set text
$plugin->text(Text::factory('Plugin_Template'));

// listen to hooks
foreach($settings as $controller=>$settings){
	Event::listen($controller,Event::BEFORE_LIST,array($plugin,'handle'));
}