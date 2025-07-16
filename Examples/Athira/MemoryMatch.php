<?php
class MemoryMatch {

    public $cards;
    public $matched;

    function __construct() {
        $this->cards = ['A', 'A', 'B', 'B', 'C', 'C', 'D', 'D'];
        shuffle($this->cards);
        $this->matched = array_fill(0, 8, false);
    }

    public function display() {
        echo "MEMORY GAME\n";
        foreach ($this->cards as $index => $card) {
            if ($this->matched[$index]) {
                echo "[" . $card . "] ";
            } else {
                echo "[" . ($index + 1) . "] ";
            }
        }
        echo "\n";
    }

    public function game() {
        $matches = 0;

        while ($matches < 4) {
            $this->display();

            $number1 = (int)readline("Enter the first number to check : ");
            $number2 = (int)readline("Enter the second number to check : ");

            $index1 = $number1 - 1;
            $index2 = $number2 - 1;
            if ($this->cards[$index1] == $this->cards[$index2]) {
                echo "It's a MATCH!\n";
                $this->matched[$index1] = true;
                $this->matched[$index2] = true;
                $matches++;
            } else {
                echo "Not a match. Try again.\n";
            }

            echo "\n";
        }

        echo "Congratulations! You matched all pairs!\n";
    }
}

$object = new MemoryMatch();
$object->game();
