<?

	session_start();

	if(isset($_POST['submit'])){
		include 'dbh.inc.php';

		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
		$errors = array();

		if(empty($uid)){
			array_push($errors, 'Введите логин!');
		} elseif(empty($pwd)){
			array_push($errors, 'Введите пароль!');
		}

		if(count($errors) == 0){
			$pwd = md5($pwd);
			$query = "SELECT * FROM users WHERE user_uid='$uid' AND user_pwd='$pwd'";
			$results = mysqli_query($conn, $query);
			if(mysqli_num_rows($results) == 1){
				$_SESSION['user_uid'] = $uid;
				$_SESSION['success'] = "You are logged in";
				header("Location: ../index.php");
				exit();
			} else {
				array_push($errors, 'Неправильный логин или пароль!');
				$_SESSION['errors'] = $errors;
				header("Location: ../login.php");
				exit();
			}
		}
	}	
?>