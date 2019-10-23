<?php
    require_once('Infusionsoft/infusionsoft.php');

    $contactArray = array("%@fake%");
    $curr;
    foreach($contactArray as $curr)
    {
        $contacts = Infusionsoft_DataService::query(new Infusionsoft_Contact(), array('Email' => $curr));
        if(count($contacts) != 0)
        {
            echo "\nUser:\t$curr\n";
            foreach($contacts as $contact)
            {
                    echo $contact->Id."\t";
                    echo $contact->Email."\n";
                    $contact->Email = "";
                    $contact->save();
            }
            echo "\n";
        }
    }   
?>