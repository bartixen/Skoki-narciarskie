<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<?php 
    $_SESSION['search'] = $_POST['search'];
    if ($_POST['search1']=='') {
        $_SESSION['search1']='=';
    } else {
        $_SESSION['search1'] = $_POST['search1'];
    }
    $_SESSION['data'] = $_POST['data'];
    $_SESSION['first'] = true;
    header('Location: index.php');
?>