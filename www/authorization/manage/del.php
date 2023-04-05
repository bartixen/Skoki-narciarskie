<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<?php
    if (isset($_GET['id'])) {
        require_once "../../connect.php";
        $id = $_GET['id'];
        $id_authorization = $_SESSION['id_authorization'];
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        $connection->query("DELETE FROM `zawodnicy` WHERE id=$id");
        $date = ''. date("Y-m-d") .' '. date("H:i:sa") .'';
        $connection->query("INSERT INTO status (id, id_authorization, user, date, ip, info) VALUES (NULL, '" . $_SESSION['id_authorization'] . "', '" . $_SESSION['name'] . "', '$date', '" . $_SESSION['ip'] . "', 'Użytkownik usunął zawodnika');");
        $connection->close();
        $_SESSION['info'] = 'Usunięto pomyślnie!';
        if ($_GET['from']=='search') {
            header('Location: ../search/index.php');
            session_unset('from');
        } else {
            header('Location: index.php');
            session_unset('from');
        }
	} else {
        header('Location: index.php');
        exit();
    }
?>