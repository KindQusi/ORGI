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
    <link rel="stylesheet" href="../CSS/Browser/Browser.css">
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
    <div class="main">
        <div class="main__sidebar">
            <h3>Kategorie</h3>
        </div>
        <div class="main__ItemsWindow">
            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div>
            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div>
            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div>
            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div>
            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div>
            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div>
            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div>
            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div>
            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div> <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../Photos/orgi logo.png" alt="">
                <div class="Item__desription">
                    <p class="Item__desription--text">jakiś tam tekścik</p>
                </div>
                <div class="Item__tags">
                   <p class="Item__tags--text"> taki tu tak pierdyknąć</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>