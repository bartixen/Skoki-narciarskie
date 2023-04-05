<?php
    session_start();
    require_once "../connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    try {
        $connection = new mysqli($host, $db_user, $db_password, $db_name);
        $connection->query("SET NAMES 'utf8'");
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else { 
            if (!isset($_SESSION['search'])) {
                if ($_SESSION['first']==true) {
                    echo '<div type="button" class="pop-up" onclick="submit()" id="del">Proszę wybrać typ wyszukiwania</div>';
                    $_SESSION['first']=false;
                }
                $sql = "SELECT * FROM zawodnicy ORDER BY `zawodnicy`.`nazwisko` ASC LIMIT 10";
                $result = $connection->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table><tr><th>Nazwisko</th><th>Imię</th><th>Narodowość</th><th>Ilość wystąpień</th><th>Wynik</th><th>Wiek</th><th>Wzrost</th><th>Nazwisko trenera</th><th>Dodatkowe uwagi</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><th>" . $row["nazwisko"]. "</th><th>" . $row["imie"]. "</th><th>" . $row["narodowosc"]. "</th><th>" . $row["ilosc_wystapien"]. "</th><th>" . $row["wynik"]. "</th><th>" . $row["wiek"]. "</th><th>" . $row["wzrost"]. "</th><th>" . $row["nazwisko_trenera"]. "</th><th>" . $row["uwagi"]. "</th></tr>";
                    }
                    echo "</table>";
                } else {
                    echo '<div type="button" class="pop-up">Brak danych</div>';
                }
            } else {
                $sql = "SELECT * FROM zawodnicy WHERE " . $_SESSION['search'] . "" . $_SESSION['search1'] . "'" . $_SESSION['data'] . "'";
                $result = $connection->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table><tr><th>Nazwisko</th><th>Imię</th><th>Narodowość</th><th>Ilość wystąpień</th><th>Wynik</th><th>Wiek</th><th>Wzrost</th><th>Nazwisko trenera</th><th>Dodatkowe uwagi</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><th>" . $row["nazwisko"]. "</th><th>" . $row["imie"]. "</th><th>" . $row["narodowosc"]. "</th><th>" . $row["ilosc_wystapien"]. "</th><th>" . $row["wynik"]. "</th><th>" . $row["wiek"]. "</th><th>" . $row["wzrost"]. "</th><th>" . $row["nazwisko_trenera"]. "</th><th>" . $row["uwagi"]. "</th></tr>";
                    }
                    echo "</table>";
                } else {
                    echo '<div type="button" class="pop-up" onclick="submit()" id="del">Nie znaleziono żadnych zawodników</div>';
                    $sql = "SELECT * FROM zawodnicy ORDER BY `zawodnicy`.`nazwisko` ASC LIMIT 10";
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table><tr><th>Nazwisko</th><th>Imię</th><th>Narodowość</th><th>Ilość wystąpień</th><th>Wynik</th><th>Wiek</th><th>Wzrost</th><th>Nazwisko trenera</th><th>Dodatkowe uwagi</th></tr>";
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><th>" . $row["nazwisko"]. "</th><th>" . $row["imie"]. "</th><th>" . $row["narodowosc"]. "</th><th>" . $row["ilosc_wystapien"]. "</th><th>" . $row["wynik"]. "</th><th>" . $row["wiek"]. "</th><th>" . $row["wzrost"]. "</th><th>" . $row["nazwisko_trenera"]. "</th><th>" . $row["uwagi"]. "</th></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo '<div type="button" class="pop-up">Brak danych</div>';
                    }
                }
            }
            unset($_SESSION['search']);
            unset($_SESSION['search1']);
            unset($_SESSION['data']);
            $connection->close();
        }
    } catch(Exception $e) {
        echo 'Internal error: '.$e;
    }
?>