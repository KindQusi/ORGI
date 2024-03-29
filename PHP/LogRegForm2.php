<?php
    require_once '../SCRIPTS/accounts.php' ;
    //require_once 'database.php' ;
    require_once '../SCRIPTS/GlobalVariables.php';
    session_start();
    if( isset($_SESSION[$isLogged]) )
    {
        header('Location: Welcome.php'); // Uzytkownika cofamy do strony glownej
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
    <link rel="icon" href="../Photos/Hedgehog_Logo.png">
    <title>Document</title>
</head>

<body class="body body__LogReg">
<header class="header">
        <?php           
            if ( !isset( $_SESSION[$isLogged] ) )
            {
        ?>
        <div class="header_buttonsDiv">
        <a href="../PHP/HowItWorks.php"><button class="header__button header__button--leftSide">Jak to działa?</button></a>
        <?php 
            }
            else
            {
        ?>
        <div class="header_buttonsDiv">
        <a href="../PHP/Addfile.php"><button class="header__button header__button--leftSide">Dodaj plik</button></a>
        <?php
            }
        ?>
        <a href="../PHP/Categories.php"><button class="header__button header__button--rightSide">Przeglądaj</button></a>
        </div>
        <a href="../PHP/Welcome.php"><img class="header__logo" src="../Photos/orgilogo_biae.png" alt=""></a>

        <?php           
            if ( !isset( $_SESSION[$isLogged] ) )
            {
        ?>
        <div class="header_buttonsDiv">
        <a href="../PHP/LogRegForm2.php"><button class="header__button header__button--leftSide">Zaloguj się</button></a>
        <a href="../PHP/LogRegForm2.php"><button class="header__button header__button--rightSide">Zarejestruj się</button></a>
            </div>
        <?php 
            }
            else
            {
        ?>
        <!-- paragraf z inputem na  przywitanie użytkownika -->
        <div class="header_buttonsDiv">
        <p class="hi">Witaj, <input class="hiuser header__button--leftSide" name="hiuser" type="text" disabled
        value="<?php echo $_SESSION[$userCredits]->GetUserNick(); ?>" ></p>
        <button onclick="location.href='../SCRIPTS/logout.php'" class="header__button header__button--logout header__button--rightSide">Wyloguj się</button>
            </div>
        <?php
            }
        ?>

    </header>
    <div class="container">
        <form class="container__Login" action="../SCRIPTS/RegistrationOrLogin.php" method="POST">
            <input type="hidden" value="login" name="userAction">
            <p class="container__title">Logowanie</p>
            <input name="email" class="container__input" type="text" placeholder="Email">
            <input name="password" class="container__input" type="text" placeholder="Password">
            <button class="container__button">Logowanie</button>
        </form>
        <div class="container__CenterLogo">
        <img class="hedgehog__logo" src="../Photos/Hedgehog_Logo.png" alt="Hedgehog. Page's logo.">
            <h1 class="hedgehog__logo--title" >Otwarte Repozytorium Gigabajtów Inspiracji</h1>
        </div>
        <form class="container__Registration" action="../SCRIPTS/RegistrationOrLogin.php" method="POST">
            <input type="hidden" class="userAction" name="userAction" value="registration">
            <p class="container__title">Rejestracja</p>
            <input class="container__input" name="login" type="text" placeholder="Login">
            <input class="container__input" name="email" type="text" placeholder="Email">
            <input class="container__input" name="password" type="text" placeholder="Password">
            <input class="container__input" type="text" placeholder="RepeatedPassword">
            <button class="container__button">Rejestracja</button>
        </form>
    </div>
    <!-- Div z paragrafem na Errory -->
    <?php
        if ( isset( $_SESSION[$error_LogInForm]) || isset( $_SESSION[$error_RegisForm]) )
        {
    ?>
    <div class="alert">
        <p class="alert__error"> 
            <?php 
                if ( isset( $_SESSION[$error_LogInForm]) )
                    echo $_SESSION[$error_LogInForm];
                if ( isset( $_SESSION[$error_RegisForm]) )
                    echo $_SESSION[$error_RegisForm];

                unset($_SESSION[$error_LogInForm]);
                unset($_SESSION[$error_RegisForm]);
            ?> 
        </p>
    </div>
    <?php
        }
    ?>
    
</body>

</html>