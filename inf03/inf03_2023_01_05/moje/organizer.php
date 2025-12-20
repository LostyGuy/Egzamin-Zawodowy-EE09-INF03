<?php
    $conn = mysqli_connect("localhost","root","","kalendarz");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <section class="baner" id="lewy"><h1>Organizer: SIERPIEŃ</h1></section>
    <section class="baner" id="srodek">
        <form action="organizer.php" method="post">
            Zapisz wydarzenie: <input type="text" name="wpis">

            <button name="submit">OK</button>
        </form>
        <?php
            if (isset($_POST["submit"])) {
                $wpis = $_POST["wpis"];
                $sql1 = "UPDATE zadania AS z SET z.wpis = '$wpis' WHERE z.dataZadania = '2020-08-09';";
                mysqli_query($conn, $sql1);
            }
        ?>
    </section>
    <section class="baner" id="prawy"><img src="logo2.png" alt="sierpień"></section>

    <section class="glowny">
        <?php
            $sql2 = 'SELECT z.dataZadania, z.wpis FROM zadania as z WHERE z.miesiac = "sierpien";';
            $zapytanie = mysqli_query($conn, $sql2);

            while ($wynik2 = mysqli_fetch_array($zapytanie)) {
                echo "<section class='blok_kalendarza'>
                        <h5>$wynik2[0]</h5>
                        <p>$wynik2[1]</p> 
                    </section>";
            }
        ?>
    </section>

    <section class="stopka"><p>Stronę wykonał: LostyGuy</p></section>

<?php
    mysqli_close($conn);
?>
</body>
</html>