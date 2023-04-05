<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<?php
    $id_authorization = $_SESSION['authorization'];
    require_once "../../connect.php";
		$connection = @new mysqli($host, $db_user, $db_password, $db_name);
		$connection->query("SET NAMES 'utf8'");
		if ($connection->connect_errno!=0) {
			echo "Internal error: ".$connection->connect_errno;
		} else {
			$date = ''. date("Y-m-d") .' '. date("H:i:sa") .'';
			$connection->query("INSERT INTO status (id, id_authorization, user, date, ip, info) VALUES (NULL, '" . $_SESSION['id_authorization'] . "', '" . $_SESSION['name'] . "', '$date', '" . $_SESSION['ip'] . "', 'Cofniecie autoryzacji dla użytkownika');");
			$connection->close();
		}
    session_unset();
    header('Location: index.php');
?>