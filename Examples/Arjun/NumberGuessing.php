<?php
class NumberGuessing{

    public $number;
    public $count;

    function __construct()
    {
        $this->number = 61;
        $this->count = 0;

    }

    public function guessNumber(){

        while(true){

        $guess = readline("Enter the number you Guessed:");
        if ($guess == $this->number){

            echo "Correct\n";
            echo "Number correctly Guessed in  $this->count steps";
            exit;

        }elseif ($guess < $this->number){

            echo "The original number is greater then $guess \n";
        }else{
            echo "The original number is smaller then $guess \n";
        }
        $this->count++;

        }
        
    }
}

$object = new NumberGuessing();
$object->guessNumber();
