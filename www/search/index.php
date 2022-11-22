<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <title>Skoki narciarskie - Wyszukaj</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="shortcut icon" href="../assets/icon.ico">
</head>
<body>
    <header>
        <a href="../"><button>Powrót</button></a>
        <h1>WYSZUKAJ ZAWODNIKA</h1>
    </header>
    <section id="search">
        <form method="post" action="work.php">
            <p><b>Wybierz wyszukiwanie</b></p>
            <div class="selection">
                <input onclick="show_search()" type="radio" id="wynik" name="search" value="wynik"><label for="wynik">Wynik</label><input onclick="hide_search()" type="radio" id="nazwisko" name="search" value="nazwisko"><label for="nazwisko">Nazwisko</label><input onclick="hide_search()" type="radio" id="imie" name="search" value="imie"><label for="imie">Imię</label><input onclick="hide_search()" type="radio" id="narodowosc" name="search" value="narodowosc"><label for="narodowosc">Narodowość</label><input onclick="show_search()" type="radio" id="wiek" name="search" value="wiek"><label for="wiek">Wiek</label><input onclick="hide_search()" type="radio" id="nazwisko_trenera" name="search" value="nazwisko_trenera"><label for="nazwisko_trenera">Nazwisko trenera</label><input onclick="show_search()" type="radio" id="ilosc_wystapien" name="search" value="ilosc_wystapien"><label for="ilosc_wystapien">Ilość wystąpień</label>
            </div>
            <div id="selection_more">
                <div class="selection">
                    <input type="radio" id="wiekszy" name="search1" value=">"><label for="wiekszy">Większy od</label><input type="radio" id="mniejszy" name="search1" value="<"><label for="mniejszy">Mniejszy od</label><input type="radio" id="rowna" name="search1" value="="><label for="rowna">Równa się</label>
                </div>
            </div>
            <textarea placeholder="Wpisz frazę" name="data" id="data" cols="20" rows="2"></textarea>
            <button data-action='submit'>Wyszukaj</button>
        </form>
        <?php include 'search.php';?></br>
    </section>
    <footer id="footer">
        <p>© Bartixen</p>
    </footer>
    <script src="../assets/script.js"></script>
</body>
</html>