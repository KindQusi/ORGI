<?php
/*
    Tutaj powinniśmy dostać jaką kategorię chce użytkownik i przekazać do osobnego skryptu
    który nam zwróci gotową tablicę do wyświetlenia wraz z plikami oraz informacjami o nich.
*/
    require_once '../SCRIPTS/accounts.php' ;
    require_once '../SCRIPTS/GlobalVariables.php';
    require_once '../SCRIPTS/BrowserPrepare.php';
    session_start();

    $files = null;

    if( ! isset($_SESSION[$isLogged]) )
    {
        header('Location: ../PHP/LogRegForm2.php'); // Uzytkownika cofamy do strony logowania
    }
    // Sprawdzamy czy mamy kategorie
    else if ( isset ($_POST[$category_ChooseCategoryForm]))
    {
        $files = GetFileWithInfo($_POST[$category_ChooseCategoryForm]);//$fileManager -> LoadFiles($_POST[$category_ChooseCategoryForm]);
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
    <div class="main">
        <div class="main__sidebar">
            <h3>Kategorie</h3>
        </div>
        <div class="main__ItemsWindow">

        <?php
            if ( !empty($files))
            {
                foreach( $files as $i => $file)
                {         
        ?>

            <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="<?php echo $files[$i][0]; ?> ?>" alt="">
                <div class="about_tags">
                    <div class="Item__about">
                        <p class="Item__title"> <?php echo array_values(explode(".",$files[$i][2]) )[0]; ?> </p>
                        <p class="Item__desription"><?php echo $files[$i][3]; ?></p>
                    </div>
                    <div class="tags">
                        <p class="Item__tags"> <?php echo $files[$i][4]; ?></p>
                    </div>
                </div>
                <div class="Item__Tag__Btn">
                    <button class="more Btn">Wincyj</button>
                    <a href ="<?php echo $files[$i][1]; ?>" download="<?php echo $files[$i][2]; ?>"><button class="download Btn" >Pobierz</button></a>
                    <p class="Item__tags"> np format pliku</p>
                    <p class="Item__tags"> np rozmiar pliku</p>
                </div>
            </div>
        
        <?php                    
                }
            }
        ?>

        </div>
    </div>
</body>
</html>