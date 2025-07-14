<?php

class ThreeDoor{

    public $door = [];

    function __construct()
    {
        $values = ['GOAT', 'GOAT', 'CAR'];
        shuffle($values);
        $this->door = array_combine(['A', 'B', 'C'], $values);


    }

    public function PlayThreeDoor(){

        foreach ($this->door as $key => $value) {
            echo "Door: $key\n";
        }
        $choose =strtoupper(readline("Choose your Door:"));

        echo "OK player you choose Door $choose :\n";
        echo "To help you i will open a door which contain GOAT \n";


        $goatDoors = [];
        foreach ($this->door as $key => $value) {
            if ($value == 'GOAT' && $key != $choose) {
                $goatDoors[] = $key;
            }
        }
        $openDoor = $goatDoors[array_rand($goatDoors)];

        echo "In $openDoor it's a GOAT\n";


        echo "1.Change the option \n2.Choose the previous selected one\n";
        $choice = readline("Enter your choice:\n");
        if ($choice == 1){

             foreach ($this->door as $key => $value) {

                if ($key != $choose && $key != $openDoor) {
                    $lock = $key;
                    break;
                }
             }

        }else{
            $lock = $choose;
         }

        if ($this->door[$lock] == 'CAR'){

            echo "YOU WIN";
        }else{
            echo "FAILED";
        }

    }
}

$object = new ThreeDoor();
$object->PlayThreeDoor();