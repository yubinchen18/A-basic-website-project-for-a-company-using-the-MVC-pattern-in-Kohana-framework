<?php if ($pagination = $viewer->pagination()): ?>
		<!--
		<div class="pull-left">
			<select class="input-mini">
			  <option>10</option>
			  <option>20</option>
			  <option>50</option>
			</select>
		</div>
		-->
		<ul class="form-group pagination">
			<?php foreach($pagination as $paginate): ?>
				<?php if($link = $paginate->link) : ?>
					<li class="<?php echo $paginate->active?'active':'';?>">
						<a href="<?php echo URL::to($link[0],$link[1]); ?>"><?php echo $paginate->label; ?></a>
					</li>
				<?php else: ?>
					<li class="disabled">
						<a href="3"><?php echo $paginate->label; ?></a>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
<?php endif; ?>