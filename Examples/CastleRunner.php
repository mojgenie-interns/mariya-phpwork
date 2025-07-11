<?php

class CastleRunner {
    private $position = 0;
    private $goal = 5; 
    private $health = 3;

    public function play() {
        echo "Castle Runner - Escape the castle in {$this->goal} steps!\n";
        $name =  readline("Enter your name\n");

        while ($this->position < $this->goal && $this->health > 0) {

            echo "\nYou are at step {$this->position}. Health: {$this->health}\n";

            if ($this->askQuestion()) {
                echo "$name you escaped the trap and moved forward!\n";
                $this->position++;
            } else {
                $this->health--;
                echo "Wrong answer! You got hurt. Health now: {$this->health}\n";
            }
        }

        if ($this->position >= $this->goal) {
            echo "\nYou escaped the castle. Victory!\n";
        } else {
            echo "\n Game over.\n";
        }
    }

    private function askQuestion() {
        $questions = [
            "What is 2 + 2?" => "4",
            "What is the capital of France?" => "Paris",
            "What color is the sky on a clear day?" => "Blue",
            "What is 6 divided by 3?" => "2",
            "What is the opposite of hot?" => "Cold"
        ];

        $question = array_rand($questions);
        $answer = readline("Trap Question - $question ");

        return strtolower(trim($answer)) === strtolower($questions[$question]);
    }
}

$game = new CastleRunner();
$game->play();
