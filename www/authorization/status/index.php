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
    <title>Zalogowano - Status</title>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="shortcut icon" href="../../assets/icon.ico">
</head>
<body>
    <header>
        <a href="../"><button type="button" style="float: right">Powrót</button></a>
        <h1>STATUS</h1>
    </header>
    <section id="list">
        <h2>Ostanie wydarzenia</h2>
        <?php include 'list.php';?></br>
        <a href="del.php"><button>Wyczyść</button></a>
        <?php
            if($_SESSION['full']==true) {
                $_SESSION['full'] = false;
            } else {
                echo '<a href="full.php"><button>Załaduj pełną liste</button></a>';
            }
        ?>
    </section>
    <footer>
        <p>© Bartixen</p>
    </footer>
    <script src="../../assets/script.js"></script>
</body>
</html>