<?php 
$identity = Identity::instance();

//set error messages
if ($message == 'nameError') {
	$message = 'Voer uw inlog gegevens in';
} elseif ($message == 'false') {
	$message = 'Onjuiste naam of wachtwoord';
}
?>
<?php if (!$identity->authenticated()): ?>
	<form method="post">
		Inlognaam:<br>
		<input type="text" name="username">
		<br>
		Wachtwoord:
		<br>
		<input type="password" name="password">
		<?php echo '<br>'.($message) ?>
		<br><br>
		
		<input type="submit" name="login" value="Login">
	</form>
<?php else: ?>
	<form method="post">
		U bent ingelogd als: 
		<br>
		<?php echo $identity->username ?>
		<br><br>
		<input type="submit" name="login" value="Logout">
	</form>
<?php endif ?>