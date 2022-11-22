<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<?php
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    $id = $_GET['id'];
    if ($id!=0) {
        try {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            $connection->query("SET NAMES 'utf8'");
            if ($connection->connect_errno!=0) {
                throw new Exception(mysqli_connect_errno());
            } else { 
                $sql = "SELECT * FROM zawodnicy WHERE id='$id'";
                $result = $connection->query($sql);
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['from'] = $_GET['from'];
                $_SESSION['nazwisko'] = $row['nazwisko'];
                $_SESSION['imie'] = $row['imie'];
                $_SESSION['narodowosc'] = $row['narodowosc'];
                $_SESSION['ilosc_wystapien'] = $row['ilosc_wystapien'];
                $_SESSION['wynik'] = $row['wynik'];
                $_SESSION['wiek'] = $row['wiek'];
                $_SESSION['wzrost'] = $row['wzrost'];
                $_SESSION['nazwisko_trenera'] = $row['nazwisko_trenera'];
                $_SESSION['uwagi'] = $row['uwagi'];
                $connection->close();
            }
        } catch(Exception $e) {
            echo 'Internal error: '.$e;
        }
    } else {
        header('Location: index.php');
        exit();
    }
?> 
<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <title>Zalogowano - Edytuj (ID:<?php echo $_SESSION['id'];?>)</title>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="shortcut icon" href="../../assets/icon.ico">
</head>
<body>
    <header>
        <a href="<?php if ($_SESSION['from']=="search") { echo '../search/index.php'; session_unset('from'); } else { echo 'index.php'; session_unset('from'); } ?>"><button>Powrót</button></a>
        <h1>EDYTUJ ZAWODNIKA</h1>
    </header>
    <section id="authorization">
        </br>
        <form id='demo-form' method="post" action="save.php">
            <p>Nazwisko:</p>
            <input type="text" name="nazwisko" id="nazwisko" value="<?php echo ''.$_SESSION['nazwisko'].'' ?>" />
            <p>Imię:</p>
            <input type="text" name="imie" id="imie" value="<?php echo ''.$_SESSION['imie'].'' ?>" />
            <p>Narodowość:</p>
            <input type="text" name="narodowosc" id="narodowosc" value="<?php echo ''.$_SESSION['narodowosc'].'' ?>" />
            <p>Ilość wystąpień:</p>
            <input type="text" name="ilosc_wystapien" id="ilosc_wystapien" value="<?php echo ''.$_SESSION['ilosc_wystapien'].'' ?>" />
            <p>Wynik:</p>
            <input type="text" name="wynik" id="wynik" value="<?php echo ''.$_SESSION['wynik'].'' ?>" />
            <p>Wiek:</p>
            <input type="text" name="wiek" id="wiek" value="<?php echo ''.$_SESSION['wiek'].'' ?>" />
            <p>Wzrost:</p>
            <input type="text" name="wzrost" id="wzrost" value="<?php echo ''.$_SESSION['wzrost'].'' ?>" />
            <p>Nazwisko trenera:</p>
            <input type="text" name="nazwisko_trenera" id="nazwisko_trenera" value="<?php echo ''.$_SESSION['nazwisko_trenera'].'' ?>" />
            <p>Dodatkowe uwagi:</p>
            <textarea name="uwagi" id="uwagi" rows="4" cols="50"><?php echo ''.$_SESSION['uwagi'].'' ?></textarea>
            <button type="submit">Zapisz</button>
            <a href="del.php?id=<?php echo $_SESSION['id'];?>&from=<?php echo $_SESSION['from'];?>"><button type="button" style="float: right">Usuń</button></a>
        </form>
        </br></br>
    </section>
    <footer>
        <p>© Bartixen</p>
    </footer>
    <script src="../../assets/script.js"></script>
</body>
</html>