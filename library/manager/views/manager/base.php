<!DOCTYPE html>
<html lang="">
	<head>
		<title>Manager</title>

		<!-- Prevent quirks mode: Force using highest IE mode available, force using chrome plugin for IE if installed -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- site information -->
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />

		<style>
*{
	box-sizing:border-box;		
}
.container {
	margin-left: auto;
	margin-right: auto;
	width: 100%;
	padding-left: 50px;
	padding-right: 50px;
	text-align: left;
}
.container:before, .container:after {
	content: "";
	display: table;
	line-height: 0;
}
.container:after {
	clear: both;
}
.row-fluid:before, .row-fluid:after {
	content: "";
	display: table;
	line-height: 0;
}
.row-fluid:after {
	clear: both;
}
.row-fluid {
	margin-left: -6px;
	margin-right: -6px;
}
.row-fluid [class*="colspan-"] {
	display: block;
	float: left;
	width: 100%;
	padding-left: 6px;
	padding-right: 6px;
}
.row-fluid [class*="colspan-"]:first-child {
	margin-left: 0;
}
.row-fluid .colspan-1 {
	width: 8.3333333333333%;
}
.row-fluid .colspan-2 {
	width: 16.666666666667%;
}
.row-fluid .colspan-3 {
	width: 25%;
}
.row-fluid .colspan-4 {
	width: 33.333333333333%;
}
.row-fluid .colspan-5 {
	width: 41.666666666667%;
}
.row-fluid .colspan-6 {
	width: 50%;
}
.row-fluid .colspan-7 {
	width: 58.333333333333%;
}
.row-fluid .colspan-8 {
	width: 66.666666666667%;
}
.row-fluid .colspan-9 {
	width: 75%;
}
.row-fluid .colspan-10 {
	width: 83.333333333333%;
}
.row-fluid .colspan-11 {
	width: 91.666666666667%;
}
.row-fluid .colspan-12 {
	width: 100%;
}
		</style>
		<!-- Other CSS assets -->
		<?php foreach(View::assets('css') as $asset): ?>
			<?php echo HTML::style($asset,array('media'=>'screen')); ?>
		<?php endforeach; ?>
	</head>

	<body>
		<div class="container">
			<!-- Content -->
			<?php View::block('content',''); ?>
		</div>
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
			url_bundler:'<?php echo URL::get('base') ?>js.php',
			messages: <?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'true' : 'false'; ?>,
			errors: <?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'true' : 'false'; ?>,
			console: <?php echo Kohana::$environment == Kohana::DEVELOPMENT ? 'true' : 'false'; ?>
		});
		</script>
		
	</body>
</html>
