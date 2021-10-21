<?php
    session_start();
    
    require_once 'GlobalVariables.php';

    if (isset($_POST[$fileID]) && isset($_POST[$fileCategory])) 
    {
        UpdateDownloadCounter($_POST[$fileID],($_POST[$fileCategory]));
    }
    else 
    {
        header('Location: ../PHP/Welcome.php');
    }

    function UpdateDownloadCounter(int $id , string $category)
    {
        include 'GlobalVariables.php';
        include 'database.php';
        include 'Switch.php';
        try
        {
            if ( $id < 0 && $category == null)
                throw new Exception("Wrong id or category");

            // Czy jest lista rzeczy pobranych
            if( !isset($_SESSION[$DownloadedIDs]))
                $_SESSION[$DownloadedIDs] = [];

            // Jezeli uzytkownik juz to pobral, nie zwiekszamy ponownie ilosci pobran
            //if( !in_array ($id,$_SESSION[$DownloadedIDs]) )
            //{  
                //$_SESSION[$DownloadedIDs][] = $id;
                
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
                    //throw new Exception("Wykonano?");
                    header('Location: ../PHP/Browser.php');
                }
            //}     
        }
        catch(Exception $e)
        {
            echo $e;
        }
    }
   
?>