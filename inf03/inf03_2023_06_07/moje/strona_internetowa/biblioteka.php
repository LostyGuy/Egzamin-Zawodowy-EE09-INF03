<?php $conn = mysqli_connect("localhost","root", "", "biblioteka"); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="banner"><br><h1>Biblioteka w Ksiązkowicach Małych</h1><br></section>

    <section class="g_l">
        <br><h4>Dodaj czytelnika</h4><br>
        <form action="biblioteka.php" method="post">
            imię: <input type="text" name="name" id="">
            <br>
            nazwisko: <input type="text" name="surname" id="">
            <br>
            symbol: <input type="number" name="symbol" id="">
            <br>
            <button type="submit">AKCEPTUJ</button>
        </form>
        <!-- Skrypt 1 -->
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo "Dodano czytelnika ".$_POST['name']." ".$_POST['surname'];
                mysqli_query(
                    $conn, 
                    "INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('".$_POST['name']."','".$_POST['surname']."','".$_POST['symbol']."');"
                );
            }
        ?>
    </section>
    <section class="g_s">
        <img src="biblioteka.png" alt="biblioteka">
        <br>
        <h6>ul. Czytelników&nbsp;15; Książkowice&nbsp;Małe</h6>
        <br>
        <p><a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
    </section>
    <section class="g_p">
        <br>
        <h4>Nasi czytelnicy:</h4>
        <br>
        <ol>
            <!-- Skrypt 2 -->
            <?php
                $raw_sql1 = "SELECT cz.imie, cz.nazwisko FROM czytelnicy AS cz ORDER BY cz.nazwisko ASC;";
                $sql = mysqli_query($conn, $raw_sql1);
                while ($result = mysqli_fetch_array($sql)) {
                    echo "<li>".$result[0]." ".$result[1]."</li>";
                }
            ?>
        </ol>
    </section>

    <section class="footer"><br><p>Projekt witryny: LostyGuy</p><br></section>
<?php mysqli_close($conn); ?>
</body>
</html>