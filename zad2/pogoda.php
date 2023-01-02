<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza pogody Wrocław</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div class = "baner_lewy">
        <img src="logo.png" alt="meteo">

    </div>
    <div class = "baner_srodek">
        <h1>Prognoza dla Wrocławia</h1>
    </div>
    <div class = "baner_prawy">
        <p>maj, 2019</p>
    </div>
    <div class = "empty"></div>
    <div class = "glowny">
        <table>
            <tr>
                <th>Data</th>
                <th>TEMPERATURA W NOCY</th>
                <th>TEMPERATURA W DZIEŃ</th>
                <th>OPADY[mm/h]</th>
                <th>CIŚNIENIE [hPa]</th>
            </tr>
            <?php
                $db = mysqli_connect("localhost", "root", "", "prognoza");
                $kw = "SELECT * FROM pogoda WHERE miasta_id = 1 ORDER BY data_prognozy ASC;";
                $result = mysqli_query($db, $kw);

                while ($row = mysqli_fetch_array($result))
                {
                    printf("<tr>");
                    printf("<td>".$row["data_prognozy"]."</td>");
                    printf("<td>".$row["temperatura_noc"]."</td>");
                    printf("<td>".$row["temperatura_dzien"]."</td>");    
                    printf("<td>".$row["opady"]."</td>");   
                    printf("<td>".$row["cisnienie"]."</td>");                                                                  
                    printf("</tr>");
                }
                mysqli_close($db);
            ?>
        </table>
    </div>
    <div class = "lewy">
        <img src="obraz.jpg" alt="Polska, Wrocław">
    </div>
    <div class = "prawy">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <div class = "stopka">
        <p>Stronę wykonał: Patryk Pośnik</p>
    </div>
</body>
</html>