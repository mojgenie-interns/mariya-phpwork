<?php

class DigitalClock{


    function __construct()
    {
        date_default_timezone_set("Asia/Kolkata");
    }

    public function digitalClock(){

        echo "The current time is : " . date("h:i:s A") . "";
    }
}

$time = new digitalClock();
$time->digitalClock();