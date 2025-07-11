<?php
class TreasureHunt {

    public $correctDirection;

    public function __construct() {
        
        $this->correctDirection = rand(1, 4);
    }

    public function menu() {
        echo "========== WELCOME TO TREASURE HUNT ==========\n";
        echo "Find the treasure by choosing the correct direction.\n";
        echo "First guess must be correct. Then survive 3 more correct turns!\n";

        $first = $this->getGuess("Turn 1");

        if ($first == $this->correctDirection) {
            echo "Correct! Now survive 3 more turns...\n";

            for ($i = 2; $i <= 4; $i++) {
                $next = $this->getGuess("Turn $i");

                if ($next != $this->correctDirection) {
                    echo "Wrong direction on turn $i. Game Over.\n";
                    return;
                }
            }

            echo "You made 4 correct moves! You found the treasure!\n";

        } else {
            echo "Wrong guess on the first turn. Game Over.\n";
        }
    }

    public function getGuess($turnLabel) {
        echo "$turnLabel: Choose a direction\n";
        echo "1. North\n2. South\n3. East\n4. West\n";
        $input = readline("Your choice: ");

        while (!in_array($input, ['1', '2', '3', '4'])) {
            $input = readline("Invalid input. ");
        }

        return (int)$input;
    }
}


$object = new TreasureHunt();
$object->menu();
