<?php

	session_start();

	if(isset($_POST['submit'])){
		include_once 'dbh.inc.php';

		$first = mysqli_real_escape_string($conn, $_POST['first']);
		$last = mysqli_real_escape_string($conn, $_POST['last']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
		$cpwd = mysqli_real_escape_string($conn, $_POST['cpwd']);

		$errors = array();

		//Проверка есть ли в базе уже сущесвтует пользователь с одинаковым email
		if(empty($first)){array_push($errors, 'Введите имя!');}
		if(empty($last)){array_push($errors, 'Введите фамилию!');}
		if(empty($email)){array_push($errors, 'Введите email!');}
		if(empty($uid)){array_push($errors, 'Введите логин!');}
		if(empty($pwd) || empty($cpwd)){array_push($errors, 'Введите пароль!');}
		if($pwd != $cpwd){array_push($errors, 'Пароли не совпадают!');}

		//Проверка есть ли в базе уже сущесвтует пользователь с одинаковым email
		$user_check = "SELECT * FROM users WHERE user_email='$email' LIMIT 1";
		$result = mysqli_query($conn, $user_check);
		$user = mysqli_fetch_assoc($result);

		if($user){
			if($user['user_email'] === $email){
				array_push($errors, 'Пользователь с таким Email уже сущетвует!');
			}
		}


		if(count($errors) == 0){
			$hashedpwd = md5($pwd);

			$query = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedpwd')";
			mysqli_query($conn, $query);
			$_SESSION['user_uid'] = $uid;
			$_SESSION['success'] = "Вы вошли";

			header('Location: ../index.php');
			exit();
		}

		if(count($errors) > 0){
			$_SESSION['errors'] = $errors;
			header('Location: ../reg.php');
		}
	}

?>