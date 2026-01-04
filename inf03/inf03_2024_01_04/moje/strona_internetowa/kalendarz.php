<?php $conn = mysqli_connect("localhost", "root", "", "terminarz"); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <section class="banner" id="left"><img src="logo1.png" alt="lipiec"></section>
    <section class="banner" id="right">
        <h1>TERMINARZ</h1>
        <p>najbliższe zadania: 
            <!-- Skrypt 1 -->
            <?php
                $raw_sql1 = "SELECT DISTINCT z.wpis FROM zadania AS z WHERE z.dataZadania > '2020-07-01' AND z.dataZadania < '2020-07-08' AND z.wpis != '';";
                $sql_query1 = mysqli_query($conn, $raw_sql1);
                while ($result1 = mysqli_fetch_array($sql_query1)) {
                    echo $result1[0]."; ";
                }
            ?>
        </p>
    </section>

    <section class="main">
        <!-- Skrypt 2 -->
        <?php
            $raw_sql2 = "SELECT z.dataZadania, z.wpis FROM zadania AS z WHERE z.dataZadania LIKE '____-07-__';";
            $sql_query2 = mysqli_query($conn, $raw_sql2);
            while ($result2 = mysqli_fetch_array($sql_query2)) {
                echo '<section class="call_block">
                    <h6>'.$result2[0].'</h6>
                    <p>'.$result2[1].'</p>
                </section>';
            }
        ?>
    </section>

    <section class="footer">
        <a href="sierpien.html">Terminarz na sierpień</a>
        <p>Stronę wykonał: LostyGuy</p>
    </section>
<?php mysqli_close($conn); ?>
</body>
</html>