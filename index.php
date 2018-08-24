<?php
	session_start();

	if(!isset($_SESSION['user_uid'])){
		$_SESSION['msg'] = "Вы должны сперва залогиниться!";
		header("Location: login.php");
		exit();
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['user_uid']);
		header("Location: login.php");
	}

	include_once 'inc/header.php';
?>


	<div class="container">
		<div class="success">
		<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
		</div>

		<?php if(isset($_SESSION['user_uid'])) : 	?>
			<p>Добро пожаловать <strong><?echo $_SESSION['user_uid']?></strong></p>
		<?php endif ?>

	</div>
	
<?php
	include_once 'inc/footer.php';
?>