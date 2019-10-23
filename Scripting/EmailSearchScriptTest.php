<?php
    require_once('Infusionsoft/infusionsoft.php');

    $contactArray = array("Random");
    $curr;
    foreach($contactArray as $curr)
    {
        $contacts = Infusionsoft_DataService::query(new Infusionsoft_Contact(), array('_TotalGuestsAttending1' => $curr));
        if(count($contacts) != 0)
        {
            echo "\nUser:\t$curr\n";
            foreach($contacts as $contact)
            {
                    echo $contact->Id."\n";
            }
            echo "\n";
        }
    }   
?>