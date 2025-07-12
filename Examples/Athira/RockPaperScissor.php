<?php

class RockPaperScissor{

    public $list = [];

    public $player;

    function __construct()
    {
        $this->list = ['ROCK','PAPER','SCISSOR'];
        $this->player = readline("Enter your name:");

    }

    public function game(){

        $random = $this->list[array_rand($this->list)];
        

        $choice = strtoupper(readline("$this->player Please enter your move :"));
        echo " \n Computer move : $random \n";


        if ($random == ($choice)){

            echo "Its a draw \n";
            return;

        }elseif (($choice) == 'ROCK' && $random == 'SCISSOR' || ($choice) == 'PAPER' && $random == 'ROCK' ||($choice) == 'SCISSOR' && $random == 'PAPER'){

            echo "$this->player WINS ";
            exit;
        }else{

            echo "COMPUTER WINS";
            exit;

        }
    }

}

$object = new RockPaperScissor();
$object->game();
