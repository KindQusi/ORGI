<?php
/*
    TODO
    - Przenieść zapisywanie pliku z addingFiles.php
*/
class fileManager
{

    public function LoadFiles($category)
    {
        try
        {
            include 'GlobalVariables.php';
            
            if ( empty($category) )
                //throw new Exception("Pusta kategoria");
                return null;
            
            $files  = null;
            $dir    = null;
            switch ($category)
            {
                case $categoryPhoto:
                    $dir = $photosUploadFolder;
                    break;
            }
            if ( empty($dir) )
                //throw new Exception("Brak takiej kategori: " . $_POST[$category_ChooseCategoryForm] );
                return null;

            $files = array_diff(scandir($dir), array('..', '.'));
            $files [0] = $dir;
            //$files = array_values($files);

            if ( !empty($files) )
            {
                return $files;
            }   
            else
                //throw new Exception("Nie znaleziono plików");
                return null;
        }

        catch(Exception $e)
        {
            echo $e;
        }
    }

}
?>