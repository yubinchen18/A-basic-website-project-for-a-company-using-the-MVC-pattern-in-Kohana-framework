<?php

echo View::factory('menu/base',array(
	'nodeRoot'=>Dom::node('ul')->attribute('class','main'),
	'nodeBranch'=>Dom::node('ul'),
	'data'=>$data,
	'alias'=>$alias,
	'startDepth'=>$startDepth
))->render(); 

?>