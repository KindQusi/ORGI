<?php
/*
    Na początku musimy wiedzieć co wczytać,
        A. Jaka kategoria
        B. Dodatkowe opcje wyszukiwania np TAG
    Mając już rozpiskę tego co szukamy z bazy danych,
    musimy wczytać to do tablicy

    Niepotrzebne filemanager? Gdyby zapisać dodatkowo rozszerzenie możemy podać
    całą ścieżkę bez skanowania fodleru
*/
    function GetFileWithInfo (string $category,int $page = 1 ,string $tag = null)
    {
        include 'GlobalVariables.php';
        include 'database.php';
        include 'Switch.php';

        /*
            Tu zapiszemy nasz wynik
            Oczekujemy że będziemy tu mieli tablicę z rozspiską naszych plików
            oraz informacjami o nich

            TODO dodatkowe opcje wyszukiwania
        */

        $result = null;
        $db = new Database();

        // Liczymy które rzeczy chcemy zaleznie od nr strony
        $startFrom = 0 + ( ($page - 1) * $maxDisplayedFilesInBrowser);

        $infoCategory = WhatCategory($category);
        // Tablica informacji
        // 0 - Target_dir
        // 1 - Target_table
        $target_dir = $infoCategory[0];
        $target_table = $infoCategory[1];

        // Gdy nie mamy tagu
        if ( $tag == null)
        {
            // Wszystkie pozycje na interesują bo nie mamy tagu konkretnego
            $query = 
                "SELECT 
                *
                FROM 
                `{$target_table}`
                ORDER BY
                `{$fileName_UploadsTable_Col}`
                ASC LIMIT ".$startFrom.','.$maxDisplayedFilesInBrowser;              
        }
        else
        {
            // Gdy mamy tak musimy przeszukać każdy tag
            // Distinct? aby nie było powtórek
            $query = 
                "SELECT 
                *
                FROM 
                `{$target_table}`
                WHERE
                `{$Tag_UploadsTable_Col}` = '{$tag}'
                OR
                `{$Tag1_UploadsTable_Col}` = '{$tag}'
                OR
                `{$Tag2_UploadsTable_Col}` = '{$tag}'
                OR
                `{$Tag3_UploadsTable_Col}` = '{$tag}'
                OR
                `{$Tag4_UploadsTable_Col}` = '{$tag}'
                OR
                `{$Tag5_UploadsTable_Col}` = '{$tag}'
                ASC LIMIT ".$startFrom.','.$maxDisplayedFilesInBrowser; 
        }

        $result = $db ->query($query);

        if ($result -> num_rows > 0)
        {
            /*  
                TODO ułożyć tablice
                [0] musi być adres folderu np ../uploads/poezja/
                [1][0] Nazwa pliku na serwerze (id) + rozszerzenie
                [1][1] Oryginalna nazwa pliku
                [1][2] Opis pliku
                TODO
                [1][3][0 - 5] Tagi?
                [1][4] Nazwa autora?
                [1][5] Ilosc pobran?
                [1][6] Ilosc polubień?

                v2
                    To pozwoli od razu przypisac np tekstowi domyslna ikonke
                    tak aby w browserze tylko powstawiać linki w odpowiednie miejsca
                [0][0] Sciezka do obrazka
                [0][1] Sciezka do pobrania  dir.id.type
                [0][2] Oryginalna nazwa
                [0][3] Opis pliku
                TODO
                [0][4][0 - 5] Tagi?
                [0][5] Nazwa autora?
                [0][6] Ilosc pobran?
                [0][7] Ilosc polubień?

            */
            
            foreach ( $result as $i => $file )
            {
                // Narazie tylko dla obrazka 
                // sciezka obrazka = sciezka pobrania
                
                $preparedFiles[$i][0] = $target_dir.$file[$fileID_UploadsTable_Col].'.'.$file[$typeFile_UploadsTable_Col]; 
                $preparedFiles[$i][1] = $target_dir.$file[$fileID_UploadsTable_Col].'.'.$file[$typeFile_UploadsTable_Col];
                $preparedFiles[$i][2] = $file[$fileName_UploadsTable_Col]; // Usunąć rozszerzenie?
                $preparedFiles[$i][3] = $file[$descr_UploadsTable_Col];
                $preparedFiles[$i][4] = $file[$Tag_UploadsTable_Col];
                
            }
            /* 
            DO TESTOWANIA PAGINACJI
            while ($x < 1 )
            {
                $preparedFiles = array_merge($preparedFiles,$preparedFiles);
                $x++;
            }
            */
            return $preparedFiles;
        }
        else
            return null; // Gdy null wyświetlić np brak plików tego rodzaju :c

        //return $fManager -> LoadFiles($infoCategory[0]);
    }
?>