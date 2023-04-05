<?php
	session_start();
	if ((!isset($_POST['login'])) || (!isset($_POST['password']))) {
		$_SESSION['info'] = 'Podane dane do autoryzacji są nieprawidłowe';
		header('Location: index.php');
		exit();
	}
	
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*';
	$charactersLength = strlen($characters);
	for ($i = 0; $i < 6; $i++) {
		$_SESSION['id_authorization'] .= $characters[rand(0, $charactersLength - 1)];
	}

    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    	$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    	$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    }
    else {
        $ip = $remote;
    }
	$ip = substr($ip, 0, -5);
	$ip = ''. $ip.'*****';
	$_SESSION['ip'] = $ip;
	
	//$secret_key = "";
	//$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
	//$answer = json_decode($check);

	//if ($answer->success==false) {
	//	$status=false;
	//	$_SESSION['info']="Wystąpił problem podczas autoryzacji (recaptcha)";
	//	header('Location: index.php');
	//} else {
		require_once "../../connect.php";
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
				$date = ''. date("Y-m-d") .' '. date("H:i:sa") .'';
				$_SESSION['name'] = $name;
				if (password_verify($password, $hash)) {
					$_SESSION['authorization'] = true;
					unset($_SESSION['info']);
					$connection->query("INSERT INTO status (id, id_authorization, user, date, ip, info) VALUES (NULL, '" . $_SESSION['id_authorization'] . "', '" . $_SESSION['name'] . "', '$date', '" . $_SESSION['ip'] . "', 'Pomyślna autoryzacja użytkownika');");
					header('Location: ../');
				} else {
					$connection->query("INSERT INTO status (id, id_authorization, user, date, ip, info) VALUES (NULL, '" . $_SESSION['id_authorization'] . "', '" . $_SESSION['name'] . "', '$date', '" . $_SESSION['ip'] . "', 'Niepoprawne dane przy autoryzacji');");
					session_unset();
					$_SESSION['info'] = 'Podane dane do autoryzacji są nieprawidłowe';
					header('Location: index.php');
				}
			}
			$connection->close();
		}
	//}
?>