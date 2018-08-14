<?php
	session_start();
	include_once 'inc/header.php';
?>

<div class="container">
	<section id="showcase"><h1>Create your Account</h1></section>
	<form method="post" action="inc/signup.inc.php">
		<? include('inc/errors.php'); ?>
		<input type="text" name="first" placeholder="First name*" required><br>
		<input type="text" name="last" placeholder="Last name*" required><br>
		<input type="email" name="email" placeholder="Email Adress*" required><br>
		<input type="text" name="uid" placeholder="Username*" required><br>
		<input type="password" name="pwd" placeholder="Password*" required><br>
		<input type="password" name="cpwd" placeholder="Confirm Password*" required><br>
		<input id="reg" type="submit" name="submit" value="Register" >
	</form>
</div>
<?php
	include_once 'inc/footer.php';
?>