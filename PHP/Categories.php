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
        <form class="container__form--category" action="../SCRIPTS/checkUser.php" method="POST">
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
        </form>
    </div>
    <script src="../JS/Categories.js"></script>
</body>

</html>