<?php
if(in_array($element->type,array('text','password','select','file','textarea'))){
	$errorType = 'wrap';
} else {
	$errorType = 'icon';
}
?>

<div class="form-group<?php echo $element->error ? ' has-error' : '' ?>">
	
	<?php if ($element->label != '' || $comment = $element->comment): ?>
		<label for="<?php echo $element->id ?>">
			<?php if($comment = $element->comment): ?>
				<span class="glyphicon glyphicon-question-sign yf-comment" data-trigger="hover" data-title="<?php echo $element->label ?>" data-content="<?php echo $comment ?>"></span>
			<?php endif; ?>
			<?php echo $element->label ?>
		</label>
	<?php endif; ?>
	
	<?php if ($element->error !== FALSE && $errorType == 'icon'): ?>
		<span class="help-block"><span class="glyphicon glyphicon-warning-sign"></span> <?php echo $element->error; ?></span>
	<?php endif; ?>
		
	<?php if ($element->error  !== FALSE && $errorType == 'wrap'): ?>
		<span class="yf-error" data-trigger="hover" data-placement="bottom" data-title="<?php echo $element->error; ?>">
	<?php endif; ?>
		
		<?php echo $element->html ?>
		
	<?php if ($element->error !== FALSE && $errorType == 'wrap'): ?>
		</span>
	<?php endif; ?>	
</div>