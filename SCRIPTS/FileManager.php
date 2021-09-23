<?php
/*
    TODO
    - Przenieść zapisywanie pliku z addingFiles.php
*/
class fileManager
{

    public function LoadFiles($targetDir)
    {
        try
        {
            include 'GlobalVariables.php';
            
            $files  = null;
            $dir    = $targetDir;

            if ( empty($dir) )
                return null;

            $files = array_diff(scandir($dir), array('..', '.'));
            $files [0] = $dir;
            //$files = array_values($files);

            if ( !empty($files) )
            {
                return $files;
            }   
            else
                return null;
        }

        catch(Exception $e)
        {
            echo $e;
        }
    }

    
}
?>