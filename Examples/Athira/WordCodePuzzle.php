<?php

class WordPuzzle {

    public $original;
    public $puzzle;
    public $missing = [];

    public function __construct() {
        $words = ["ELEPHANT", "PUZZLE", "MOUNTAIN", "CROCODILE", "BICYCLE"];
        $this->original = strtoupper($words[array_rand($words)]);
        $this->createPuzzle();
    }

    public function createPuzzle() {
        $this->puzzle = str_split($this->original);
        $indices = array_rand($this->puzzle, min(3, floor(strlen($this->original)/2)));

        if (!is_array($indices)) {
            $indices = [$indices];
        }

        foreach ($indices as $i) {
            $this->missing[$i] = $this->puzzle[$i];
            $this->puzzle[$i] = "_";
        }
    }

    public function displayPuzzle() {
        echo "\nWord: " . implode(" ", $this->puzzle) . "\n";
    }

    public function guessLetter($letter) {
        $letter = strtoupper($letter);
        $found = false;

        foreach ($this->missing as $index => $value) {
            if ($letter == $value) {
                $this->puzzle[$index] = $letter;
                unset($this->missing[$index]);
                $found = true;
                echo "Correct guess.\n";
                break;
            }
        }

        if (!$found) {
            echo "Incorrect guess. Try again.\n";
        }
    }

    public function isComplete() {
        return empty($this->missing);
    }
}


$puzzle = new WordPuzzle();

echo "Welcome to the Word Puzzle Game!\n";

while (!$puzzle->isComplete()) {
    $puzzle->displayPuzzle();
    $guess = readline("Guess a missing letter: ");
    if (strlen($guess) != 1 ) {
        echo "Please enter a single alphabet letter.\n";
        continue;
    }
    $puzzle->guessLetter($guess);
}

echo "\nCongratulations! You completed the word: " . $puzzle->original . "\n";
