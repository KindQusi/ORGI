<?php
    require_once '../PHP SCRIPTS/accounts.php' ;
    //require_once 'database.php' ;
    require_once '../PHP SCRIPTS/GlobalVariables.php';
    session_start();
    if( ! isset($_SESSION[$isLogged]) )
    {
        header(''); // Uzytkownika cofamy do strony glownej/logowania
    }
    
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/Header.css">
    <link rel="stylesheet" href="../CSS/Addfile/Addfile.css">
    <title>Document</title>
</head>

<body class="body">
    <header class="header">

        <button class="header__button header__button--leftSide">Jak to działa?</button>
        <button class="header__button header__button--rightSide">Przeglądaj</button>
        <button class="header__button header__button--logo">ORGI</button>
        <!-- Dodawnie plików tylko dla zalogowanych 
        <button class="header__button header__button--leftSide">Zaloguj się</button>
        <button class="header__button header__button--rightSide">Zarejestruj się</button>
        -->

        <?php
        if ( isset ( $_SESSION[$isLogged] ) )
        {
        ?>

        <button class="header__button header__button--logout">Wyloguj się</button>

        <?php
        }
        ?>
    </header>
    <div class="container">
        <input list="type" class="formtype">
        <datalist id="type">
            <option value="">
            <option value="Zdjęcia">
            <option value="Filmy">
        </datalist>
        <form class="form" action="../PHP SCIPTS/addingFiles.php" method="POST">
            <input class="addedfile" type="file" id="file">
            <p class="filename"></p>
            <p class="format"></p>
            <p class="size"></p>
            <input type="text" class="addtags" placeholder="Add Tag">
            <input type="button" class="addtagsbtn" value="dodaj tag">
            <p class="tagslist"></p>
            <textarea class="file__description" placeholder="">Opis tu jebnij</textarea>
            <button type="submit" class="uploadbtn">Wyślij plik na serwer</button>
        </form>
    </div>
    <script src="/JS/CheckFormat.js"></script>
</body>

</html>