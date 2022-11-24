<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<?php
    require_once "connect.php";
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);
    $connection->query("TRUNCATE `www10735_database`.`status`");
    $date = ''. date("Y-m-d") .' '. date("H:i:sa") .'';
    $connection->query("INSERT INTO status (id, id_authorization, user, date, ip, info) VALUES (NULL, '" . $_SESSION['id_authorization'] . "', '" . $_SESSION['name'] . "', '$date', '" . $_SESSION['ip'] . "', 'Użytkownik wyczyścił logi');");
    $connection->close();
    $_SESSION['info'] = 'Usunięto pomyślnie!';
    header('Location: index.php');
?>