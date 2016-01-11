<?php
return Text::extend('item',array(
	'module'=>array(
		'name'=>'gebruikers',
		'article'=>'de',
		'single'=>'gebruiker',
		'plural'=>'gebruikers',
		'this'=>'deze',
		'that'=>'die',
		'new'=>'nieuwe',
		'description'=>'gebruikersbeheer en rechten'
	),
	'label'=>array(
		'username'=>'gebruikersnaam',
		'password'=>'wachtwoord',
		'password_confirm'=>'wachtwoord nogmaals',
		'email'=>'e-mailadres',
		'email_confirm'=>'nogmaals e-mailadres',
		'assume'=>'log in als gebruiker',
		'block'=>'blokkeren',
		'unblock'=>'toelaten',
		'roles'=>'rollen',
		'send_email'=>'verstuur e-mail met inloggegevens',
	),
	'option'=>array(
		'roles'=>array(
			'user'=>'gebruiker: geen CMS rechten',
			'member'=>'deelnemer: alleen CMS inlog-rechten',
			'manager'=>'website-beheerder: rechten voor beheer website',
			'staff'=>'hoofdbeheerder: rechten voor beheer van alle websites',
			'admin'=>'administrator: alle websites en gebruikersbeheer',
			'super'=>'super-user',
		)
	),
	'error'=>array(
		'credentials'=>'ongeldige inloggegevens',
		'blocked'=>'gebruiker is geblokkeerd',
		'username'=>array(
			'not_empty'=>'vul een gebruikersnaam in',
			'alpha_numeric'=>'alleen letters en cijfers zijn toegestaan',
			'min_length'=>'gebruikersnaam moet minimaal 6 karakters bevatten',
			'max_length'=>'gebruikersnaam mag maximaal 16 karakters bevatten',
			'username_unique'=>'gebruikersnaam bestaat al',
		),
		'email'=>array(
			'not_empty'=>'vul een e-mailadres in',
			'email'=>'vul een geldig e-mailadres in',
			'email_unique'=>'het e-mailadres is al in gebruik',
			'email_exists'=>'het e-mailadres kon niet gevonden worden',
		),
		'email_confirm'=>array('matches'=>'De e-mailadressen komen niet overeen'),
		'password'=>array(
			'not_empty'=>'geef een wachtwoord op',
			'min_length'=>'wachtwoord moet uit minimaal zes karakters bestaan'
		),
		'password_confirm'=>array('matches'=>'De wachtwoorden komen niet overeen'),
	),
	'title'=>array(
		'roles'=>'rollen bewerken'
	),
	'question'=>array(
		'assume'=>'Er wordt een nieuw scherm geopend waarin u als de gebruiker ingelogd bent. Om terug te gaan naar deze beheeromgeving sluit u het nieuwe scherm. Wilt u doorgaan?',
		'block'=>'Wilt u deze gebruiker blokkeren?',
		'unblock'=>'Wilt u deze gebruiker weer toelaten?',
	)
));