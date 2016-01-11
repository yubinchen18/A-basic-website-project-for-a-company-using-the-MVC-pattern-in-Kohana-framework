<?php
return Settings::extend('item',array(
	
	'group'=>FALSE,
	'list'=>array(
		'type'=>'tree',
		'hidable'=>FALSE,
		'sortable'=>TRUE,
		'tools'=>Settings::lock(array(
			'create',
			'update',
			'delete'
		)),
		'sort'=>Settings::lock(array()),
		'filter'=>Settings::lock(array()),
		'pagination'=>Settings::lock(FALSE),
	),
));
