<!DOCTYPE html>
<html lang="<?php echo $_language ?>">
	<head>
		<title><?php echo $_seo->title ?></title>

		<!-- Prevent quirks mode: Force using highest IE mode available, force using chrome plugin for IE if installed -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- site information -->
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />

		<!-- content info -->
		<meta name="keywords" lang="<?php echo $_language ?>" content="<?php echo HTML::chars($_seo->keywords); ?>" />
		<meta name="description" lang="<?php echo $_language ?>" content="<?php echo HTML::chars($_seo->description); ?>" />

		<!-- site information -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<!-- developer info -->
		<meta name="author" content="Yuna internetontwerp" />
		<meta name="generator" content="Yuna CMS | http://www.yuna.nl" />

		<!-- load stylesheets -->	
		<?php echo HTML::style(URL::get('base').'style/css/fonts.css',array('media'=>'screen')); ?>
		<?php echo HTML::style(URL::get('base').'style/css/reset.css',array('media'=>'screen')); ?>
		<?php echo HTML::style(URL::get('base').'style/css/default.css',array('media'=>'screen')); ?>
		<?php echo HTML::style(URL::get('base').'style/css/grid.css',array('media'=>'screen')); ?>
		<?php echo HTML::style(URL::get('base').'style/css/global.css',array('media'=>'screen')); ?>
		<?php echo HTML::style(URL::get('base').'style/css/style.css',array('media'=>'screen')); ?>
		<?php echo HTML::style(URL::get('base').'style/css/menu.css',array('media'=>'screen')); ?>
		<?php echo HTML::style(URL::get('base').'style/css/form.css',array('media'=>'screen')); ?>
		
		<?php
		// Not for iPad, because autozoom breaks
		if (!strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) :
		?>
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<?php endif; ?>
		
		<?php echo HTML::style(URL::get('base').'style/css/responsive/big.css',array('media'=>'all and (min-width:1366px)')); ?>
		<?php echo HTML::style(URL::get('base').'style/css/responsive/medium.css',array('media'=>'all and (min-width:768px) and (max-width:1365px)')); ?>
		<?php echo HTML::style(URL::get('base').'style/css/responsive/small.css',array('media'=>'all and (max-width:767px)')); ?>
			
		<!-- Other CSS assets -->
		<?php foreach(View::assets('css') as $asset): ?>
			<?php echo HTML::style($asset,array('media'=>'screen')); ?>
		<?php endforeach; ?>
		
		<!-- IE Fix for HTML5 Tags & Responsive -->
		<!--[if lt IE 9]>
			<?php echo HTML::script('http://html5shiv.googlecode.com/svn/trunk/html5.js'); ?>
			<?php echo HTML::script(URL::get('vendor').'respond/1_3.js'); ?>
		<![endif]--> 	
		
	</head>

	<body class="<?php View::block('class_body','') ?>">
		
		<!-- Google Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', '<?php echo $_config->ga; ?>', '<?php echo Website::instance()->domain(); ?>');
			ga('send', 'pageview');
		</script>
		

		<nav class="yf-nav">
			<div class="yf-container container">
				
				<!-- Top Menu -->
				<div class="nav-top hidden-small">
					<?php echo $_menu_top ?>
				</div>
				
				<!-- Logo -->
				<a href="<?php echo URL::to(''); ?>" class="logo hidden-small">
					<?php if($_config->logo->loaded()): ?>
						<img src="<?php echo $_config->logo->src('logo')?>" height="70" />
					<?php endif; ?>	
				</a>
				
				<!-- Main Menu -->
				<?php echo $_menu_main ?>
			</div>
		</nav>
		
		<!-- Content -->
		<?php View::block('content',''); ?>
		
		<!-- Footer -->
		<?php echo $_footer ?>

		<!-- Edit button -->
		<div class="yf" data-use="Edit" data-controller="<?php echo Request::initial()->controller() ?>" data-id="<?php echo Request::initial()->param('id',FALSE) ?>" data-url="<?php echo URL::to('Auth@check'); ?>"></div>
				
		<!-- Templates -->
		<?php foreach(View::assets('template') as $asset): ?>
			<?php echo $asset ?>
		<?php endforeach; ?>
	
		<!-- jQuery -->
		<?php echo HTML::script(URL::get('vendor').'jquery/1_9_1.js'); ?>
		<!-- jQuery UI-->
		<?php echo HTML::script(URL::get('vendor').'jquery_ui/js/1_10_2.js'); ?>
		<!-- Underscore -->
		<?php echo HTML::script(URL::get('vendor').'underscore/1_4_4.js'); ?>
		<!-- YF -->
		<?php echo HTML::script(URL::get('library').'js/YF.js'); ?>
		<!-- other JS assets -->
		<?php foreach(View::assets('js') as $asset): ?>
			<?php echo HTML::script($asset); ?>
		<?php endforeach; ?>
		
		<!-- Start up yf -->
		<script type="text/javascript">
		yf.init({
			main:'Main',
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
