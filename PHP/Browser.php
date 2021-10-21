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

    // Musimy być zalogowani
    if( ! isset($_SESSION[$isLogged]) )
    {
        header('Location: ../PHP/LogRegForm2.php'); // Uzytkownika cofamy do strony logowania
    }
    // Pierwsze wejście , musimy zapisać kategorie
    else if ( isset ($_POST[$category_ChooseCategoryForm]))
    {
        // Zapisujemy dane wejściowe
        $_SESSION[$savedCategory] = $_POST[$category_ChooseCategoryForm];
        $_SESSION[$pageCounter] = 1;
        $_SESSION[$searchInput] = null;
        // Wyświetlamy bez tagu
        $files = GetFileWithInfo($_POST[$category_ChooseCategoryForm],$_SESSION[$pageCounter]);
    }
    // Gdy użytkownik już jest tu chwilkę i prawdopodbnie wybierze tag/kategorie?
    else
    {
        if ( isset($_GET["page"]));
            $_SESSION[$pageCounter] = $_GET["page"];
        // Gdy dostaniemy Tag
        if ( isset($_POST[$searchInput]) )
            $_SESSION[$searchInput] = $_POST[$searchInput];
        // Gdy Dostaniemy tag a użytkownik czegoś już szukał != 1 strona
        if ( $_SESSION[$pageCounter] > 1 && isset ( $_POST[$searchInput] ) )
            $_SESSION[$pageCounter] = 1;

        $files = GetFileWithInfo($_SESSION[$savedCategory],$_SESSION[$pageCounter],$_SESSION[$searchInput]);
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
            <form action="Browser.php?page=1" method="POST">
                <input class="filters__input" name="taginput">
                <button class="filters__button">Filtruj</button>
            </form>
            

            <!-- <ul class="main__Categories">
                <li class="main__Category">Memy</li>
                <li class="main__Category">Memy</li>
                <li class="main__Category">Memy</li>
                <li class="main__Category">Memy</li>
                <li class="main__Category">Memy</li>
                <li class="main__Category">Memy</li>
            </ul> -->
        </div>
        <form action="../SCRIPTS/UpdateDownloadCounter.php" method="POST" class="main__ItemsWindow">

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
                        <p class="Item__title"> <?php echo $files[$i][2] ?> </p>
                        <p class="Item__desription"><?php echo $files[$i][3]; ?></p>
                    </div>
                    <div class="tags">
                        <p class="Item__tags"> <?php echo $files[$i][4]; ?></p>
                    </div>
                </div>
                <div class="Item__Tag__Btn">
                    <button class="more Btn">Wincyj</button>
                    <input type="text" class="id" name="id"       value="<?php echo $files[$i][6] ?>" hidden><!-- id produktu  -->
                    <input type="text" class="category" name="category" value="<?php echo $_SESSION[$savedCategory] ?>" hidden><!-- kategoria produktu  -->
                    <a href ="<?php echo $files[$i][1]; ?>" download="<?php echo $files[$i][2].'.'.$files[$i][4]; ?>"><button class="download Btn" >Pobierz</button></a>
                    <p class="Item__tags"> np format pliku</p>
                    <p class="Item__tags"> np rozmiar pliku</p>
                </div>
            </div>
        
        <?php                    
                }
            }
        ?>
        
        <div class="main__ItemsWindow--itemBox">
                <img class="Item__img" src="../uploads/zdjecia/1.png" alt="">
                <div class="about_tags">
                    <div class="Item__about">
                        <p class="Item__title"> <?php echo 'Browser.php?page='.$_SESSION[$pageCounter]?> </p>
                        <p class="Item__desription">$_SESSION[$searchInput]: <?php echo $_SESSION[$searchInput]?></p>
                    </div>
                    <div class="tags">
                        <p class="Item__tags">Lorem.</p>
                    </div>
                </div>
                <div class="Item__Tag__Btn">
                    <button class="more Btn">Wincyj</button>
                    <a href ="" download=""><button class="download Btn" >Pobierz</button></a>
                    <p class="Item__tags"> np format pliku</p>
                    <p class="Item__tags"> np rozmiar pliku</p>
                </div>
            </div>
          
                <ul class="pagination">
                    <li><a href="<?php echo 'Browser.php?page=1' ?>" class="page">| <<</a></li>
                    <li><a href="
                    <?php 
                        if ($_SESSION[$pageCounter] - 1 > 0)
                            echo 'Browser.php?page='.$_SESSION[$pageCounter] - 1;
                        else
                            echo 'Browser.php?page=1';
                    ?>" 
                    class="page"><<</a></li>
                    <!--
                        <li><a href="#2" class="page">1</a></li>
                        <li><a href="#3" class="page">2</a></li>
                    -->
                    <li><a href="
                    <?php 
                        echo 'Browser.php?page='.$_SESSION[$pageCounter] + 1 
                    ?>" 
                    class="page">>></a></li>
                    <!--
                        <li><a href="#5" class="page">>> |</a></li>
                    -->
                </ul>
        </div>
        </form>
    <script scr="../JS/Download.js"></script>
</body>
</html>