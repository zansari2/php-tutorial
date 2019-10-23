<?php
    require_once('Infusionsoft/infusionsoft.php');

    $contactArray = array("barbara.humpton@siemensgovt.com","clansburgh@edgesource.com","don@360livemedia.com","edean@whereoware.com","hlanda@optimalnetworks.com","hwest@mmgct.com","jcl@edgesource.com","joe.m@lookthink.com","joe@lookthink.com","jones@vion.com","jphilbin@crisis1.com","JRalston@HighPurity.com","lself@executiveforums.com","mgiliberti@nami.org","sberenzweig@berenzweiglaw.com","SChodakewitz@nathaninc.com","sdaves@rwmurray.com","smartin@tsi4usa.com","tina.dolph@siemensgovt.com");
    $curr;
    foreach($contactArray as $curr)
    {
        $contacts = Infusionsoft_DataService::query(new Infusionsoft_Contact(), array('Email' => $curr));
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