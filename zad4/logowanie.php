<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div class = "baner">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div class = "lewy" >
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <div class = "g_prawy" >
        <h1>Zapisz się</h1>
        <form action="logowanie.php" method = "POST">
            <label>login: <input type="text" name = "login"></label> <br>
            <label>hasło: <input type="password" name = "haslo"></label> <br>
            <label>powtórz hasło: <input type="password" name = "haslopop"></label> <br>
            <button type="submit">Zapisz</button>
        </form>
        <?php
            $db = mysqli_connect("localhost", "root", "", "psy");
            $zap1 = "SELECT login FROM uzytkownicy";

            $result = mysqli_query($db, $zap1);

            $login = $_POST["login"];
            $haslo = $_POST["haslo"];
            $haslopop = $_POST["haslopop"];

            $puste_pola = "wypełnij wszystkie pola";
            $login_istnieje = "login występuje w bazie danych, konto nie zostało dodane";
            $niepasujace_hasla = "hasła nie są takie same, konto nie zostało dodane";
            $dodanie = "Konto zostało dodane";

            $check = 0;

            if(!empty($login) && !empty($haslo) && !empty($haslopop)){

                while($tab = mysqli_fetch_array($result)){
                    if($login == $tab[0]){
                        printf("<p>$login_istnieje</p>") . $db->error;
                        $check = 1;
                        break;
                    }
                }
                if($haslo != $haslopop){
                    printf("<p>$niepasujace_hasla</p>") . $db->error;
                    $check = 1;
                }
                if($check == 0){
                $haslo_szyfr = sha1($haslo);
                $result = mysqli_query($db, "INSERT INTO uzytkownicy (id, login, haslo) VALUES ('', '$login', '$haslo_szyfr')");
                printf("<p>$dodanie</p>");
                }
                
            }
            else{
                printf("<p>$puste_pola</p>");
            }




            mysqli_close($db);
        ?>
    </div>
    <div class = "d_prawy" >
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych co, chcieliby kupic psa</li>
            <li>tych co, lubią psy</li>
        </ol>
        <a href="./regulamin.html">Przeczytaj regulamin forum</a>
    </div>
    <div class = "stopka" >
        Stronę wykonał: Patryk Pośnik
    </div>
</body>
</html>