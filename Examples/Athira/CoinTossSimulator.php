<?php

class CoinToss{

    public $guess;
    public $random;
    public $coin = [];

    function __construct()
    {
        $this->guess = strtoupper(readline("Enter your guess:"));
        $this->coin = ['HEAD','TAIL'];
    }


    public function  coinToss(){

        $this->random = $this->coin[array_rand($this->coin)];
        if ($this->random == $this->guess){

            echo "Your Guess is correct....";
        }
        else {

            echo "it's a $this->random ";
        }

    }
}

$toss = new coinToss();
$toss->coinToss();