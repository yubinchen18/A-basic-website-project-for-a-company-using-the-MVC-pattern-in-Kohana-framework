<?php if(isset($keys) && is_array($keys)): ?>
	<?php foreach($keys as $key): ?>
		<?php if($key == 'status'): ?>
			<?php echo View::factory('list/keys/status',array('item'=>$item)); ?>
		<?php elseif($key == 'title'): ?>
			<?php echo View::factory('list/keys/title',array('item'=>$item)); ?>
		<?php elseif(isset($item->{$key})): ?>
			<span class="<?php echo $key ?>"><?php echo HTML::chars($item->{$key}) ?></span>
		<?php else: ?>
			<?php echo View::factory('list/keys/'.$key,array('item'=>$item)); ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php else: ?>
	<?php echo View::factory('list/keys/title',array('item'=>$item)); ?>
<?php endif; ?>