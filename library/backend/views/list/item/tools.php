<div class="btn-group pull-right">
	<?php if($callback): ?>
		<a class="yf btn btn-default btn-xs" 
		   data-to="callback"
		   data-callback="yf.backend.List.use"
		   data-callback_id="<?php echo $callback ?>"
		   data-item='<?php 
		   $data = $item->raw()->as_array();
		   $data['allow_update'] = $update !== FALSE;
		   if(isset($route) && $route){
			 $data['route'] = $route;
		   }
		   echo htmlspecialchars(json_encode($data), ENT_QUOTES);
		   ?>'
		   href="#" 
		   title="<?php echo text('label.use'); ?>">
			<span class="glyphicon glyphicon-ok-sign"></span>
		</a>
	<?php endif; ?>
	
	<?php if($create): ?>
		<a class="btn btn-default btn-xs" href="<?php echo URL::to($create->link[0],$create->link[1],$create->link[2]); ?>" title="<?php echo text($create->text); ?>" <?php echo HTML::attributes($create->attributes) ?>>
			<?php if ($create->icon): ?>
				<span class="glyphicon glyphicon-<?php echo $create->icon?>"></span>
			<?php else: ?>
				<span class="glyphicon glyphicon-plus-sign"></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	
	<?php if($update): ?>
		<a class="btn btn-default btn-xs" href="<?php echo URL::to($update->link[0],$update->link[1],$update->link[2]); ?>" title="<?php echo text($update->text); ?>" <?php echo HTML::attributes($update->attributes) ?>>
			<?php if ($update->icon): ?>
				<span class="glyphicon glyphicon-<?php echo $update->icon?>"></span>
			<?php else: ?>
				<span class="glyphicon glyphicon-pencil"></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<?php if($delete): ?>
		<a class="btn btn-default btn-xs yf" data-to="confirm" data-callback="yf.backend.List.remove" data-body="<?php echo text('question.delete')?>" href="<?php echo URL::to($delete->link[0],$delete->link[1],$delete->link[2]); ?>" title="<?php echo text($delete->text); ?>" <?php echo HTML::attributes($delete->attributes) ?>>
			<?php if ($delete->icon): ?>
				<span class="glyphicon glyphicon-<?php echo $delete->icon?>"></span>
			<?php else: ?>
				<span class="glyphicon glyphicon-trash"></span>
			<?php endif; ?>
		</a>
	<?php endif; ?>
	
	<?php if($groups): ?>
		<a class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" href="#">
			<span class="glyphicon glyphicon-folder-open"></span>
		</a>
		<ul class="dropdown-menu pull-right">
			<li class="yf-group <?php echo $item->group_id === '0' ? 'disabled' : ''?>" data-item_id="<?php echo $item->id; ?>" data-group_id="0">
				<a href="#"><?php echo text('label.group.ungrouped'); ?></a>
			</li>
			<?php foreach($groups as $group): ?>
				<li class="yf-group <?php echo $group->id == $item->group_id ? 'disabled' : ''?>" data-item_id="<?php echo $item->id; ?>" data-group_id="<?php echo $group->id; ?>">
					<a href="#">
					<?php for($i=0;$i<$group->depth();$i++): ?>
						&nbsp;&nbsp;&nbsp;
					<?php endfor; ?>
					L
					<?php echo $group->title; ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if(count($other)>0): ?>
		<a class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" href="#">
			<span class="glyphicon glyphicon-wrench"></span>
		</a>
		<ul class="dropdown-menu pull-right">
			<?php foreach($other as $tool): ?>
				<li>
					<?php if(isset($tool->view) && $tool->view): ?>
						<?php echo View::factory('list/tool/'.$tool->view,array('tool'=>$tool,'item'=>$item))->render(); ?>
					<?php else: ?>
						<a href="<?php echo URL::to($tool->link[0],$tool->link[1],$tool->link[2]); ?>" title="<?php echo text($tool->text); ?>" <?php echo HTML::attributes($tool->attributes) ?>>
							<?php echo text($tool->text); ?>
						</a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>