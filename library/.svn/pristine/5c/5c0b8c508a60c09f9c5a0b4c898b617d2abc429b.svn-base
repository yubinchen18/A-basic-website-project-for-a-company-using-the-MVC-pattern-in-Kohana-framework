<div class="module">
	<div class="pull-left">
		<?php if(Request::initial()->param('viewport')!='module'): ?>
			<span class="breadcrumbs caps">
				<?php foreach($navigation->breadcrumbs() as $breadcrumb): ?>
					<?php echo ($breadcrumb->first ? '' : ' / ').HTML::anchor($breadcrumb->href,$breadcrumb->label); ?>
				<?php endforeach; ?>
			</span>
		<?php endif; ?>

		<div class="title">
			<h1 class="title caps pull-left"><?php echo $navigation->title(); ?></h1>
			<?php foreach($navigation->tools() as $tool): ?>
				<?php if($view = $tool->view): ?>
					<?php echo View::factory($view,array('tool'=>$tool))->render(); ?>
				<?php elseif($tool->action === 'delete'): ?>
					<?php echo HTML::anchor(
						URL::to($tool->link),
						'<span class="badge">'.text($tool->text).'</span>',
						array(
							'class'=>'yf',
							'data-to'=>'confirm',
							'title'=>text($tool->text),
							'data-body'=>text('question.delete')
						)
					); ?>
				<?php else: ?>
					<?php echo HTML::anchor(
						URL::to($tool->link),
						'<span class="badge">'.text($tool->text).'</span>',
						$tool->attributes
					); ?>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
	<?php if($message = Session::instance('database')->get_once('message')): ?>
		<div class="alert alert-<?php echo $message['status']; ?> pull-right">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $message['message']; ?>
		</div>
	<?php endif; ?>
</div>
