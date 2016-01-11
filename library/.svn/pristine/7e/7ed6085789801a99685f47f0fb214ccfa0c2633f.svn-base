<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin</title>

		<!-- site information -->
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />

		<!-- cache options -->
		<meta http-equiv="pragma" content="no-cache" />

		<!-- load stylesheets -->
		<?php echo View::factory('asset/css')->render(); ?>	
		<?php foreach(View::assets('css') as $asset): ?>
			<?php echo HTML::style($asset,array('media'=>'screen')); ?>
		<?php endforeach; ?>
	</head>


	<body>
		<?php $viewport = Request::initial()->param('viewport') ? Request::initial()->param('viewport') : 'application'; ?>
		<?php if ($viewport==='application'): ?>
			<div class="navigation yf-navigation">
				<?php
				// top navigation
				$uri = Route::get('backend')->uri(array('controller'=>'Navigation','action'=>'top'));
				echo Request::factory($uri)->execute()->body();
				?>

				<?php 
				// module navigation
				$uri = Route::get('backend')->uri(array('controller'=>'Navigation','action'=>'module'));
				echo Request::factory($uri)->execute()->body();
				?>
			</div>
		<?php endif; ?>
		
		<div class="yf-content content">
			<?php 
			// content
			View::block('content',''); 
			?>
		</div>

		<!-- templates -->
		<?php echo View::factory('asset/templates')->render(); ?>	
		<?php foreach(View::assets('template') as $asset): ?>
			<?php echo $asset ?>
		<?php endforeach; ?>
		
		<!-- javascript -->
		<?php echo View::factory('asset/js')->render(); ?>
		<?php foreach(View::assets('js') as $asset): ?>
			<?php echo HTML::script($asset); ?>
		<?php endforeach; ?>
		
		<!-- start up yf -->
		<script type="text/javascript">
		yf.init({
			main:'backend.Main',
			load:'<?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'files' : 'bundle'; ?>',
			url_scripts:'<?php echo URL::get('base') ?>js.php?file=',
			url_bundles:'<?php echo URL::get('base') ?>js/bundles/',
			messages: <?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'true' : 'false'; ?>,
			errors: <?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'true' : 'false'; ?>,
			console: <?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'true' : 'false'; ?>
		});
		</script>
	</body>
</html>