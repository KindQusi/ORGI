<?php
    require_once 'GlobalVariables.php';
    require_once 'database.php';
    require_once 'Switch.php';
    require_once 'accounts.php';

    session_start();
    
    if( isset( $_SESSION[$isLogged] ) && isset( $_POST[$category_ChooseCategoryForm]) )
    {
        try
        {   

            // Dodać flagę aby sprawdzić ponownie jak użytkownik doda plik
            if ( !isset( $_SESSION[$userCounter]) || isset ($_SESSION[$addedFile_Flag]) )
            {
                if( isset($_SESSION[$addedFile_Flag]) )
                    unset($_SESSION[$addedFile_Flag]);

                $user = $_SESSION[$userCredits];
                $userID = $user->GetUserId();   

                $query = 
                "SELECT 
                `{$SumOfPhoto_UsersTable}`,
                `{$SumOfEfect_UsersTable}`,
                `{$SumOfBgmusic_UsersTable}`,
                `{$SumOfPlay_UsersTable}`,
                `{$SumOfReportage_UsersTable}`,
                `{$SumOfColumns_UsersTable}`,
                `{$SumOfStories_UsersTable}`,
                `{$SumOfPoem_UsersTable}`
                FROM 
                `{$usersTable}`
                WHERE
                `{$id_UsersTable_Col}` = '{$userID}'
                ";

                $db = new Database();

                $result = $db->query($query);

                if($result -> num_rows > 0)
                {
                    foreach( $result as $i => $record)
                    {
                        $_SESSION[$userCounter][$SumOfPhoto_UsersTable]     = $record[$SumOfPhoto_UsersTable];

                        $_SESSION[$userCounter][$SumOfEfect_UsersTable]     = $record[$SumOfEfect_UsersTable];
                        $_SESSION[$userCounter][$SumOfBgmusic_UsersTable]   = $record[$SumOfBgmusic_UsersTable];
                        $_SESSION[$userCounter][$SumOfPlay_UsersTable]      = $record[$SumOfPlay_UsersTable];
                        $_SESSION[$userCounter][$SumOfReportage_UsersTable] = $record[$SumOfReportage_UsersTable];
                        
                        $_SESSION[$userCounter][$SumOfColumns_UsersTable]   = $record[$SumOfColumns_UsersTable];
                        $_SESSION[$userCounter][$SumOfStories_UsersTable]   = $record[$SumOfStories_UsersTable];
                        $_SESSION[$userCounter][$SumOfPoem_UsersTable]      = $record[$SumOfPoem_UsersTable];
                    }          
                }
                else 
                {
                    // Nie mamy informacji o użytkowniku 
                    // Nie może wejść
                    throw new Exception("Brak informacji o użytkowniku");
                }
            }
            
            // Gdy mamy już ilość wrzutek użytkownika
            $flag = false;

            $howMany = 0;

            switch ($_POST[$category_ChooseCategoryForm]) {
                //Photos
            case $photoType_AddFileForm:
                if ($_SESSION[$userCounter][$SumOfPhoto_UsersTable] >= $minUploadForBrowser)
                    $flag = true;
                else
                    $howMany = $_SESSION[$userCounter][$SumOfPhoto_UsersTable];
                break;
                //Sounds
            case $efectType_AddFileForm:
                if ($_SESSION[$userCounter][$SumOfEfect_UsersTable] >= $minUploadForBrowser)
                    $flag = true;
                else
                    $howMany = $_SESSION[$userCounter][$SumOfEfect_UsersTable];
                break;
            case $bgmusicType_AddFileForm:
                if ($_SESSION[$userCounter][$SumOfBgmusic_UsersTable] >= $minUploadForBrowser)
                    $flag = true;
                else
                    $howMany = $_SESSION[$userCounter][$SumOfBgmusic_UsersTable];
                break;
            case $playType_AddFileForm:
                if ($_SESSION[$userCounter][$SumOfPlay_UsersTable] >= $minUploadForBrowser)
                    $flag = true;
                else
                    $howMany = $_SESSION[$userCounter][$SumOfPlay_UsersTable];
                break;
            case $reportageType_AddFileForm:
                if ($_SESSION[$userCounter][$SumOfReportage_UsersTable] >= $minUploadForBrowser)
                    $flag = true;
                else
                    $howMany = $_SESSION[$userCounter][$SumOfReportage_UsersTable];
                break;
                //Txt
            case $columnsType_AddFileForm:
                if ($_SESSION[$userCounter][$SumOfColumns_UsersTable] >= $minUploadForBrowser)
                    $flag = true;
                else
                    $howMany = $_SESSION[$userCounter][$SumOfColumns_UsersTable];
                break;
            case $storiesType_AddFileForm:
                if ($_SESSION[$userCounter][$SumOfStories_UsersTable] >= $minUploadForBrowser)
                    $flag = true;
                else
                    $howMany = $_SESSION[$userCounter][$SumOfStories_UsersTable];
                break;
            case $poemType_AddFileForm:
                if ($_SESSION[$userCounter][$SumOfPoem_UsersTable] >= $minUploadForBrowser)
                    $flag = true;
                else
                    $howMany = $_SESSION[$userCounter][$SumOfPoem_UsersTable];
                break;     
            
                // Dodać kolejne kategorie
            }
            
            if ($flag == false)
            {
                throw new Exception("Nie spełniasz warunków. W kategori ". $_POST[$category_ChooseCategoryForm]. ' wrzuciłeś: ' . $howMany . ' a wymagamy: '. $minUploadForBrowser);
                // Nie może wejść
                // Wyświetlić może np 4/5?
            }
            else 
            {
                // Może wejść
                $_SESSION[$typeFile_CheckUser] = $_POST[$category_ChooseCategoryForm];
                header('Location: ../PHP/Browser.php?page=1');
            }      
        }
        catch(Exception $e)
        {
            echo $e;
        }
    }
    else
    {
        // nie zalogowany
        header('Location: ../PHP/LogRegForm2.php');
    }
    
?>