<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: login/');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <title>Zalogowano - Zarządzanie</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="shortcut icon" href="../assets/icon.ico">
</head>
<body>
    <header>
        <a href="login/logout.php"><button>Wyloguj</button></a>
        <h1>ZARZĄDZANIE</h1>
    </header>
    <section id="manages">
        <a href="search/"><div class="item"><img src="../assets/search.png"><br>Szukaj</div></a>
        <a href="add/"><div class="item"><img src="../assets/add.png"><br>Dodaj</div></a>
        <a href="manage/"><div class="item"><img src="../assets/manage.png"><br>Zarządzaj</div></a>
    </section>
    <footer>
        <p>© Bartosz Krasoń</p>
    </footer>
    <script src="../assets/script.js"></script>
</body>
</html>