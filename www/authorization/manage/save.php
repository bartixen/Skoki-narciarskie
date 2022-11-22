<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<?php
    if (isset($_SESSION['id'])) {
        require_once "connect.php";

        $id = $_SESSION['id'];
        $nazwisko = $_POST['nazwisko'];
        $imie = $_POST['imie'];
        $narodowosc = $_POST['narodowosc'];
        $ilosc_wystapien = $_POST['ilosc_wystapien'];
        $wynik = $_POST['wynik'];
        $wiek = $_POST['wiek'];
        $wzrost = $_POST['wzrost'];
        $nazwisko_trenera = $_POST['nazwisko_trenera'];
        $uwagi = $_POST['uwagi'];

        session_unset('id');
        session_unset('nazwisko');
        session_unset('imie');
        session_unset('narodowosc');
        session_unset('ilosc_wystapien');
        session_unset('wynik');
        session_unset('wiek');
        session_unset('wzrost');
        session_unset('nazwisko_trenera');
        session_unset('uwagi');

        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        $connection->query("UPDATE `zawodnicy` SET `nazwisko` = '$nazwisko', `imie` = '$imie', `narodowosc` = '$narodowosc', `ilosc_wystapien` = '$ilosc_wystapien', `wynik` = '$wynik', `wiek` = '$wiek', `wzrost` = '$wzrost', `nazwisko_trenera` = '$nazwisko_trenera', `uwagi` = '$uwagi' WHERE `zawodnicy`.`id` = '$id'");
        $connection->close();
        
        $_SESSION['info'] = 'Zapisano pomyślnie!';

        if ($_SESSION['from']=='search') {
            header('Location: ../search/index.php');
            session_unset('from');
        } else {
            header('Location: index.php');
        }
	} else {
        if ($_SESSION['from']=='search') {
            header('Location: ../search/index.php');
            session_unset('from');
        } else {
            header('Location: index.php');
        }
		exit();
    }
?>