<?php $conn=mysqli_connect("localhost","root","","sklep"); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sklep dla uczniów</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section class="baner"><h1>Dzisiejsze promocje naszego sklepu</h1></section>

    <section class="blok" id="lewy">
        <h2>Taniej o 30%</h2>
        <ol>
            <?php
            $sql1 = mysqli_query($conn, "SELECT t.nazwa FROM towary AS t WHERE t.promocja = 1;");
            while ($wynik1 = mysqli_fetch_array($sql1)) {
                echo "<li>$wynik1[0]</li>";
            }
            ?>
        </ol>
    </section>
    <section class="blok" id="srodek">
        <h2>Sprawdź cenę</h2>
        <form action="index.php" method="post">

            <select name="wybrana_opcja" id="wybrana_opcja">
                <option value="Gumka do mazania">Gumka do mazania</option>
                <option value="Cienkopis">Cienkopis</option>
                <option value="Pisaki 60 szt.">Pisaki 60 szt.</option>
                <option value="Markery 4 szt.">Markery 4 szt.</option>
            </select>
            
            <button name='submit'>SPRAWDŹ</button>
        </form>

        <section class="wynik">
            <?php
                if (isset($_POST["submit"])) {
                    $wybrana_opcja = $_POST["wybrana_opcja"];
                    $sql2 = mysqli_query($conn, "SELECT t.cena FROM towary AS t WHERE t.nazwa = '$wybrana_opcja';");
                    $wynik2 = mysqli_fetch_array($sql2);
                    $oblizona_cena = $wynik2[0] * 0.7;

                    echo "cena regularna: $wynik2[0] <br>cena w promocji 30%: $oblizona_cena";
                }
            ?>
        </section>
    </section>
    <section class="blok" id="prawy">
        <h2>Kontakt</h2>
        <p>e-mail:<a href="mailto:bok@sklep.pl">bok@sklep.pl</a></p>
        <img src="promocja.png" alt="promocja">
    </section>

    <section class="stopka"><h4>Autor strony: LostyGuy</h4></section>
<?php mysqli_close($conn);?>
</body>
</html>