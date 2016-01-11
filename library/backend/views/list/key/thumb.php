<?php echo HTML::anchor(
	$item->src('original'),
	HTML::image($item->src('admin')),
	array(
		'target'=>'_blank'
	)
); ?>