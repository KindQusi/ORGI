<?php
        // Skrypty PHP
    ///////////////////////////
    // Ścieżki
    ///////////////////////////

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
    // LISTA TAGÓW
    // 6 tagów obowiązkowych
    // 

    $file_AddFileForm       = 'file';
    $typeFile_AddFileForm   = 'filetype';

    $photoType_AddFileForm  = 'Zdjęcia';

    $fileDescr_AddFileForm  = 'description';
    $fileTag_AddFileForm    = 'tag0';
    $fileTag1_AddFileForm   = 'tag1';
    $fileTag2_AddFileForm   = 'tag2';
    $fileTag3_AddFileForm   = 'tag3';
    $fileTag4_AddFileForm   = 'tag4';
    $fileTag5_AddFileForm   = 'tag5';

    $error_AddFileForm = '';

    ///////////////////////////
    // Choose cathegory form
    ///////////////////////////

    $category_ChooseCategoryForm = '';

        // Bazy danych
    ///////////////////////////
    // Tablica użytkowników
    ///////////////////////////

    $usersTable = 'Uzytkownicy';

    $login_UsersTable_Col   = 'Nick';
    $pass_UsersTable_Col    = 'Haslo';
    $email_UsersTable_Col   = 'Email';
    $id_UsersTable_Col      = 'ID';

    ///////////////////////////
    // Tablice na wrzuty 
    // zależnie od kategori
    ///////////////////////////
    // TODO
    // te same nazwy różnych zdjęć

    $photosUploadTable  = 'zdjecia';
    $photosUploadFolder = 'uploads/zdjecia/';

    $sluchowiskoUploadTable  = 'Sluchowiska';
    $sluchowiskoUploadFolder = 'uploads/sluchowiska/';

    $fileID_UploadsTable_Col     = 'ID';
    $userID_UploadsTable_Col     = 'ID_USER';
    $fileName_UploadsTable_Col   = 'NazwaPliku';
    $descr_UploadsTable_Col      = 'Opis';
    $Tag_UploadsTable_Col        = 'Tag';
    $Tag1_UploadsTable_Col       = 'Tag1';
    $Tag2_UploadsTable_Col       = 'Tag2';
    $Tag3_UploadsTable_Col       = 'Tag3';
    $Tag4_UploadsTable_Col       = 'Tag4';
    $Tag5_UploadsTable_Col       = 'Tag5';

    ///////////////////////////
    // Tablica przechowująca informacje 
    // na temat wrzutów danego użytkownika
    // Tagi , nazwe itp
    ///////////////////////////

    //$Photos_usersUploads = 'Zdjecia';

?>