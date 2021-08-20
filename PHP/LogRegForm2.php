<?php
    require_once '../SCRIPTS/accounts.php' ;
    //require_once 'database.php' ;
    require_once '../SCRIPTS/GlobalVariables.php';
    session_start();
    if( isset($_SESSION[$isLogged]) )
    {
        header('Location: Welcome.php'); // Uzytkownika cofamy do strony glownej/logowania
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
    <link rel="stylesheet" href="../CSS/LogReg/Container.css">
    <title>Document</title>
</head>

<body class="body">
    <header class="header">
        <button class="header__button">Jak to działa?</button>
        <button class="header__button">Przeglądaj</button>
        <img class="header__logo" src="../Photos/orgilogo_biae.png" alt="">
        <button class="header__button header__button--leftSide">Zaloguj się</button>
        <button class="header__button header__button--rightSide">Zarejestruj się</button>
        <!-- 
        Logowanie i rejestracja dla osob nie zalogowanych, oznacza to ze
        tutaj ten przycisk jest zbedny
        <button class="header__button header__button--logout">Wyloguj się</button> 
        -->
    </header>
    <div class="container">
        <form class="container__Login" action="../PHP SCRIPTS/RegistrationOrLogin.php" method="POST">
            <input type="hidden" value="login" name="userAction">
            <p class="container__title">Logowanie</p>
            <input class="container__input" type="text" placeholder="Email">
            <input class="container__input" type="text" placeholder="Password">
            <button class="container__button">Logowanie</button>
        </form>
        <div class="container__CenterLogo">
            <p>ORGI</p>
            <p>Otwarte Repozytorium Gigabajtów Inspiracji</p>
        </div>
        <form class="container__Registration" action="../PHP SCRIPTS/RegistrationOrLogin.php" method="POST">
            <input type="hidden" class="userAction" name="registration">
            <p class="container__title">Rejestracja</p>
            <input class="container__input" type="text" placeholder="Login">
            <input class="container__input" type="text" placeholder="Email">
            <input class="container__input" type="text" placeholder="Password">
            <input class="container__input" type="text" placeholder="RepeatedPassword">
            <button class="container__button">Rejestracja</button>
        </form>
    </div>
    <!-- Div z paragrafem na Errory -->
    <div class="alert">
        <p class="alert__error">Error</p>
    </div>
</body>

</html>