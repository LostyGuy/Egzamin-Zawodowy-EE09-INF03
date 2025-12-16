<?php
    $conn = mysqli_connect("localhost","root","","biuro");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wycieczka po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <section class="baner"><h1>BIURO TURYSTYCZNE</h1></section>

    <section class="dane">
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <?php
                $sql = 'SELECT w.id, w.dataWyjazdu, w.cel, w.cena FROM wycieczki as w WHERE w.dostepna = "1";';

                $res = mysqli_query($conn, $sql);

                while ($echo = mysqli_fetch_array($res)) {
                    echo "<li>$echo[0]. dnia $echo[1] jedziemy do $echo[2], cena $echo[3]</li>";
                }
            ?>
        </ul>
    </section>

    <section class="lewy">
        <h2>Bestselery</h2>
        <table>
            <tr>
                <td>Wenecja</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>Londyn</td>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>Rzym</td>
                <td>wrzesień</td>
            </tr>

        </table>
    </section>
    <section class="srodek">
        <h2>Nasze zdjęcia</h2>
        <?php
            $sql = 'SELECT z.nazwaPliku, z.podpis FROM zdjecia as z ORDER BY z.podpis DESC;';
            $res = mysqli_query($conn, $sql);

            while ($echo = mysqli_fetch_array($res)) {
                    echo "<img src='zad4/$echo[0]' alt='$echo[1]'></img>";
                }
        ?>
    </section>
    <section class="prawy">
        <h2>Skontaktuj się</h2>
        <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </section>

    <section class="stopka"><p>Stronę wykonał: LostyGuy</p></section>
    <?php
        mysqli_close($conn);
    ?>
</body>
</html>