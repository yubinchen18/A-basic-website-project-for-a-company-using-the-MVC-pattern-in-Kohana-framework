<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>
			<?php View::block('head_title', 'default title'); ?>
		</title>		
	</head>
	<body>
		<div style="float:left ;width:30%;">
			<div>
				<?php echo View::factory('common/menu2')->render(); ?>
			</div>
			<div>
				<?php $message = !empty($query['auth'])? $query['auth']:''; ?>
				<?php echo View::factory('common/login', array('message' => $message))->render(); ?>
			</div>
		</div>
		<div style="float:right; width:70%;">
			<?php View::block('content', 'default content'); ?>
		</div>
	</body>
</html>