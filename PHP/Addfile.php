<?php
    require_once '../SCRIPTS/accounts.php' ;
    //require_once 'database.php' ;
    require_once '../SCRIPTS/GlobalVariables.php';
    session_start();
    if( ! isset($_SESSION[$isLogged]) )
    {
        header('Location: ../PHP/LogRegForm2.php'); // Uzytkownika cofamy do strony logowania
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
        <form class="container__form" action="../SCRIPTS/addingFiles.php" method="POST" enctype="multipart/form-data">
        <div class="addedfile__div">
            <label class="addedfile__label" for="">Wybierz typ pliku: </label>
            <input list="type" class="formtype" name="filetype"> 
        </div>
        <img class="addedfile__img" src="" alt="">
        <datalist id="type">
        <option value="">
            <option value="Zdjęcia">
            <option value="Podkłady">
            <option value="Efekty">
            <option value="Słuchowiska">
            <option value="Reportaże">
            <option value="Felietony">
            <option value="Opowiadania">
            <option value="Poezja">
        </datalist>
            <input class="addedfile" type="file" id="file" name="file">
            <!-- <p class="filename"></p>
            <p class="format"></p>
            <p class="size"></p> -->
            <input type="text" class="addtags" placeholder="Add Tag">
            <input type="button" class="addtagsbtn" value="dodaj tag">
            <p class="tagslist"></p>
            <textarea class="file__description" placeholder="Opis tu jebnij" name="description"></textarea>
            <button type="submit" class="uploadbtn">Wyślij plik na serwer</button>
        </form>
        <!--
            Na szybko miejsce na errory przekopiowany z LogRegForm2
        -->
        <?php
            if ( isset( $_SESSION[$error_AddFileForm]) )
            {
        ?>
        <div class="alert">
            <p style="color: white;"> 
                <?php 
                    if ( isset( $_SESSION[$error_AddFileForm]) )
                        echo $_SESSION[$error_AddFileForm];
                    unset($_SESSION[$error_AddFileForm]);
                ?> 
            </p>
        </div>
        <?php
            }
        ?>
         <!--
            Na szybko miejsce na errory przekopiowany z LogRegForm2
        -->
    <script src="../JS/CheckFormat.js"></script>
</body>

</html>