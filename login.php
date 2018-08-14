<?php
	session_start();
	include_once 'inc/header.php';
?>

<div class="container">
	<section id="showcase"><h1>Login into your Account</h1></section>
	<form method="post" action="inc/login.inc.php">
	<?php include("inc/errors.php"); ?>
					<input type="text" name="uid" placeholder="Username/Email" required><br>
					<input type="password" name="pwd" placeholder="Password" required><br>
					<input id="reg" name="submit" type="submit" value="Login">
	</form>

<?php
	include_once 'inc/footer.php';
?>