<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div class = "b_lewy">
        <h2>Nasze osiedle</h2>
    </div>
    <div class = "b_prawy">
        <?php 
            $db = mysqli_connect("localhost", "root", "", "portal");
            $kw1 = "SELECT COUNT(*) FROM dane;";
            $result = mysqli_query($db, $kw1);
            $better_result = "Liczba użytkowników portalu:&nbsp;";
            
            while ($row = mysqli_fetch_assoc($result)) {
                printf("<h5>$better_result{$row['COUNT(*)']}</h5>");
            }
        ?>
    </div>
    <div class = "pomiedzy"></div>
    <div class = "lewy">
        <h3>Logowanie</h3>
        <form action="uzytkownicy.php" method="post">
            <label>login</label><br>
            <input type="text" name = "login"><br>
            <label>hasło</label><br>
            <input type="password" name="haslo"><br>
            <button type="submit">Zaloguj</button>
        </form>
    </div>
    <div class = "prawy"> 
        <h3>Wizytówka</h3>
        <div class = "wizyt">
        <?php
            if (!empty($_POST['login']) && !empty($_POST['haslo'])) {
                $login = $_POST['login'];
                $haslo = $_POST['haslo'];
                
                $kw2 = "SELECT haslo FROM uzytkownicy WHERE login = \"{$login}\"";
                $result = mysqli_query($db, $kw2);

                if (mysqli_num_rows($result) == 0) {
                    printf("Login nie istnieje");
                } else {
                    $haslo = sha1($haslo);
                    if (mysqli_num_rows($result) == 1) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($haslo == $row['haslo']) {

                                $kw3 = "SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM uzytkownicy, dane WHERE uzytkownicy.login = \"{$login}\" AND dane.id = uzytkownicy.id";
                                $result2 = mysqli_query($db, $kw3);
                                while ($row = mysqli_fetch_assoc($result2)) {
                                    $wiek = 2022 - $row['rok_urodz'];
                                    printf("<LABEL
                                    <div id='card'>
                                    <img src=\"{$row['zdjecie']}\" alt='osoba'>
                                    <h4>{$row['login']} ({$wiek})</h4>
                                    <p>hobby: {$row['hobby']}</p>
                                    <h1><img src='icon-on.png'>{$row['przyjaciol']}</h1>
                                    <a href='dane.html'><button>Więcej informacji</button></a>
                                    </div>");
                                }
                            } else
                                printf("Hasło nieprawidłowe");
                        }
                    }
                }
            }
            else{
                printf('Proszę uzupełnić formularz');
            }
            mysqli_close($db);
            ?>

        </div>
    </div>
    <div class = "pomiedzy"></div>    
    <div class = "stopka">
        Stronę wykonał: Patryk Pośnik
    </div>
</body>
</html>