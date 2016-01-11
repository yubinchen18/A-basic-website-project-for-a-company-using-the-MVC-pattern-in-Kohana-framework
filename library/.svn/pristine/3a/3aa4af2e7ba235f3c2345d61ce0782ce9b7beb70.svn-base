<?php $groups = $viewer->groups() ?>
<?php if ($groups !== FALSE): ?>
	<div class="yf" data-use="backend.list.Group" data-settings='<?php echo json_encode(array(
			 'url_group'=>URL::to($viewer->controller().'@list',array('query'=>'group={{group}}')),
			 'url_ungroup'=>URL::to($viewer->controller().'@list',array('query'=>'ungroup=1')),
		)); ?>' >
		<div class="form-group">
			<select class="input-md form-control yf-value">
				<option value="-1"><?php echo text('label.group.all'); ?></option>
				<option value="0"<?php echo $viewer->active_group() === "0" ? ' selected="selected"' : ''; ?>><?php echo text('label.group.ungrouped'); ?> (<?php echo $viewer->ungrouped(); ?>)</option>
				<?php foreach ($groups as $group): ?>
					<option value="<?php echo $group->id; ?>"<?php echo $group->id == $viewer->active_group() ? ' selected="selected"' : ''; ?>>
						<?php for($i=0;$i<$group->depth();$i++): ?>
							&nbsp;&nbsp;&nbsp;
						<?php endfor; ?>
						L
						<?php echo $group->title; ?>  (<?php echo $group->count(); ?>)
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<?php 
		$url = URL::to('Group@list',array(
			'viewport'=>'module',
			'task'=>'manage',
			'callback'=>'{{callback}}',
			'arguments'=>'module='.$viewer->controller()
		));
		?>
		<a class="yf-manage btn btn-default btn-md" href="<?php echo $url; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
	</div>
<?php endif; ?>