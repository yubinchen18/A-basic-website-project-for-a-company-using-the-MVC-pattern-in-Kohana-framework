<?php
return array(
	'Home'=>array(
		'index'=>array(
			'lifetime'=>3600,
			'key'=>'content_home_:website',
			'group'=>'content',
		)
	),
	'Page'=>array(
		'view'=>array(
			'lifetime'=>3600,
			'key'=>'content_page_view_:id',
			'group'=>'content',
			'filter'=>function($request){
				$post = $request->post();
				if(!empty($post)){
					return FALSE;
				} else {
					return TRUE;
				}
			}
		)
	),
	'News'=>array(
		'index'=>array(
			'lifetime'=>3600,
			'key'=>'content__news_view_:website',
			'group'=>'content',
		),
		'view'=>array(
			'lifetime'=>3600,
			'key'=>'content__news_view_:website_:id',
			'group'=>'content',
		)
	),
	'Event'=>array(
		'index'=>array(
			'lifetime'=>3600,
			'key'=>'content__event_view_:website',
			'group'=>'content',
		),
		'view'=>array(
			'lifetime'=>3600,
			'key'=>'content__event_view_:website_:id',
			'group'=>'content',
			'filter'=>function($request){
				$post = $request->post();
				if(!empty($post)){
					return FALSE;
				} else {
					return TRUE;
				}
			}
		)
	),
	'Twitter'=>array(
		'data'=>array(
			'lifetime'=>900,
			'key'=>'content_twitter_data_:website',
			'group'=>'content',
		),
	),
);