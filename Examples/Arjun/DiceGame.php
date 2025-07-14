<?php
class DiceRollerGame{

    public $score;
    public $rounds;
    public $roll;
    
    function __construct()
    {
        $this->rounds = 1;

    }

    public function rollDice(){
        
        $this->roll = rand(1 , 6);

    }

    public function play(){
        $mark1 =0;
        $mark2 = 0;

        while ($this->rounds <=  5){

            echo "ROUND $this->rounds !!!\n";

            echo "Player1 your chance click enter \n";
            readline();
            $this->rollDice();
            echo "DICE VALUE = $this->roll\n";
            $mark1 += $this->roll;

            echo "Player2 your chance click enter \n";
            readline();
            $this->rollDice();
            echo "DICE VALUE = $this->roll\n";

            $mark2 += $this->roll;

            $this->rounds++;
        }

        if ($mark1 == $mark2){
            echo "DRAW";
        }elseif ($mark1 < $mark2){
            echo "PLAYER2 WIN with total mark of $mark2";
        }else{
            echo "PLAYER1 WIN with total mark of $mark1";
        }
    }
}

$game = new DiceRollerGame();
$game->play();
