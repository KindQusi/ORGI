<?php
    function WhatCategory (string $category)
    {
        include 'GlobalVariables.php';

        $target_dir = null;
        $target_table = null;

        switch ($category) {
            //Photos
        case $photoType_AddFileForm:
            $target_table   = $photosUploadTable;
            $target_dir     = $photosUploadFolder;
            break;
            //Sounds
        case $efectType_AddFileForm:
            $target_table   = $efectUploadTable;
            $target_dir     = $efectUploadFolder;
            break;
        case $bgmusicType_AddFileForm:
            $target_table   = $bgmusicUploadTable;
            $target_dir     = $bgmusicUploadFolder;
            break;
        case $playType_AddFileForm:
            $target_table   = $playUploadTable;
            $target_dir     = $playUploadFolder;
            break;
        case $reportageType_AddFileForm:
            $target_table   = $reportageUploadTable;
            $target_dir     = $reportageUploadFolder;
            break;
            //Txt
        case $columnsType_AddFileForm:
            $target_table   = $columnsUploadTable;
            $target_dir     = $columnsUploadFolder;
            break;
        case $storiesType_AddFileForm:
            $target_table   = $storiesUploadTable;
            $target_dir     = $storiesUploadFolder;
            break;
        case $poemType_AddFileForm:
            $target_table   = $poemUploadTable;
            $target_dir     = $poemUploadFolder;
            break;
        
        // Dodać kolejne kategorie
    }

        // Zwracamy wynik
        return array($target_dir , $target_table);
    } 
?>
