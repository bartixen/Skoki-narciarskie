<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <title>Zalogowano - Zarządzaj zawodnikami</title>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="shortcut icon" href="../../assets/icon.ico">
</head>
<body>
    <header>
        <a href="../"><button>Powrót</button></a>
        <h1>ZARZĄDZAJ ZAWODNIKAMI</h1>
    </header>
    <section id="manage">
        </br></br>
        <?php include 'list.php';?></br></br>
    </section>
    <footer>
        <p>© Bartixen</p>
    </footer>
    <script src="../../assets/script.js"></script>
</body>
</html>