<?php
switch($code){
	case '404':
		$intro = 'Het opgevraagde item bestaat niet (meer)';
		break;
	case '403':
		$intro = 'Je bent niet gerechtigd om het opgevraagde item te bekijken';
		break;
	case '500':
		$intro = 'Het laden van de pagina is door onbekende reden mislukt';
		break;
	default:
		$intro = 'Het laden van de pagina is door onbekende reden mislukt';

}
?>

<!-- header -->
<div id="main">
	<div id="mainContainer" class="centerBlock ">
		<h2>Er is iets fout gegaan</h2>
		<br />
		<br />
		<?php echo $code ?>
		<?php echo $intro ?>
		<br />
		<br />
		Klik hier <a href="#" onClick="javascript:window.history.back(); return false;">hier</a> om naar de vorige pagina te gaan
	</div>
</div>

