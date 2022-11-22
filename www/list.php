<?php
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = new mysqli($host, $db_user, $db_password, $db_name);
        $connection->query("SET NAMES 'utf8'");
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else { 
            $sql = "SELECT * FROM zawodnicy ORDER BY `zawodnicy`.`wynik` DESC LIMIT 5";
            $result = $connection->query($sql);
            if ($result->num_rows > 0) {
                echo "<table><tr><th>Nazwisko</th><th>Imię</th><th>Narodowość</th><th>Wynik</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><th>" . $row["nazwisko"]. "</th><th>" . $row["imie"]. "</th><th>" . $row["narodowosc"]. "</th><th>" . $row["wynik"]. "</th></tr>";
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