<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<?php
    if (isset($_POST['nazwisko'])) {

        $id_authorization = $_SESSION['id_authorization'];
        $nazwisko = $_POST['nazwisko'];
        $imie = $_POST['imie'];
        $narodowosc = $_POST['narodowosc'];
        $ilosc = $_POST['ilosc_wystapien'];
        $wynik = $_POST['wynik'];
        $wiek = $_POST['wiek'];
        $wzrost = $_POST['wzrost'];
        $trener = $_POST['nazwisko_trenera'];
        $uwagi = $_POST['uwagi'];

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query("SET NAMES 'utf8'");
            if ($connection->connect_errno!=0) {
                throw new Exception(mysqli_connect_errno());
            } else { 
                if ($connection->query("INSERT INTO zawodnicy (id, nazwisko, imie, narodowosc, ilosc_wystapien, wynik, wiek, wzrost, nazwisko_trenera, uwagi) VALUES (NULL, '$nazwisko', '$imie', '$narodowosc', '$ilosc', '$wynik', '$wiek', '$wzrost', '$trener', '$uwagi')")) {
                    $_SESSION['info'] = 'Dodano poprawnie!';
                    $date = ''. date("Y-m-d") .' '. date("H:i:sa") .'';
                    $connection->query("INSERT INTO status (id, id_authorization, user, date, ip, info) VALUES (NULL, '" . $_SESSION['id_authorization'] . "', '" . $_SESSION['name'] . "', '$date', '" . $_SESSION['ip'] . "', 'Użytkownik dodał nowego zawodnika');");
                    header('Location: index.php');
                }
                else {
                    throw new Exception($connection->error);
                }
                $connection->close();
            }
        } catch(Exception $e) {
            echo 'Internal error: '.$e;
        }
    }
?> 