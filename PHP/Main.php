<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orgi Main Page</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/Header.css">
</head>
<body class="body">
<header class="header">
        <?php           
            if ( !isset( $_SESSION[$isLogged] ) )
            {
        ?>
        <a href="../PHP/HowItWorks.php"><button class="header__button">Jak to działa?</button></a>
        <?php 
            }
            else
            {
        ?>
        <a href="../PHP/Addfile.php"><button class="header__button">Dodaj plik</button></a>
        <?php
            }
        ?>
        <a href="../PHP/Categories.php"><button class="header__button">Przeglądaj</button></a>
        <a href="../PHP/Welcome.php"><img class="header__logo" src="../Photos/orgilogo_biae.png" alt=""></a>

        <?php           
            if ( !isset( $_SESSION[$isLogged] ) )
            {
        ?>
        <a href="../PHP/LogRegForm2.php"><button class="header__button header__button--leftSide">Zaloguj się</button></a>
        <a href="../PHP/LogRegForm2.php"><button class="header__button header__button--rightSide">Zarejestruj się</button></a>
        <?php 
            }
            else
            {
        ?>
        <!-- paragraf z inputem na  przywitanie użytkownika -->
        <p class="hi">Witaj, <input class="hiuser" name="hiuser" type="text" disabled
        value="<?php echo $_SESSION[$userCredits]->GetUserNick(); ?>" ></p>
        <button onclick="location.href='../SCRIPTS/logout.php'" class="header__button header__button--logout">Wyloguj się</button>
        <?php
            }
        ?>

    </header>
</body>
</html>