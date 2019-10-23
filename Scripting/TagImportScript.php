<?php
    require_once('Infusionsoft/infusionsoft.php');
    $filename = 'TagImport.csv';

    // The nested array to hold all the arrays
    $the_big_array = []; 
    
    // Open the file for reading
    if (($h = fopen("{$filename}", "r")) !== FALSE) 
    {
      // Each line in the file is converted into an individual array that we call $data
      // The items of the array are comma separated
      while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
      {
        // Each individual array is being pushed into the nested array
        $the_big_array[] = $data;		
      }
    
      // Close the file
      fclose($h);
    }
    echo "<pre>\n";
    $contactId = 0;
    $groupId = 0;
    $cnt = 0;
    foreach($the_big_array as $arr){
        foreach($arr as $arr2){
            if($cnt == 0)
            {
                echo "\tContact: " . intval($arr2) . "\n" . "\tGroup: "; 
                $contactId = intval($arr2);
                $cnt = 1;
            }
            else
            {
                echo intval($arr2) . " <> ";
                $groupId = intval($arr2);
                if($contactId != 0 && $groupId != 0)
                {
                    Infusionsoft_ContactService::addToGroup($contactId, $groupId);
                }
            }    
        }
        echo "\n\n";
        $cnt = 0;
    }
    echo "</pre>";
?>