<?php

// include js library
View::asset('js',URL::get('vendor').'jquery/sortable_nestable.js'); 

	
// create root
$root = Dom::node('ul',array(
	'class'=>'yf tree',
	'data-use'=>'backend.List,backend.list.Tree',
	'data-settings'=>json_encode(array(
		'url_move'=>URL::to($viewer->controller().'@move:{{id}}',array('param1'=>'{{after}}','param2'=>'{{parent}}')),
		'sortable'=>$viewer->sortable()
	))
));

// first parent is the root
$parent = $root;

//  stack of nested nodes
$stack = array();

// startdept: 0
$currentDepth = 0;

// add current parent to the stack
$stack[]=$parent;

// go through list
foreach($viewer as $item){
	// get depth
	$depth = $item->depth();

	// create li
	$li = Dom::node('li',array(
		'class'=>'yf-list-item depth-'.$depth,
		'data-id'=>$item->id,
		'data-depth'=>$depth
	));
	
	// set movable
	if($viewer->movable($item)){
		$li->attribute('class','yf-movable',TRUE);
	}
	
	// set active
	if($item->id === $viewer->active()){
		$li->attribute('class','active',TRUE);
	}
	
	// content div
	$div = Dom::node('div',array(
		'class'=>'content',
	));
	$li->append($div);
	
	// handle
	if($viewer->movable($item)){
		$div->append(Dom::fragment('<span class="yf-handle handle glyphicon glyphicon-move"></span>'));
	}
	// set keys
	$keys = '';
	foreach($viewer->keys($item) as $key){
				
		// truncate
		$value = isset($key->truncate) ? Tool::truncate_html($key->value, $key->truncate, '...') : $key->value;
						
		if($view = $key->view){
			$keys.= View::factory('list/key/'.$view,array('key'=>$key,'item'=>$item))->render();
		} elseif($link = $key->link){
			$keys.= HTML::anchor(URL::to($link[0],$link[1],$link[2]),$value);
		} else {
			$keys.= $value;
		}
	}
	$div->append(Dom::fragment($keys));
	
	
	// set tools
	$tools= $viewer->tools($item);
	$div->append(Dom::fragment($tools));


	// calulate depth difference
	$depthDiff = $depth - $currentDepth;
	
	// update current depth
	$currentDepth = $depth;

	// loopup or create the correct parent to add the item to
	if($depthDiff>0){
		// create new parent with an UL
		$newParent = Dom::node('ul');
		
		// add it to the last created li
		$parent->last_child()->append($newParent);
		
		// set the newly created element as the new parentelement
		$parent = $newParent;
		
		// add this parent to the stack
		$stack[]= $parent;
		
	} elseif($depthDiff==0){
		// do nothing
	} elseif($depthDiff<0){
		// traverse back thought the tree to set a new parent
		for($j=0;$j>$depthDiff;$j--){
			array_pop($stack);
			$parent = $stack[count($stack)-1];
		}
	}
	 
	// add item to the current parent
	$parent->append($li);
}
?>

<?php echo $root->render(); ?>
