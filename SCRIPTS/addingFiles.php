<?php
    /*
        Gdy otrzymamy plik z Post:
        1. Sprawdzić co chcemy. Jaki typ pliku , dla każdego typu osobna tabela zdjęcia,teksty itp
            1a Sprawdzić czy nie mamy takiego zdjęcia ? Bitowo? 
        2. Sprawdzić czy nie mamy już takiego pliku w bazie ( nazwa + id_user ?)
            2a Czy dodajacy nie dodal juz takiego zdjecia?
            2b Czy inni nie dodali takiego zdjecia? Po nazwie dla wynikow porownac bitowo?
        3. Próbować dodać info do tabeli
        4. Gdy dodamy, pobieramy id 
        5. zapisać plik na serwerze
            4a. Jak się nie uda spróbować usunąć wpis w bazie danych

        Nazwy plików -> tylko identyfikacyjnie

    */
    require_once 'accounts.php' ;
    require_once 'database.php' ;
    require_once 'GlobalVariables.php';
    include 'Switch.php';

    session_start();
    /*
        Dostaniemy się tu gdy użytkownik jest zalogowany oraz wypełnił formularz
    */
    if( isset( $_SESSION[$isLogged] ) && isset( $_POST[$typeFile_AddFileForm]) )
    {
        try
        {   
                 
            // Sprawdzamy co użytkownik dodaje i czy 
            // jest to odpowiednia rzecz         
            $infoCategory = WhatCategory($_POST[$typeFile_AddFileForm]);
            // Tablica informacji
            // 0 - Target_dir
            // 1 - Target_table
            // 2 - target_Counter
            $target_dir     = $infoCategory[0];
            $target_table   = $infoCategory[1];
            $target_Counter = $infoCategory[2];

            // Gdy chcemy dodac coś czego nie mamy wywalamy error'a
            if ($target_dir == null || $target_table == null)
                throw new Exception("Brak lub zła kategoria");

            // Tworzymy folder na dane jeżeli nie istnieje
            // 0777 jest to dostępność , ignorowana na widnowsie
            // true pozwala rekursywnie utworzyć foldery , tutaj potrzebne gdy nie mamy folderu uploads
            if (!is_dir($target_dir))
                mkdir($target_dir, 0777,true);
            if (!is_dir($target_dir))   
                throw new Exception("Nie udalo się utworzyć folderu dla tego pliku !!  " . $target_dir );
            

            // Do łączenia z bazą danych 
            $db = new Database();
            
            // Sprawdzamy czy jest on w bazach danych
            // Zbieramy potrzebne dane do wpisu
            // O dodającym
            $user = $_SESSION[$userCredits];
            $userID = $user->GetUserId();

            // Gdy będzie nazwa za długa przy wstawianiu go przytnie i system się wysypie
            if ( strlen($_FILES[$file_AddFileForm]['name']) >= 30  )
                throw new Exception("Maksymalna ilość znaków to 30. Zmień nazwę");

            // Obcinamy typ , zapisujemy go osobno
            $fileName = array_values(explode(".",$_FILES[$file_AddFileForm]['name']) )[0];
           

            $query = 
            "SELECT 
            `{$fileID_UploadsTable_Col}`
            FROM 
            `{$target_table}`
            WHERE
            `{$fileName_UploadsTable_Col}` = '{$fileName}'
            AND
            `{$userID_UploadsTable_Col}` = '{$userID}'
            ";

            $result = $db->query($query);

            // 2.
            // Sprawdzamy czy mamy coś już takiego      
            if ( $result->num_rows != 0 )
                throw new Exception("Wrzuciłeś juz taki plik");

            // 3.
            // Sprawdzamy czy mamy dane uzytkownika
            if( !isset ( $_SESSION[$userCredits] ) )
                throw new Exception("Brak danych użytkownika");

            // O pliku
            // $fileName   = $_FILES[$file_AddFileForm]["name"];
            if ( isset( $_POST[$fileDescr_AddFileForm] ) )
                $fileDesc = $_POST[$fileDescr_AddFileForm];
            else
                $fileDesc = 'Brak opisu';
            
            if ( isset( $_POST[$fileTag_AddFileForm] ) )
                $fileTag = $_POST[$fileTag_AddFileForm];
            else
                $fileTag = 'Brak tagu';

            if ( isset( $_POST[$fileTag1_AddFileForm] ) )
                $fileTag1 = $_POST[$fileTag1_AddFileForm];
            else
                $fileTag1 = 'Brak tagu1';

            if ( isset( $_POST[$fileTag2_AddFileForm] ) )
                $fileTag2 = $_POST[$fileTag2_AddFileForm];
            else
                $fileTag2 = 'Brak tagu2';

            if ( isset( $_POST[$fileTag3_AddFileForm] ) )
                $fileTag3 = $_POST[$fileTag3_AddFileForm];
            else
                $fileTag3 = 'Brak tagu3';

            if ( isset( $_POST[$fileTag4_AddFileForm] ) )
                $fileTag4 = $_POST[$fileTag4_AddFileForm];
            else
                $fileTag4 = 'Brak tagu4';

            if ( isset( $_POST[$fileTag5_AddFileForm] ) )
                $fileTag5 = $_POST[$fileTag5_AddFileForm];
            else
                $fileTag5 = 'Brak tagu5';
            /*
            $fileDesc = $_POST[$fileDescr_AddFileForm];
            $fileTag    = $_POST[$fileTag_AddFileForm];
            $fileTag1   = $_POST[$fileTag1_AddFileForm];
            $fileTag2   = $_POST[$fileTag2_AddFileForm];
            $fileTag3   = $_POST[$fileTag3_AddFileForm];
            $fileTag4   = $_POST[$fileTag4_AddFileForm];
            $fileTag5   = $_POST[$fileTag5_AddFileForm];
            */
            // Wyciagamy rozszerzenie
            $info = pathinfo($_FILES[$file_AddFileForm]["name"]);
            $ext = $info['extension'];
            // Zapytanie wstawiania pliku
            $query = 
            "INSERT INTO 
            `{$target_table}`
            (
            `{$userID_UploadsTable_Col}`,`{$fileName_UploadsTable_Col}`,`{$typeFile_UploadsTable_Col}`,`{$descr_UploadsTable_Col}`,
            `{$Tag_UploadsTable_Col}`,`{$Tag1_UploadsTable_Col }`,`{$Tag2_UploadsTable_Col }`,
            `{$Tag3_UploadsTable_Col }`,`{$Tag4_UploadsTable_Col }`,`{$Tag5_UploadsTable_Col }`
            )           
            VALUES 
            (
            '{$userID}','{$fileName}','{$ext}','{$fileDesc}',
            '{$fileTag}','{$fileTag1}','{$fileTag2}',
            '{$fileTag3}','{$fileTag4}','{$fileTag5}'
            )"; 

            // Jeżeli nie uda się go dodać do bazy
            if (!$db->query($query))
                throw new Exception("Brak połączenia z bazą. Proszę spóbować później");

            
            // Tutaj będziemy zapisywać nazwę oraz adres gdzie chcemy plik zapisać
            $target_file = null;

            // 4.
            // Wyszukujemy naszego dodanego np zdjęcia
            
            $query = 
            "SELECT 
            `{$fileID_UploadsTable_Col}`
            FROM 
            `{$target_table}`
            WHERE
            `{$fileName_UploadsTable_Col}` = '{$fileName}'
            AND
            `{$userID_UploadsTable_Col}` = '{$userID}'
            ";

            // Prosimy o wynik
            $record = $db->query($query);
            // Sprawdzamy jego ID
            if ( $record->num_rows == 1)
            {
                // Powinien być tylko jeden wynik , tego co przed chwilą dodawaliśmy
                while ($row = $record -> fetch_assoc() )
                {
                    // Bierzemy ID      
                    $id = $row[$fileID_UploadsTable_Col];
                    // Bierzemy ID i rozszerzenie
                    $newfilename = $id . '.' . $ext;
                    // Robimy ścieżkę zapisu z nową nazwą
                    $target_file = $target_dir . $newfilename;
                }
            }
            else
                throw new Exception("Nie uzyskaliśmy wyniku naszego wcześniejszego wrzutu");
                // MOZE BYC ZA DLUGA NAZWA 

            // 5.
            // Wstawiamy plik 
            // Jak się nie uda usuwamy info z bazy o nim
            if (! move_uploaded_file($_FILES[$file_AddFileForm]['tmp_name'],$target_file ) )
            {
                // TODO
                // Kwerenda do usuwania
                $query = 
                "DELETE FROM 
                `{$target_table}`
                WHERE
                `{$fileName_UploadsTable_Col}` = '{$fileName}'
                AND
                `{$userID_UploadsTable_Col}` = '{$userID}'
                ";
                // Najgorszy przypadek gdy będziemy mieli wpis w bazie danych i nie uda się go usunać
                if ( $db->query($query) )
                    throw new Exception("Wystąpił błąd podczas próby zapisu pliku u nas, spróbuj ponownie  !! " . $target_file);
                else    
                    throw new Exception("Błąd krytyczny proszę się skontaktować z administracją");
            }
            else
            {
                // Udało nam się dodać plik do naszej bazy danych i zapisać na serwerze :)
                $_SESSION[$error_AddFileForm] = 
                'Udalo się dodać nowy plik: ' 
                . $fileName.
                ' . Dziękujemy za poszerzanie wspólnej biblioteki :)';

                /*
                    TODO 
                    Zwiększanie licznika wrzuconych rzeczy przez użytkownika
                */

                $query = 
                "UPDATE 
                `{$usersTable}`
                SET
                `{$target_Counter}` = `{$target_Counter}` + 1
                WHERE
                `{$id_UsersTable_Col}` = '{$userID}'
                ";

                if ( $db->query($query) )
                {
                    $_SESSION[$addedFile_Flag] = true;
                    header('Location: ../PHP/Addfile.php');
                }
                else 
                    throw new Exception("Nie udało się zwiększyć ilości dla użytkownika o".$userID.' w kategori '.$target_Counter.' w tabeli '.$usersTable);
            
            }
        }
        catch(Exception $e)
        {
            $_SESSION[$error_AddFileForm] = $e;
            echo $e;
            // + przekierowanie
            header('Location: ../PHP/Addfile.php');
        }
    
    }
    else
    {
        //echo "Nie zalogowano";
        $_SESSION[$error_LogInForm] = 'Aby dodawać pliki trzeba być zalogowanym';
        header('Location: ../PHP/LogRegForm2.php');
    }

?>