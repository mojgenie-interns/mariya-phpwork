<?php

class  Factorial{

    public $number;

    function __construct($number)
    {
        $this->number = $number;
    }

    public function factorial()
    {
        $fact = $this->number;
        $x = $fact-1;
        while($x != 0){
        $fact = $fact * $x;
        $x--;
        }
        echo " $this->number ! = " . $fact. "";
    }

    
}

$number = readline("Enter the number:");

$object = new Factorial($number);

$object->factorial();

