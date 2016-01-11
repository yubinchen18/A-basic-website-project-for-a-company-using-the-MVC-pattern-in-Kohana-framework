<table class="table table-striped table-hover yf" data-use="backend.List,backend.list.Table" data-settings='<?php echo json_encode(array(
	'url_move'=>URL::to($viewer->controller().'@move:{{id}}',array('param1'=>'{{after}}')),
	'url_group'=>URL::to($viewer->controller().'@group:{{id}}',array('param1'=>'{{group}}')),
	'sortable'=>$viewer->sortable(),
	'groups'=>$viewer->groups() ? TRUE : FALSE,
	'active_group'=>$viewer->active_group(),
)); ?>'>
	<thead>
		<tr class="">
			<th width="15"><!-- move handle --></th>
			
			<th width="15"><!-- show / hide --></th>
			
			<!--
			<th width="15">
				<?php if($viewer->selectable): ?>
					<?php echo Form::checkbox('all','1',FALSE,array('class'=>'yf-all')); ?>
				<?php endif; ?>
			</th>
			-->
			
			<?php foreach($viewer->keys() as $key): ?>
				<th<?php echo isset($key->width)?' width="'.$key->width.'"':''; ?>>
					<?php if($key->sortable): ?>
						<a href="<?php echo URL::to($key->link[0],$key->link[1]); ?>">
							<?php echo text($key->text); ?>
							<?php if($key->sorted): ?>
								<span class="glyphicon glyphicon-chevron-<?php echo strtoupper($key->direction)==='ASC'?'up':'down'?>"></span>
							<?php endif; ?>
						</a>
					<?php else: ?>
						<?php echo text($key->text); ?>
					<?php endif; ?>
				</th>
			<?php endforeach; ?>
				
			<th><!-- tools --></th>
			
		</tr>
	</thead>

	<tbody>
		<?php foreach($viewer as $item): ?>
			<tr data-id="<?php echo $item->id; ?>" class="yf-list-item<?php echo $item->id == $viewer->active() ? ' success' : ''?>">
				
				<td>
					<?php if($viewer->movable($item)): ?>
						<span class="yf-handle handle glyphicon glyphicon-move"></span>
					<?php endif; ?>
				</td>
				
				<td>
					<?php echo $viewer->show_hide($item); ?>
				</td>
				
				<!--
				<td>
					<?php if($viewer->selectable): ?>
						<?php echo Form::checkbox($item->id,'1',FALSE,array('class'=>'yf-item')); ?>
					<?php endif; ?>
				</td>
				-->

				<?php foreach($viewer->keys($item) as $key): ?>
					<td>
						<?php
						// truncate
						$value = isset($key->truncate) ? Tool::truncate_html($key->value, $key->truncate, '...') : $key->value;
						?>
						<?php if($view = $key->view): ?>
							<?php echo View::factory('list/key/'.$view,array('key'=>$key,'item'=>$item))->render(); ?>
						<?php elseif($link = $key->link): ?>
							<?php echo HTML::anchor(URL::to($link[0],$link[1],$link[2]),$value); ?>
						<?php else: ?>
							<?php echo $value ?>
						<?php endif; ?>
					</td>
				<?php endforeach; ?>
					
				<td>
					<?php echo $viewer->tools($item); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>