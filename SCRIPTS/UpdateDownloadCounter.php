<?php

    function UpdateDownloadCounter(int $id , string $category)
    {
        include 'GlobalVariables.php';
        include 'database.php';
        include 'Switch.php';
        try
        {
            if ( $id < 0 && $category == null)
                throw new Exception("Wrong id or category");
            
            $infoCategory = WhatCategory($category);
            

            if ($infoCategory == null)
                throw new Exception("Wrong category");
            // Tablica informacji
            // 0 - Target_dir
            // 1 - Target_table
            $target_table = $infoCategory[1];

            $query = 
            "UPDATE 
            `{$target_table}`
            SET
            `{$DownloadCounter_Col}` = '{$DownloadCounter_Col}' + 1
            WHERE
            `{$fileID_UploadsTable_Col}` = '{$id}'
            ";
            $db = new Database();
            if (!$db->query($query))
                throw new Exception("Problem with db");
            else
            {   
                echo ("Udało się zwiększyć licznik pobrań :)");
            }

            
        }
        catch(Exception $e)
        {
            echo $e;
        }

    }
?>