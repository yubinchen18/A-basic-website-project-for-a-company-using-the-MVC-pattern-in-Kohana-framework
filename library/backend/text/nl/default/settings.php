<?php
return Text::extend('single',array(
	'module'=>array(
		'name'=>'instellingen',
		'article'=>'de',
		'single'=>'instelling',
		'plural'=>'instellingen',
		'this'=>'deze',
		'that'=>'die',
		'new'=>'nieuwe',
		'description'=>'instellingen van de gebruiker'
	),
	'label'=>array(
		'email'=>'e-mailadres',
		'password'=>'nieuw wachtwoord',
		'password_confirm'=>'wachtwoord nogmaals',
		'language'=>'taal CMS',
	),
	'option'=>array(
		'language'=>array(
			'nl'=>'nederlands',
			'en'=>'engels',
		)
	),
	'error'=>array(
		'email'=>array(
			'not_empty'=>'Vul een e-mailadres in',
			'email'=>'Vul een geldig e-mailadres in',
			'email_unique'=>'Het e-mailadres is al in gebruik',
		),
		'password'=>array('min_length'=>'wachtwoord moet uit minimaal zes karakters bestaan'),
		'password_confirm'=>array('matches'=>'De wachtwoorden komen niet overeen'),
	)
));