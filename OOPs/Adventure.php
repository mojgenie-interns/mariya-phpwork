<?php

class UtopiaGame {
    private $player;
    private $secretNumber = 34;

    public function start() {
        $this->greetPlayer();

        while (true) {
            $this->showMainMenu();
            $choice = readline("Make a choice (1 or 2): ");

            if ($choice == 1) {
                $this->forestHunt();
            } elseif ($choice == 2) {
                $this->makeAWish();
            } else {
                echo "Invalid choice. Please choose 1 or 2.\n";
            }
        }
    }

    public function greetPlayer() {
        echo "\t\t____WELCOME TO THE WORLD OF UTOPIA____\n";
        $this->player = readline("Enter the name of the player:\n");
        echo "HELLO '{$this->player}', WELCOME TO THE WORLD OF UTOPIA\n";
        echo "WE ARE SO GRATEFUL FOR YOUR PRESENCE\n";
        echo "\t\t\t\t!!! LET'S BEGIN !!!\n\n";
    }

    public function showMainMenu() {
        echo "1. FOREST HUNT\n";
        echo "2. MAKE A WISH\n";
    }

    public function forestHunt() {
        echo "GREAT CHOICE!\n";
        echo "\t\t{$this->player}, WELCOME TO FOREST HUNT\n";
        echo "** FOREST HUNT is a simple game where you have to find the right path to escape the PANANONA FOREST **\n";
        echo "Have a safe journey!!!\n";
        echo "-------------------------------------------------------\n";
        echo "{$this->player}, you entered the PANANONA forest.\n";
        echo "DO YOU WANT TO GO LEFT OR RIGHT?\n";
        echo "1. LEFT\n";
        echo "2. RIGHT\n";

        $ch = readline("{$this->player}, you choose: ");

        if ($ch == 1) {
            $this->tigerEncounter();
        } else {
            echo "You chose the wrong option. You died.\n";
            exit;
        }
    }

    public function tigerEncounter() {
        echo "You chose to go LEFT...\n";
        echo "(A few minutes later...) Oh no! {$this->player}, there's a tiger! What do you do?\n";
        echo "1. RUN\n";
        echo "2. KILL THE TIGER\n";

        $choice2 = readline("Enter a choice: ");

        if ($choice2 == 1) {
            $this->runFromTiger();
        } else {
            echo "YOU MADE THE RIGHT CHOICE!\n";
            echo "YOU KILLED THE TIGER. YOU WON THE GAME!!!!!!!\n";
            $this->askToContinue();
        }
    }

    public function runFromTiger() {
        echo "RUN {$this->player}, RUN!!!!!!!!!!!\n";
        echo "DO YOU WANT TO RUN TO THE NORTH OR TO THE EAST?\n";
        $run = readline("1. NORTH\n2. EAST\n");

        if ($run == 1) {
            echo "Oh NOOOOO {$this->player}, you took the wrong turn!\n";
            echo "Unfortunately, that path led to a mountain edge and you just died...\n";
            exit;
        } else {
            echo "You chose the wrong option.\n";
            echo "BAD LUCK {$this->player}, YOU LOST.\nTHIS IS A HUNTING GAME!\n";
            exit;
        }
    }

    public function askToContinue() {
        $ch1 = readline("Do you want to continue? (y/n): ");
        if (strtolower($ch1) != 'y') {
            echo "Goodbye {$this->player}!\n";
            exit;
        }
    }

    public function makeAWish() {
        echo "{$this->player}, Let's play MAKE A WISH\n";
        echo "You have 3 chances to guess the correct number(1-100).\n";
        echo "If you guess correctly, your wish will come true!\n";
        echo "-------------------- Let's Goooooooooooo ----------------\n";

        $wish = readline("MAKE A WISH: ");
        echo "OK, ARE YOU READY TO CHECK???\n";

        $chance = 1;

        while ($chance <= 3) {
            echo "Chance $chance:\n";
            $yourNumber = readline("Enter the secret number: ");

            if ($yourNumber == $this->secretNumber) {
                echo "CORRECT!\nYOUR WISH WILL COME TRUE \n";
                exit;
            } else {
                echo "BAD LUCK.....\n";
            }

            $chance++;
        }

        echo "Sorry {$this->player}, your wish did not come true. Better luck next time!\n";
        exit;
    }
}


$game = new UtopiaGame();
$game->start();
