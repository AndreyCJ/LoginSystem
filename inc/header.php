<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="bg">
		<header>
				<div id="logo"><a href="index.php"><h1>Anchous</h1></a></div>
				<div class="spacer"></div>
				<?php	if(isset($_SESSION['user_uid'])) : 	?>
					<p><a href="index.php?logout='1'" style="color:red;">Logot</a></p>
				<?php else : ?>
					<a href="reg.php"><input type="submit" value="Sign up"></a>
					<a href="login.php"><input type="submit" value="Sign in"></a>
				<?php endif ?>
		</header>
	</div>