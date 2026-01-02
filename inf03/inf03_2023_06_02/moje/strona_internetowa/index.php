<?php $conn = mysqli_connect("localhost", "root", "", "sklep"); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Hurtownia szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <section class="baner"><h1>Hurtownia z najlepszymi cenami</h1></section>

    <section class="g_l">
        <br>
        <h2>Nasze ceny</h2>
        <br>
        <table>
            <!-- Skrypt 1 -->
            <!-- 2x4 -->
             <?php
                $raw_sql1 = "SELECT t.nazwa, t.cena FROM towary AS t LIMIT 4;";
                $sql_result_1 = mysqli_query($conn, $raw_sql1);
                while ($array = mysqli_fetch_array($sql_result_1)) {
                    echo "<tr> <td>$array[0]</td> <td>$array[1]</td> </tr>";
                }
             ?>
        </table>
    </section>
    <section class="g_s">
        <br>
        <h2>Koszt zakupów</h2>
        <br>
        <form action="index.php" method="post">
            wybierz artkuł: <Select name="select">
                <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
                <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
                <option value="Cyrkiel">Cyrkiel</option>
                <option value="Linijka 30 cm">Linijka 30 cm</option>
            </Select>
                <br>
            liczba sztuk: <input type="number" name="num" id="num">
                <br>
            <button type="submit">OBLICZ</button>
                <br>
            <!-- Skrypt 2 -->
            <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $selected_option = $_POST["select"];
                    $chosen_num = $_POST["num"];

                    $raw_sql2 = "SELECT t.cena FROM towary AS t WHERE t.nazwa = '$selected_option'";
                    $sql_result_2 = mysqli_query($conn, $raw_sql2);
                    $array2 = mysqli_fetch_array($sql_result_2);
                    $final_value = $chosen_num * $array2[0];
                    echo "wartość zakupów: $final_value";
                }
            ?>
        </form>
    </section>
    <section class="g_p">
        <br>
        <h2>Kontakt</h2>
        <br>
        <img src="zakupy.png" alt="hurtownia">
            <br><br>
        <p>e-mail: 
            <a href="mailto:hurt@poczta2.pl">hurt@poczta2.pl</a>
        </p>
    </section>

    <section class="stopka"><h4>Witrynę wykonał: LostyGuy</h4></section>
    
<?php mysqli_close($conn); ?>
</body>
</html>