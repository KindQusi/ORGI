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
        // Startujemy od 0 i następne strony od konkretnego indexu
        // str 1 index 0,1
        // str 2 index 2,3 itp.
        $startFrom = 0 + ( ($page - 1) * $maxDisplayedFilesInBrowser);

        $infoCategory = WhatCategory($category);
        // Tablica informacji
        // 0 - Target_dir
        // 1 - Target_table  
        $target_dir = $infoCategory[0];
        $target_table = $infoCategory[1];

        // if ($target_dir == null || $target_table == null)
        //     throw new Exception($target_table.' '.$target_dir);

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
                ASC 
                LIMIT ".$startFrom.','.$maxDisplayedFilesInBrowser;              
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
                `{$Tag_UploadsTable_Col}`  = '{$tag}'
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
                ORDER BY
                `{$fileName_UploadsTable_Col}`
                ASC 
                LIMIT ".$startFrom.','.$maxDisplayedFilesInBrowser; 
        }

        $result = $db ->query($query);

        if ($result -> num_rows > 0)
        {
            /*  
                v2
                    To pozwoli od razu przypisac np tekstowi domyslna ikonke
                    tak aby w browserze tylko powstawiać linki w odpowiednie miejsca
                [0][0] Sciezka do obrazka
                [0][1] Sciezka do pobrania  dir.id.type
                [0][2] Oryginalna nazwa
                [0][3] Opis pliku
                [0][4] Typ pliku ( Rozszerzenie )
                [0][5][0 - 5] Tagi?
                [0][6] ID pliku
                TODO
                [0][] Nazwa autora?
                [0][] Ilosc pobran?
                [0][] Ilosc polubień?

            */
            
            foreach ( $result as $i => $file )
            {
                // Narazie tylko dla obrazka 
                // sciezka obrazka = sciezka pobrania
                if ($category == $categoryPhoto)
                {
                    $preparedFiles[$i][0] = $target_dir.$file[$fileID_UploadsTable_Col].'.'.$file[$typeFile_UploadsTable_Col];
                }
                else 
                {
                    // Domyślny obrazek narazie logo
                    $preparedFiles[$i][0] = '../Photos/orgilogo_białe.png';
                }
                $preparedFiles[$i][1] = $target_dir.$file[$fileID_UploadsTable_Col].'.'.$file[$typeFile_UploadsTable_Col];
                $preparedFiles[$i][2] = $file[$fileName_UploadsTable_Col]; // Usunąć rozszerzenie?
                $preparedFiles[$i][3] = $file[$descr_UploadsTable_Col];
                $preparedFiles[$i][4] = $file[$typeFile_UploadsTable_Col];
                $preparedFiles[$i][5] = $file[$Tag_UploadsTable_Col];
                $preparedFiles[$i][6] = $file[$fileID_UploadsTable_Col];
                
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