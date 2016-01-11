<?php
$action = FALSE;
$acl = Acl::instance(); 
$controller = Request::current()->controller();

if($item->branch == 1){
	$action = 'update_branch';
} else {
	$action = 'update';
}	
$allowed = isset($item->owner_id) ? $acl->allowed($controller,$action,$item->owner_id) : $acl->allowed($controller,$action);
$allowed = $allowed && (!isset($item->updatable) || $item->updatable == '1');
?> 

<span class="title">
	<?php if($action && $allowed): ?>
		<?php echo HTML::anchor(Route::url($_route,array('controller'=>$controller,'action'=>$action,'id'=>$item->id)),HTML::chars($item->title)); ?>
	<?php else: ?>
		<?php echo HTML::chars($item->title,FALSE) ?>
	<?php endif; ?>
</span>