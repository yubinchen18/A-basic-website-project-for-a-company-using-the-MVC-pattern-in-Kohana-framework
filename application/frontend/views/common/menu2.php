<?php

$menu = ORM::factory('menu')->filter('website_id','main');

// get id
$alias = 'main';
			
// exctract data
$data = $menu->branch($alias)->items();
$startDepth = 0;
$html = View::factory('menu/'.$alias,array(
			'data'=>$data,
			'alias'=>$alias,
			'startDepth'=>0
		))->render();

echo $html;
?>