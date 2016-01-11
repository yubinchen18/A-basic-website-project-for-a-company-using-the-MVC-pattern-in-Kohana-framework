<?php
return Text::extend('base',array(
	'module'=>array(
		'name'=>'paginas',
		'single'=>'pagina',
	),
	'label'=>array(
		'name'=>'naam',
		'send'=>'versturen maar',
	),
	'option' => array(
		'response' => array(
			'call_back' => 'bel me terug',
			'more_info' => 'meer informatie'
		)
	),
	'error' => array(
		'name' => array(
			'not_empty' => 'vul een naam in ja?'
		)
	)
));