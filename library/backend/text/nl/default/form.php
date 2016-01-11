<?php
return Text::extend('item',array(
	'module'=>array(
		'name'=>'formulieren',
		'article'=>'het',
		'single'=>'formulier',
		'plural'=>'formulieren',
		'this'=>'dit',
		'that'=>'data',
		'new'=>'nieuw',
		'description'=>'beheer van formulieren op de website'
	),
	'label'=>array(
		'tab'=>array(
			'elements'=>'velden',
			'emails'=>'e-mails',
			'text'=>'schermtekst'
		),
		'button'=>'tekst op de verstuur knop',
		'element_prefix'=>'veld',
		'email_prefix'=>'email',
		'before'=>'tekst voor het formulier',
		'after'=>'tekst na verzending van het formulier',
		'elements'=>'',
		'rules'=>'regels waaraan de velden moeten voldoen',
		'emails'=>'',
		'label'=>'label bij het veld',
		'comment'=>'extra tekst bij het veld',
		'option'=>'optie',
		'type'=>'type',
		'element'=>'hoort bij element',
		'email'=>'e-mailadres',
		'add_element'=>'veld toevoegen',
		'add_option'=>'optie toevoegen',
		'add_rule'=>'voorwaarde toevoegen',
		'add_email'=>'email toevoegen',
		'error'=>'foutmelding',
		'subject'=>'onderwerp',
		'body'=>'mailtekst',
		'from_email'=>'sturen van e-mailadres',
		'from_name'=>'sturen van naam',
		'to_email'=>'sturen naar emailadres',
		'to_name'=>'sturen naar naam',
		'manual'=>'handmatig emailadres',
		'place_after'=>'dit veld achter het vorige plaatsen'
	),
	
	'option'=>array(
		'element_type'=>array(
			'select'=>'selectieveld',
			'checkbox'=>'aanvinkvakjes',
			'input_small'=>'klein tekstveld',
			'input'=>'normaal tekstveld',
			'textarea'=>'tekstvak met meerdere regels',
			'confirm'=>'bevestigingsvakje',
			'email'=>'e-mailadres',
			'file'=>'file-upload',
		),
		'rule_type'=>array(
			'not_empty'=>'niet leeg',
			'is'=>'gelijk aan',
			'not_is'=>'niet gelijk aan',
			'phone'=>'telefoonnummer',
			'email'=>'geldig e-mailadres',
		),
		'email'=>array(
			'manual'=>'handmatig adres invoeren'
		),
	),
	'message'=>array(
		'email_alert'=>'door een wijziging zijn een of meer e-mailadressen niet correct meer ingesteld'
	),
	'error'=>array(

	)
));