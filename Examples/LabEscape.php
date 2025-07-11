<?php

class LabEscape {

    public $puzzle = [];

    function __construct() {
        $this->puzzle = [
            [
                "question" => "What is the chemical symbol for Gold?",
                "options" => ["Au", "Ag", "Gu", "Ar"],
                "answer" => "Au"
            ],
            [
                "question" => "Which planet is known as the Red Planet?",
                "options" => ["Venus", "Mars", "Jupiter", "Mercury"],
                "answer" => "Mars"
            ],
            [
                "question" => "Name the largest planet.",
                "options" => ["Earth", "Jupiter", "Mars", "Saturn"],
                "answer" => "Jupiter"
            ],
            [
                "question" => "What part of the cell contains the genetic material?",
                "options" => ["Cytoplasm", "Ribosome", "Nucleus", "Mitochondria"],
                "answer" => "Nucleus"
            ],
            [
                "question" => "What gas do plants absorb from the atmosphere?",
                "options" => ["Oxygen", "Nitrogen", "Carbon Dioxide", "Hydrogen"],
                "answer" => "Carbon Dioxide"
            ]
        ];
    }

    public function escape() {
        $index = array_rand($this->puzzle);
        $question = $this->puzzle[$index];

        echo "\nPuzzle: " . $question['question'] . "\n";

        foreach ($question['options'] as $key => $option) {
            echo ($key + 1) . ") $option\n";
        }

        return $question;
    }

    public function introduction() {
        echo "==========Welcome to Lab Escape============\n";
        $player = readline("Enter your name:\n");

        echo "\n$player, you are locked inside a lab.\n";
        echo "To escape, solve the following puzzles.\n";

        

        $question1 = $this->escape();
        $answer1 = readline("Enter your answer :\n");
        

        if ($answer1 === $question1['answer']) {
            echo "\nCorrect. You passed the first door.\n";
            echo "You are now in the next room. Solve one more puzzle to escape.\n";

            
            $question2 = $this->escape();
            $answer2 = readline("Enter your answer :\n");

            if ($answer2 === $question2['answer']) {
                echo "\nYou solved both puzzles and escaped the lab successfully.\n";
            } else {
                echo "\nWrong answer. You failed to escape the second room.\n";
            }

        } else {
            echo "\nWrong answer. You failed to unlock the first door.\n";
        }
    }
}

$object = new LabEscape();

$object->introduction();

