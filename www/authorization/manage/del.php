<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<?php
    if (isset($_GET['id'])) {
        require_once "connect.php";
        $id = $_GET['id'];
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        $connection->query("DELETE FROM `zawodnicy` WHERE id=$id");
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