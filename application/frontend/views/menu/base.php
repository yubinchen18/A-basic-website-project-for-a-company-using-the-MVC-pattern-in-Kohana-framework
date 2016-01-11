<?php 

//  stack of nested nodes
$stack = array();

// add a rootnode to the dom if one was provided
if(isset($nodeRoot)){
	// use root node
	$parent = $nodeRoot;
} else {
	// create root node
	$parent = Dom::node();
}

// object to render at the end of the script
$dom = $parent;

// add current parent to the stack
$stack[]=$parent;

// current depth
$currentDepth = $startDepth;

// loop through items
for($i=0,$count=count($data); $i<$count; $i++){
	// get item
	$item = $data[$i];
	// get depth
	$depth = $item->data('depth') + $startDepth;

	// create item html
	$menuItem = Dom::fragment(View::factory('menu/item/base',array(
		'item' => $item,
		'alias'=> $alias,
		'depth'=> $depth	
	))->render());

	// calulate depth difference
	$depthDiff = $depth - $currentDepth;
	
	// update current depth
	$currentDepth = $depth;

	// lookup or create the correct parent to add the item to
	if($depthDiff>0){
		
		if(isset($nodeBranch)) {
			// use nodebranch as template
			$newParent = clone($nodeBranch);
		} else {
			// create ul node
			$newParent = Dom::node('ul');
		}


		// append class
		$newParent->attribute('class','menuLevel'.$depth,TRUE);

		// add it to the last created item
		$parent->last_child()->append($newParent);

		// set the newly created element as the new parent element
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
	$parent->append($menuItem);
}
	
//output the list
echo $dom->render();
	
?>