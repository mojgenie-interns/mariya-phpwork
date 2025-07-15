<?php
class Hangman {
    public $word;
    public $guessedLetters = [];

    function __construct() {
        $this->word = strtoupper('DanCastellaneta');
    }

    public function playHangman() {
        $letters = str_split($this->word);
        $len = strlen($this->word);
        $correctGuesses = array_fill(0, $len, false);

        while (true) {
            
            $this->displayWord($letters, $correctGuesses);
            $guess = strtoupper(trim(readline("Enter a letter: ")));
          
            $isCorrect = false;
            for ($i = 0; $i < $len; $i++) {
                if ($letters[$i] === $guess) {
                    $correctGuesses[$i] = true;
                    $isCorrect = true;
                }
            }

            if (!$isCorrect) {
                echo "Incorrect guess!\n";
            }

            
            if (array_sum($correctGuesses) === $len) {
                $this->displayWord($letters, $correctGuesses);
                echo "Congratulations! You won!\n";
                return;
            }
        }
    }

    public function displayWord($letters, $correctGuesses) {
        foreach (array_keys($letters) as $i) {
            if ($correctGuesses[$i]) {
                echo $letters[$i] . " ";
            } else {
                echo "_ ";
            }
        }
        echo "\n";
    }
}

$object = new Hangman();
$object->playHangman();
?>