<?php
    /*
        Zadaniem tego skryptu jest po wybraniu przez użytkownika co chce przeglądać
        wczytanie do naszego przeglądu plików ten dany typ plików. Użytkownik 
        powinien wypełnić formularz ( pojedyńcze kafelki z kategoriami ) i być zalogowany
        1. Sprawdzenie czy mamy wszystko co jest potrzebne , czy zalogowany i wiemy co potrzebuje 
        2. Załadować pliki
        3. Na ten moment, wypisać konkretną pulę plików

    */

session_start();
    require_once 'accounts.php' ;
    require_once 'database.php' ;
    require_once 'GlobalVariables.php';

    //header('Location: ../PHP/Browser.php');
    //exit();

    try
    {
        if( isset( $_SESSION[$isLogged] ) && isset( $_POST[$category_ChooseCategoryForm] ) )
        {
            $files  = null;
            $dir    = null;
            switch ($_POST[$category_ChooseCategoryForm])
            {
                case $categoryPhoto:
                    $dir = $photosUploadFolder;
                    break;
                case 'sluchowisko':
                    $dir = $sluchowiskoUploadFolder;
                    break;
            }
            
            if ( empty($dir) )
                throw new Exception("Brak takiej kategori: " . $_POST[$category_ChooseCategoryForm] );

            // Skanujemy i opcinamy dwa pierwsze wyniki
            // $files = array_diff(scandir($dir), array('.', '..'));
            $files = array_values(array_diff(scandir($dir), array('..', '.')));

            if ( !empty($files) )
            {
                print_r($files);
            }
            else
                throw new Exception("Nie znaleziono plików");
        }
        else
        {
            throw new Exception("Nie zalogowano albo nie wybrano kategori");
        }
    }  
    catch (Exception $e)
    {
        $_SESSION[''] = $e;
        echo $e;
        //header('');
    }
?>