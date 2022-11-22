<?php
	session_start();
	if ((isset($_SESSION['authorization']))) {
		header('Location: ../index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <title>Skoki narciarskie - Logowanie</title>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="shortcut icon" href="../../assets/icon.ico">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
</head>
<body>
    <header>
        <a href="../../"><button>Powrót</button></a>
        <h1>LOGOWANIE</h1>
    </header>
    <section id="authorization">
        </br></br></br>
        <form id='demo-form' method="post" action="authorization.php">
            <p>Login:</p>
            <input type="text" name="login" id="login" value="" />
            <p>Hasło:</p>
            <input type="password" name="password" id="password" value="" />
            <button class="g-recaptcha" data-sitekey="6LdbaBYjAAAAAPxbzR8ciGEP7Q9a0qwL1PdmYvrQ" data-callback='onSubmit' data-action='submit'>Zaloguj</button>
        </form></br>
        <?php
            if (isset($_SESSION['info'])) {
                echo '<div type="button" class="pop-up_login" onclick="submit()" id="del">'.$_SESSION['info'].'</div>';
                unset($_SESSION['info']);
            }
        ?>
        </br></br>
    </section>
    <footer>
        <p>© Bartixen</p>
    </footer>
    <script src="../../assets/script.js"></script>
</body>
</html>

