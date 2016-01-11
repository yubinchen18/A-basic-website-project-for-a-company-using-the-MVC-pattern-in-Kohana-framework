<?php

switch($item->type){
	
	case Model_Menu::TYPE_NONE:
		if($item->updatable == 1){
			echo HTML::anchor(URL::to('Menu@update:'.$item->id),$item->title);
		} else {
			echo $item->title;
		}
		break;
	case Model_Menu::TYPE_LINK:
		echo '<span class="glyphicon glyphicon-hand-up"></span>';
		echo '<strong>'.HTML::anchor(URL::to('Menu@update:'.$item->id),$item->title).'</strong>: '.$item->link->url('frontend');
		break;
	case Model_Menu::TYPE_CONTROLLER:
		echo '<span class="glyphicon glyphicon-hand-up"></span>';
		echo '<strong>'.HTML::anchor(URL::to('Menu@update:'.$item->id),$item->title).'</strong>: '.text($item->controller.':module.name');
		break;
	case Model_Menu::TYPE_ITEM:
		echo '<span class="glyphicon glyphicon-share-alt"></span>';
		if($item->request != ''){
			echo HTML::anchor(URL::to('Menu@update:'.$item->id),text('option.request.'.$item->request));
		} else {
			$title = $item->title != '' ? $item->title : $item->{strtolower($item->module)}->title;
			$a_menu = HTML::anchor(URL::to('Menu@update:'.$item->id),text($item->module.':module.single'));
			$a_item = HTML::anchor(URL::to($item->module.'@update:'.$item->item_id),$title);
			echo '<strong>'.$a_menu.'</strong>: '.$a_item;
		}
		break;
}
?>