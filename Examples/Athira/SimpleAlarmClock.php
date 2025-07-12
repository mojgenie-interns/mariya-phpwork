<?php
class SimpleAlarmClock{

    public $alarm;
    
    function __construct()
    {
        date_default_timezone_set("Asia/Kolkata");
        $input = readline("Enter the alarm time (HH:MM) : ");
        $this->alarm = str_replace(' ', '', $input);
    }


    public function alarmSet(){

        while (true){

            $time = date("H:i");
            if ($this->alarm == $time )
            {
                echo " WAKE UP !!!!!!!!!!!!!!!!!\n";
                break;
            }

            sleep(1);
        }
    }
}

$object = new SimpleAlarmClock();
$object->alarmSet();
