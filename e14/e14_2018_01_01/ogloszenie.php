<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Portal ogłoszeniowy</title>
    <link rel="stylesheet" href="styl1.css">
</head>
<body>
    <section id="baner"><h1>Portal Ogłoszeniowy</h1></section>
    <section id="p_lewy">
        <h2>Kategorie ogłoszeń</h2>
        <ol>
            <li>Książki</li>
            <li>Muzyka</li>
            <li>Filmy</li>
        </ol>
        <img src="ksiazki.jpg" alt="Kupię / sprzedam książkę">
        <table>
            <th>Liczba ogłoszeń</th>
            <th>Cena ogłoszenia</th>
            <th>Bonus</th>
            <tr>
                <td>1-10</td>
                <td>1 PLN</td>
                <td rowspan="3">Subskrypcja newslettera <br> to upust 0,20 PLN na <br> ogłoszenie</td>
            </tr>
            <tr>
                <td>11-50</td>
                <td>0,80 PLN</td>
            </tr>
            <tr>
                <td>51 i więcej</td>
                <td>0,60 PLN</td>
            </tr>
        </table>
    </section>
    <section id="p_prawy">
        <h2>Ogłoszenie kategorii książki</h2>
        <?php
            $conn = mysqli_connect("localhost","root","","ogloszenia");

            $wynik_zapytanie1 = mysqli_query($conn, "SELECT og.id, og.tytul, og.tresc from ogloszenie as og where og.kategoria = 1;");

            while ($row = mysqli_fetch_array($wynik_zapytanie1)) {
                $wynik_zapytanie2 = mysqli_fetch_array(mysqli_query($conn, "SELECT uz.telefon from uzytkownik as uz JOIN ogloszenie as og ON uz.id = og.uzytkownik_id where og.id = ".$row[0].";"));
                echo("<h3>".$row[0]." ".$row[1]."</h3>");
                echo("<p>".$row[2]."</p>");
                echo("<p>"."telefon kontaktowy: ".$wynik_zapytanie2[0]."</p>");
            };

            mysqli_close($conn);
        ?>
    </section>
    <section id="stopka">Portal ogłoszeniowy opracował: LostyGuy</section>
</body>
</html>