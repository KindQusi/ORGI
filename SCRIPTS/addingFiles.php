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
    session_start();
    /*
        Dostaniemy się tu gdy użytkownik jest zalogowany oraz wypełnił formularz
    */
    if( isset( $_SESSION[$isLogged] ) && isset( $_POST[$typeFileAddFileForm]) )
    {
        try
        {   
            // 1.
            // Tworzymy zmienne
            $target_dir = null;
            $target_table = null;

            // TODO
            // Sprawdzamy co użytkownik dodaje i czy 
            // jest to odpowiednia rzecz
            switch ($_POST[$typeFileAddFileForm]) {
                case 'Zdjecie':
                    $target_dir   = $photosUploadFolder;
                    $target_table = $photosUploadTable;
                    break;
                case'Sluchowisko':
                    $target_dir = $sluchowiskoUploadFolder;
                    $target_table = $sluchowiskoUploadTable;
                    break;
                // Dodać kolejne kategorie
            }

            // Gdy chcemy dodac coś czego nie mamy wywalamy error'a
            if ($target_dir == null || $target_table == null)
                throw new Exception("Brak lub zła kategoria");
            
            // Do łączenia z bazą danych 
            $db = new Database();
            
            // Sprawdzamy czy jest on w bazach danych
            // Zbieramy potrzebne dane do wpisu
            // O dodającym
            $user = $_SESSION[$userCredits];
            //unserialize($user);
            $userID = $user->GetUserId();

            $fileName = $_FILES[$file_AddFileForm]["name"];
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

            // 2.
            // Sprawdzamy czy mamy coś już takiego      
            if ( $db->query($query) )
                throw new Exception("Mamy juz taki plik");

            // 3.
            // Sprawdzamy czy mamy dane uzytkownika
            if( !isset ( $_SESSION[$userCredits] ) )
                throw new Exception("Brak danych użytkownika");

            // O pliku
            // $fileName   = $_FILES[$file_AddFileForm]["name"];
            $fileDesc   = $_POST[$fileDescr_AddFileForm];
            $fileTag    = $_POST[$fileTag_AddFileForm];
            $fileTag1   = $_POST[$fileTag1_AddFileForm];
            $fileTag2   = $_POST[$fileTag2_AddFileForm];
            $fileTag3   = $_POST[$fileTag3_AddFileForm];
            $fileTag4   = $_POST[$fileTag4_AddFileForm];
            $fileTag5   = $_POST[$fileTag5_AddFileForm];

            // Zapytanie wstawiania pliku
            $query = 
            "INSERT INTO 
            `{$target_table}`
            (
            `{$user_IDUploadsTable_Col}`,`{$fileName_UploadsTable_Col}`,`{$descr_UploadsTable_Col}`,
            `{$Tag_UploadsTable_Col}`,`{$Tag1_UploadsTable_Col }`,`{$Tag2_UploadsTable_Col }`,
            `{$Tag3_UploadsTable_Col }`,`{$Tag4_UploadsTable_Col }`,`{$Tag5_UploadsTable_Col }`
            )           
            VALUES 
            (
            '{$userID}','{$fileName}','{$fileDesc}',
            '{$fileTag}','{$fileTag1}','{$fileTag2}',
            '{$fileTag3}','{$fileTag4}','{$fileTag5}'
            )"; 
            
            // Jeżeli nie uda się go dodać do bazy
            if (!$db->query($query))
                throw new Exception("Brak połączenia z bazą. Proszę spóbować później");

            
            // Tutaj będziemy zapisywać nazwę oraz adres gdzie chcemy plik zapisać
            $target_file == null;

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
            if ( $record->num_rows > 0 && $Record->now_rows < 2)
            {
                // Powinien być tylko jeden wynik , tego co przed chwilą dodawaliśmy
                while ($row = $record -> fetch_assoc() )
                {
                    // Bierzemy ID      
                    $id = $row[$fileID_UploadsTable_Col];
                    // Oddzielamy nazwę i rozszerzenie
                    $temp = explode(".", $_FILES[$fileAddFileForm]["name"]);
                    // Bierzemy ID i rozszerzenie
                    $newfilename = $id . '.' . end($temp);
                    // Robimy ścieżkę zapisu z nową nazwą
                    $target_file = $target_dir . $newfilename;
                }
            }
            else
                throw new Exception("Nie uzyskaliśmy wyniku naszego wcześniejszego wrzutu");

            // 5.
            // Wstawiamy plik 
            // Jak się nie uda usuwamy info z bazy o nim
            if (! move_uploaded_file($_FILES[$fileAddFileForm]["name"],$target_file ) )
            {
                // TODO
                // Kwerenda do usuwania
                $query = '';
                // Najgorszy przypadek gdy będziemy mieli wpis w bazie danych i nie uda się go usunać
                if ( $db->query($query) )
                    throw new Exception("Wystąpił błąd podczas próby zapisu pliku u nas, spróbuj ponownie");
                else    
                    throw new Exception("Błąd krytyczny proszę się skontaktować z administracją");
            }

            // Udało nam się dodać plik do naszej bazy danych i zapisać na serwerze :)

            
            
        }
        catch(Exception $e)
        {
            $_SESSION[$error_AddFileForm] = $e;
            // + przekierowanie
            //header('Location: Home.php');
        }
    
    }
    else
    {
        echo "Nie zalogowano";
        //header('Location: LogRegForm.html');
    }

?>