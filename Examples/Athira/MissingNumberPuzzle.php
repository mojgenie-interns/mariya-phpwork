<?php

class MissingNumber{

    public $series = [];
    public $answer;

    function __construct()
    {
        $this->series = ['11', '26', '47', '_' , '107','146'];
        $this->answer = 74;
    }

    public function findNumber(){

        echo "Find the Missing Number ----\n";

        foreach ($this->series as $q){

            echo  $q .",";
        }
        echo "\n";
        $yourAns = readline("Enter your answer:");
        if ($this->answer == $yourAns){

            echo "Congratulations****\n";
            exit;

        }

        echo "wrong \n";
        exit;
    }
}

$object = new MissingNumber();
$object->findNumber();
