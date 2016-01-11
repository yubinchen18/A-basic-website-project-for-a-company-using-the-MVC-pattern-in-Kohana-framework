<?php
return Text::extend('default/user',array(
	'option'=>array(
		'roles'=>array(
			'user'=>'gebruiker: geen CMS rechten',
			'member'=>'deelnemer: alleen CMS inlog-rechten',
			'manager'=>'website-beheerder: rechten voor beheer website',
			'staff'=>'hoofdbeheerder: rechten voor beheer van alle websites',
			'admin'=>'administrator: alle websites en gebruikersbeheer',
			'super'=>'super-user',
		)
	)
));

