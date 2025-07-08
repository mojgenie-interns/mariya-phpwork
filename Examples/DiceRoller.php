<?php
   class Dice{

    public $roll;
    function __construct()
    {
        $this->roll = readline("Type roll for roll the dice\n");

    }
    public function rollDice(){
        if ($this->roll == strtolower($this->roll)){

        $this->roll = rand(1 , 6);

        echo "You rolled : $this->roll";
        }


    }

   }

   $object = new Dice();
   $object->rollDice();