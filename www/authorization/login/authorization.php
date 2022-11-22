<?php
	session_start();
	if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {
		$_SESSION['info'] = 'Podane dane do autoryzacji są nieprawidłowe';
		header('Location: index.php');
		exit();
	}
	
	$secret_key = "";
	$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
	$answer = json_decode($check);
		
	if ($answer->success==false) {
		$status=false;
		$_SESSION['info']="Wystąpił problem podczas autoryzacji (recaptcha)";
		header('Location: index.php');
	} else {
		require_once "connect.php";
		$connection = @new mysqli($host, $db_user, $db_password, $db_name);
		$connection->query("SET NAMES 'utf8'");
		if ($connection->connect_errno!=0) {
			echo "Internal error: ".$connection->connect_errno;
		} else {
			$connection->query("SET NAMES 'utf8'");
			$login = $_POST['login'];
			$password = $_POST['password'];
			if ($result = @$connection->query( 
			sprintf("SELECT * FROM authentication WHERE user='%s' ",
			mysqli_real_escape_string($connection,$login)))) {
				$results = $result->fetch_assoc();
				$hash = $results["password"];
				$name = $results["user"];
				if (password_verify($password, $hash)) {
					$_SESSION['authorization'] = true;
					unset($_SESSION['info']);
					$results = $result->fetch_assoc();
					$ip = $_SERVER['REMOTE_ADDR'];
					$ip = substr($ip, 0, -5);
					$ip = ''. $ip.'*****';
					$date = ''. date("Y-m-d") .' '. date("H:i:sa") .'';
					$connection->query("INSERT INTO last_logins (id, user, date, ip) VALUES (NULL, '$login', '$date', '$ip');");
					$_SESSION['name'] = $name;
					header('Location: ../');
				} else {
					$_SESSION['info'] = 'Podane dane do autoryzacji są nieprawidłowe';
					header('Location: index.php');
				}
			}
			$connection->close();
		}
	}
?>