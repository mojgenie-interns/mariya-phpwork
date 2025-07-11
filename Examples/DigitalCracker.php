<?php

class DigitalLockCracker
{
    private $secretCode = [];
    private $attempts = 0;

    public function __construct()
    {
        
        $this->secretCode = [4, 8, 3, 1];
    }

    private function getHint($guess)
    {
        $guessDigits = str_split($guess);
        $correctPlace = 0;
        $correctDigit = 0;

        $usedInSecret = [];
        $usedInGuess = [];

        
        for ($i = 0; $i < 4; $i++) {
            if ($guessDigits[$i] == $this->secretCode[$i]) {
                $correctPlace++;
                $usedInSecret[$i] = true;
                $usedInGuess[$i] = true;
            }
        }

        
        for ($i = 0; $i < 4; $i++) {
            if (isset($usedInGuess[$i])) continue;
            for ($j = 0; $j < 4; $j++) {
                if (isset($usedInSecret[$j])) continue;
                if ($guessDigits[$i] == $this->secretCode[$j]) {
                    $correctDigit++;
                    $usedInSecret[$j] = true;
                    break;
                }
            }
        }

        return [$correctDigit + $correctPlace, $correctPlace];
    }

    public function play()
    {
        echo "Welcome to Digital Lock Cracker\n";

        while (true) {
            $guess = readline("Enter your 4-digit guess: ");

            
            if (strlen($guess) != 4 ) {
                echo "Invalid input. Enter exactly 4 numeric digits.\n";
                continue;
            }

            $this->attempts++;

            if ($guess == implode('', $this->secretCode)) {
                echo "Unlocked! You cracked the code in $this->attempts attempts.\n";
                break;
            }

            list($correctDigits, $correctPlace) = $this->getHint($guess);
            echo "Hint: $correctDigits digit(s) correct.\n";
        }
    }
}

$object = new DigitalLockCracker();
$object->play();
