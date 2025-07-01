<?php
    //creating associative array
    $animals=array("birds"=>"hen","fish"=>"golden fish",);


    foreach ($animals as $x=>$y)
    {
        echo "$x : $y\n";
    }

    $animals["mammals"]="cow";

     foreach ($animals as $x=>$y)
    {
        echo "$x : $y\n";
    }

?>