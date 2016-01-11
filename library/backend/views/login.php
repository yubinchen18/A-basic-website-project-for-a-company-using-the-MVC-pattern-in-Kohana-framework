<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Inloggen</title>
	<!-- site information -->
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />

	<!-- developer info -->
		<meta name="author" content="Yuna, Rotterdam" />
		<meta name="copyright" content="Yuna, Rotterdam" />
		<meta name="reply-to" content="info@yuna.nl" />
		<link rev="made" href="mailto:info@yuna.nl" />

	<!-- charset -->
		<meta charset="utf-8">

	<!-- load stylesheets -->
		<?php echo HTML::style(URL::get('vendor').'bootstrap/css/bootstrap.css',array('media'=>'screen')); ?>
		<?php echo HTML::style(URL::get('library').'style/backend/css/override.css',array('media'=>'screen')); ?>
		<?php echo HTML::style(URL::get('library').'style/backend/css/login.css',array('media'=>'screen')); ?>
	</head>


	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<h1>Inloggen</h1>
					<?php if($message): ?>
						<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<?php echo $message; ?>
						</div>
					<?php endif ?>
					<?php echo View::factory('form',array('viewer'=>$viewer,'message'=>$message))->render(); ?>
				</div>
			</div>
		</div>

		<!-- jQuery -->
		<?php echo HTML::script(URL::get('vendor').'jquery/1_9_1.js'); ?>
		<!-- jQuery-ui -->
		<?php echo HTML::script(URL::get('vendor').'jquery_ui/js/1_10_2.js'); ?>
		<!-- Bootstrap -->
		<?php echo HTML::script(URL::get('vendor').'bootstrap/js/bootstrap.js'); ?>
		<!-- Underscore -->
		<?php echo HTML::script(URL::get('vendor').'underscore/1_4_4.js'); ?>
		<!-- Respond -->
		<?php echo HTML::script(URL::get('vendor').'respond/1_3.js'); ?>
		<!-- YF -->
		<?php echo HTML::script(URL::get('library').'js/YF.js'); ?>
		
		<script type="text/javascript">
		yf.init({
			main:'backend.Login',
			load:'<?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'files' : 'bundle'; ?>',
			url_scripts:'<?php echo URL::get('base') ?>js.php?file=',
			url_bundles:'<?php echo URL::get('base') ?>js/bundles/',
			url_bundler:'<?php echo URL::get('base') ?>js.php',
			messages: <?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'true' : 'false'; ?>,
			errors: <?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'true' : 'false'; ?>,
			console: <?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'true' : 'false'; ?>
		});
		</script>
	</body>
</html>