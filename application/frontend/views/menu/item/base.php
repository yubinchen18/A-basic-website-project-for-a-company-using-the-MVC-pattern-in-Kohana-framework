<?php

if(isset($alias) && $alias!=null && $alias!=''){
	$view = 'menu/item/'.$alias;
} else {
	$view = 'menu/item/default';
}

if(isset($item->type)){
	$class = 'menu_item_content menu_menu_'.$item->id;
	// depending on behaviour: do something
	// with menu items
	switch($item->type){
		case 'none':
			echo View::factory($view,array(
				'depth'=>$depth,
				'content'=>HTML::anchor('#',HTML::chars($item->title))
			))->render();
			break;
		case 'link':
			switch($item->link->type){
				case 'item':
					$itemAlias = ORM::factory('Page')->filter('id', $item->link->item_id)->load()->alias;
					echo View::factory($view,array(
							'depth'=>$depth,
							'content'=>
								HTML::anchor(
									URL::to('page@view:'.$itemAlias),
									HTML::chars($item->title).'<span></span>',
									array(
										'target'=>$item->link->target,
										'title'=>HTML::chars($item->title),
										'class'=>$class
									)
								)
					))->render();
					break;
				case 'url':
					echo View::factory($view,array(
							'depth'=>$depth,
							'content'=>
								HTML::anchor(
									$item->link->url,
									HTML::chars($item->title).'<span></span>',
									array(
										'target'=>$item->link->target,
										'title'=>HTML::chars($item->title),
										'class'=>$class
									)
								)
					))->render();
					break;
			}
			break;
		case 'controller':
			echo View::factory($view,array(
				'depth'=>$depth,
				'content'=>HTML::anchor(
					URL::to($item->controller.'@view'),
					HTML::chars($item->title).'<span></span>',
					array('title'=>HTML::chars($item->title),'class'=>$class))
			))->render();
			break;
		case 'item':
			$itemAlias = ORM::factory('Page')->filter('id', $item->item_id)->load()->alias;
			echo View::factory($view,array(
				'depth'=>$depth,
				'content'=>
				HTML::anchor(
					URL::to('page@view:'.$itemAlias),
					HTML::chars($item->title).'<span></span>',
					array(
						'target'=>$item->link->target,
						'title'=>HTML::chars($item->title),
						'class'=>$class
					)
				)
			))->render();
			break;
		/*
		case Model_Menu::BEHAVIOUR_REQUEST:
			echo $item->request->execute($_route,array('alias'=>$alias,'depth'=>$item->data('depth'),'full'=>$item->full==1));
			break;*/
	}
} else {
	echo View::factory($view,array(
		'depth'=>$depth,
		'content'=>$content
	))->render();
}
?>