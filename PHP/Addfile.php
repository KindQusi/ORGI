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
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/Header.css">
    <link rel="stylesheet" href="../CSS/Addfile/Addfile.css">
    <title>Document</title>
</head>

<body class="body">
    <header class="header">

        <button class="header__button header__button--leftSide">Jak to działa?</button>
        <a href="../HTML/Categories.html"><button class="header__button">Przeglądaj</button></a>
        <a href="../HTML/Welcome.html"><button class="header__button header__button--logo">ORGI</button></a>

        <?php
        if ( isset ( $_SESSION[$isLogged] ) )
        {
        ?>

        <p class="hi">Witaj, <input class="hiuser" name="hiuser" type="text" disabled
        value="<?php echo $_SESSION[$userCredits]->GetUserNick(); ?>" ></p>
        <button onclick="location.href='../SCRIPTS/logout.php'" class="header__button header__button--logout">Wyloguj się</button>

        <?php
        }
        ?>
    </header>
        <form class="container__form" action="../SCRIPTS/addingFiles.php" method="POST">
        <div class="addedfile__div">
            <label class="addedfile__label" for="">Wybierz typ pliku: </label>
            <input list="type" class="formtype" name="filetype"> 
        </div>
        <img class="addedfile__img" src="" alt="">
        <datalist id="type">
            <option value="">
            <option value="Zdjęcia">
            <option value="Filmy">
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
    <script src="../JS/CheckFormat.js"></script>
</body>

</html>