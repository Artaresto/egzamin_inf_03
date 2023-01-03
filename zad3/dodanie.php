<?php
    $db = mysqli_connect("localhost", "root", "", "ee09");

    $nr = $_POST['numer'];
    $pierw = $_POST['pierw'];
    $drug = $_POST['drug'];
    $trzec = $_POST['trzec'];
    
    mysqli_query($db ,"INSERT INTO ratownicy (nrKaretki, ratownik1, ratownik2, ratownik3)
    VALUES ($nr,'$pierw', ' $drug', '$trzec');");

mysqli_close($db);

?>