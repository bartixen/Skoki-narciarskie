<?php
	session_start();
	if (!isset($_SESSION['authorization'])) {
		header('Location: ../login/index.php');
		exit();
	}
?> 
<?php
    require_once "../../connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try {
        $connection = new mysqli($host, $db_user, $db_password, $db_name);
        $connection->query("SET NAMES 'utf8'");
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else { 
            if ($_SESSION['full']==true) {
                $count = '';
            } else {
                $count = 'DESC LIMIT 10';
            }
            $sql = "SELECT * FROM status ORDER BY `status`.`id` " . $count . "";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                echo '<table style="max-width: 1050px"><tr><th>ID</th><th>Użytkownik</th><th>Data</th><th>Adres IP</th><th>Opis</th></tr>';
                while($row = $result->fetch_assoc()) {
                    echo "<tr><th>" . $row["id_authorization"]. "</th><th>" . $row["user"]. "</th><th>" . $row["date"]. "</th><th>" . $row["ip"]. "</th><th>" . $row["info"]. "</th></tr>";
                }
                echo "</table>";
            } else {
                echo '<div type="button" class="pop-up">Brak danych</div>';
            }
            $connection->close();
        }
    } catch(Exception $e) {
        echo 'Internal error: '.$e;
    }
?> 