<?php
    require_once '../SCRIPTS/accounts.php' ;
    //require_once 'database.php' ;
    require_once '../SCRIPTS/GlobalVariables.php';
    session_start();
    if( ! isset($_SESSION[$isLogged]) )
    {
        header('Location: ../PHP/LogRegForm2.php'); ; // Uzytkownika cofamy do strony logowania
    }
    
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/Header.css">
    <link rel="stylesheet" href="../CSS/Categories/categories.css">
</head>

<body class="body">
    <header class="header">
        <button class="header__button">Jak to działa?</button>
        <a href="../PHP/Categories.php"><button class="header__button">Przeglądaj</button></a>
        <a href="../PHP/Welcome.php"><img class="header__logo" src="../Photos/orgilogo_biae.png" alt=""></a>
        <!-- <a href="../PHP/LogRegForm2.html"><button class="header__button header__button--leftSide">Zaloguj się</button></a>
        <a href="../PHP/LogRegForm2.html"><button class="header__button header__button--rightSide">Zarejestruj się</button></a> -->
        <p class="hi">Witaj, <input class="hiuser" name="hiuser" type="text" value="Maciek" disabled></p>
        <button class="header__button header__button--logout">Wyloguj się</button>
    </header>
    <div class="container">
        <form class="container__form--category" action="" method="POST">
            <div class="container__category">
                <div >
                    <div class="container__category--img container__category--foto" id="imgfoto"></div>
                </div>
            </div>
            <div>
                <div class="container__category">
                    <div class="container__category--img container__category--music"></div>
                </div>
            </div>
            <div >
                <div class="container__category">
                    <div class="container__category--img container__category--text"></div>
                </div>
            </div>
            <div class="container__categories">

            </div>
            <input class="sendCategory" type="hidden" name="sendCategory" value="">
        </form>
    </div>
    <script src="../JS/Categories.js"></script>
</body>

</html>