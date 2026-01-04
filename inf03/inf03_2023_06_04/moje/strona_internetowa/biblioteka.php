<?php $conn=mysqli_connect("localhost","root", "", "biblioteka"); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka Publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="header"><br><h1>Biblioteka w Książkowicach Wielkich</h1><br></section>

    <section class="g_l">
        <br>
        <h3>Polecam dzieła autorów:</h3>
        <br>
        <ol>
            <!-- Skrypt 1 -->
            <?php
                $sql1 = mysqli_query($conn, "SELECT at.imie, at.nazwisko FROM autorzy AS at ORDER BY at.nazwisko ASC;");
                while ($result1 = mysqli_fetch_array($sql1)) {
                    echo "<li>$result1[0] $result1[1]</li>";
                }
            ?>
        </ol>
    </section>
    <section class="g_s">
        <br>
        <h3>ul. Czytelnika 25, Książkowice&nbsp;Wielkie</h3>
        <br>
        <!-- white-space: nowrap; -->
        <p><a href="mailto:sekretariat@biblioteka.pl">Napisz do nas</a></p>
        <br>
        <img src="biblioteka.png" alt="książki">
    </section>
    <section class="g_p" id="g_p_upper">
        <br>
        <h3>Dodaj czytelnika</h3>
        <br>
        <form action="biblioteka.php" method="post">
            imię: <input type="text" name="name">
            <br>
            nazwisko: <input type="text" name="surname">
            <br>
            symbol: <input type="number" name="code">
            <br>
            <button type="submit">DODAJ</button>
        </form>
    </section>
    <section class="g_p" id="g_p_lower">
        <!-- Skrypt 2 -->
        <?php 
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                echo "Czytelnik ". $_POST['name'] ." ". $_POST['surname'] . " został(a) dodany do bazy danych";
                $raw_sql2 = "INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('" .$_POST['name']. "','" .$_POST['surname']. "','" .$_POST['code']. "');";
            }
        ?>
    </section>

    <section class="footer"><br><p>Projekt strony: LostyGuy</p><br></section>
<?php mysqli_close($conn); ?>
</body>
</html>