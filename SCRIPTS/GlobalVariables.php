<?php
    ///////////////////////////
    // Ustawienia
    ///////////////////////////

    $maxDisplayedFilesInBrowser = 5;

    $minUploadForBrowser = 5;


        // Skrypty PHP
    ///////////////////////////
    // Ścieżki
    ///////////////////////////

    $root = $_SERVER["DOCUMENT_ROOT"];
    $rootUploads = $root . '/TEST_UPLOADS/';

    ///////////////////////////
    // Log In / Registration form
    ///////////////////////////

    $userAction      = 'userAction';
    $userActionLogIn = 'login';
    $userActionRegIn = 'registration';

    $isLogged        = 'isLogged';

    $email_LogInForm = 'email';
    $pass_LogInForm  = 'password';

    $nick_RegisForm  = 'login';
    $email_RegisForm = 'email';
    $pass_RegisForm  = 'password';

    $userCredits     = 'userCredits';
    $error_LogInForm = 'errorLogInForm';
    $error_RegisForm = 'errorRegisForm';

    ///////////////////////////
    // Adding product form
    ///////////////////////////

    $file_AddFileForm           = 'file';
    $typeFile_AddFileForm       = 'filetype';
    //1
    $photoType_AddFileForm      = 'Zdjęcia';
    //2
    $efectType_AddFileForm      = 'Efekty';
    $bgmusicType_AddFileForm    = 'Podkłady';
    $playType_AddFileForm       = 'Słuchowiska';
    $reportageType_AddFileForm  = 'Reportaże';
    //3
    $columnsType_AddFileForm    = 'Felietony';
    $storiesType_AddFileForm    = 'Opowiadania';
    $poemType_AddFileForm       = 'Poezja';

    $addedFile_Flag             = 'addedFile_Flag';
    /*
    1. Fotografia (podkategorie uzależnione od tagowania)
    2. Dźwięki
    - efekty (sample)
    - podkłady
    - słuchowiska + YouTube
    - reportaże + YouTube
    3. Teksty
    - felietony
    - opowiadania
    - poezja.
    */
    

    $fileDescr_AddFileForm  = 'description';
    $fileTag_AddFileForm    = 'tag0';
    $fileTag1_AddFileForm   = 'tag1';
    $fileTag2_AddFileForm   = 'tag2';
    $fileTag3_AddFileForm   = 'tag3';
    $fileTag4_AddFileForm   = 'tag4';
    $fileTag5_AddFileForm   = 'tag5';
    
    // Dzialalo bez wpisanego?
    $error_AddFileForm = 'error_AddFileForm';

    ///////////////////////////
    // Choose cathegory form
    ///////////////////////////

    $category_ChooseCategoryForm = 'sendCategory';

    //1
    $categoryPhoto      ='Zdjęcia';
    //2
    $categoryEfect      ='Efekty';
    $categoryBgmusic    ='Podkłady';
    $categoryplay       ='Słuchowiska';
    $categoryreportage  ='Reportaże';
    //3
    $categorycolumns    ='Felietony';
    $categorystories    ='Opowiadania';
    $categorypoem       ='Poezja';
    /*
    1. Fotografia (podkategorie uzależnione od tagowania)
    2. Dźwięki
    - efekty (sample)
    - podkłady
    - słuchowiska + YouTube
    - reportaże + YouTube
    3. Teksty
    - felietony
    - opowiadania
    - poezja.
    */

    ///////////////////////////
    // Przeglądanie plików
    ///////////////////////////

    $savedCategory  = 'savedCategory';
    $pageCounter    = 'pageCounter'; 
    $searchInput    = 'taginput';

    $fileID         = 'fileID';
    $fileCategory   = 'fileCategory';

    ///////////////////////////
    // CheckUser.php
    ///////////////////////////

    $typeFile_CheckUser = 'typeFile_CheckUser';
    $userCounter        = 'userCounter';
    
    ///////////////////////////
    // UPDATEDOWNLOADCOUNTER
    ///////////////////////////
    $DownloadedIDs  = 'DownloadedIDs'; 

        // Bazy danych
    ///////////////////////////
    // Tablica użytkowników
    ///////////////////////////

    $usersTable = 'Uzytkownicy';

    $login_UsersTable_Col   = 'Nick';
    $pass_UsersTable_Col    = 'Haslo';
    $email_UsersTable_Col   = 'Email';
    $id_UsersTable_Col      = 'ID';

    $SumOfPhoto_UsersTable      = 'SumOfPhoto';
    
    $SumOfEfect_UsersTable      = 'SumOfEfect';
    $SumOfBgmusic_UsersTable    = 'SumOfBgmusic';
    $SumOfPlay_UsersTable       = 'SumOfPlay';
    $SumOfReportage_UsersTable  = 'SumOfReportage';

    $SumOfColumns_UsersTable    = 'SumOfColumns';
    $SumOfStories_UsersTable    = 'SumOfStories';
    $SumOfPoem_UsersTable       = 'SumOfPoem';

    ///////////////////////////
    // Tablice na wrzuty 
    // zależnie od kategori
    ///////////////////////////

    //1
    $photosUploadTable  = 'zdjecia';
    $photosUploadFolder = '../uploads/zdjecia/';

    //2
    $efectUploadTable      = 'efekty';
    $efectUploadFolder     = '../uploads/efekty/';

    $bgmusicUploadTable    = 'podklady';
    $bgmusicUploadFolder   = '../uploads/podklady/';

    $playUploadTable       = 'sluchowiska';
    $playUploadFolder      = '../uploads/sluchowiska/';

    $reportageUploadTable  = 'reportaze';
    $reportageUploadFolder = '../uploads/reportaze/';

    //3
    $columnsUploadTable    = 'felietony';
    $columnsUploadFolder   = '../uploads/felietony/';

    $storiesUploadTable    = 'opowiadania';
    $storiesUploadFolder   = '../uploads/opowiadania/';

    $poemUploadTable       = 'poejza';
    $poemUploadFolder      = '../uploads/poezja/';
    /*
    1. Fotografia (podkategorie uzależnione od tagowania)
    2. Dźwięki
    - efekty (sample)
    - podkłady
    - słuchowiska + YouTube
    - reportaże + YouTube
    3. Teksty
    - felietony
    - opowiadania
    - poezja
    */

    ///////////////////////////
    // Kolumny w tablicach na
    // każdą kategorię
    ///////////////////////////
    $fileID_UploadsTable_Col     = 'ID';
    $userID_UploadsTable_Col     = 'ID_USER';
    $fileName_UploadsTable_Col   = 'NazwaPliku';
    $typeFile_UploadsTable_Col   = 'Typ';
    $descr_UploadsTable_Col      = 'Opis';

    $Tag_UploadsTable_Col        = 'Tag';
    $Tag1_UploadsTable_Col       = 'Tag1';
    $Tag2_UploadsTable_Col       = 'Tag2';
    $Tag3_UploadsTable_Col       = 'Tag3';
    $Tag4_UploadsTable_Col       = 'Tag4';
    $Tag5_UploadsTable_Col       = 'Tag5';

    $DownloadCounter_Col         = 'Ile_pobran';

   

?>