<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <title>Skoki narciarskie</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="assets/icon.ico">
</head>
<body>
    <header>
        <a href="authorization/"><button>Zaloguj</button></a>
        <h1>SKOKI NARCIARSKIE</h1>
    </header>
    <section id="list">
        <h2>Największe wyniki zawodników (TOP 5)</h2>
        <?php include 'list.php';?></br>
        <a href="search/"><button>Wyszukaj</button></a>
    </section>
    <footer id="footer">
        <p>© Bartixen</p>
    </footer>
    <script src="assets/script.js"></script>
</body>
</html>