<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<!DOCTYPE html>
<html lang="pl_PL"><head>
    <meta charset="UTF-8">
    <title>Zalogowano - Dodaj zawodnika</title>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="shortcut icon" href="../../assets/icon.ico">
</head>
<body>
    <header>
        <a href="../"><button type="button" style="float: right">Powrót</button></a>
        <h1>DODAJ ZAWODNIKA</h1>
    </header>
    <section id="authorization">
        </br><?php
            if (isset($_SESSION['info'])) {
                echo '<div type="button" class="pop-up_login" onclick="submit()" id="del">'.$_SESSION['info'].'</div>';
                unset($_SESSION['info']);
            }
        ?>
        </br>
        <form id='demo-form' method="post" action="add.php">
            <p>Nazwisko:</p>
            <input type="text" name="nazwisko" id="nazwisko" />
            <p>Imię:</p>
            <input type="text" name="imie" id="imie"/>
            <p>Narodowość:</p>
            <input type="text" name="narodowosc" id="narodowosc"/>
            <p>Ilość wystąpień:</p>
            <input type="text" name="ilosc_wystapien" id="ilosc_wystapien"/>
            <p>Wynik:</p>
            <input type="text" name="wynik" id="wynik"/>
            <p>Wiek:</p>
            <input type="text" name="wiek" id="wiek"/>
            <p>Wzrost:</p>
            <input type="text" name="wzrost" id="wzrost"/>
            <p>Nazwisko trenera:</p>
            <input type="text" name="nazwisko_trenera" id="nazwisko_trenera"/>
            <p>Dodatkowe uwagi:</p>
            <textarea name="uwagi" id="uwagi" rows="4" cols="50"></textarea>
            <button type="submit">Dodaj zawodnika</button><br>
        </form></br></br>
    </section>
    <footer>
        <p>© Bartixen</p>
    </footer>
    <script src="../../assets/script.js"></script>
</body>
</html>