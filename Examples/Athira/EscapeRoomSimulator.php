<?php
class EscapeRoom{

    public $puzzle;

    function __construct()
    {
        $this->puzzle = [
            'question' => "What does CSS stand for?",
            'answer' => 'Cascading Style Sheets'
        ];
    }

    public function escapeRoomGame(){
        echo "=====WELCOME======\n";
        echo "You are in a locked room.\nYou see a table, a drawer, and a door.\nWhat do you want to do?\n";

        while(true){
            echo "1. Look at table \n2. Open drawer \n3. Try the door \n4. Quit\n";
            $choice = readline("Enter your choice: ");

            if ($choice == 1){
                echo "You find a note: 'The key is in the drawer.'\n";

            } elseif ($choice == 2) {
                $code = readline("The drawer is locked. Try a 3-digit code: ");
                if($code == 123){
                    echo "Drawer opens. You found a key!\n";
                    echo "You opened the door... You escaped!\n";
                    exit;
                } else {
                    echo "Wrong code. Try again.\n";
                }

            } elseif ($choice == 3) {
                echo "You need to answer the puzzle to escape\n";
                echo "Q: " . $this->puzzle['question'] . "\n";
                $userAns = readline("A: ");
                if (strtolower(trim($userAns)) == strtolower($this->puzzle['answer'])) {
                    echo "You unlocked the door and escaped!\n";
                } else {
                    echo "Wrong answer. You're still locked in.\n";
                }
                exit;

            } elseif ($choice == 4) {
                echo "Game exited.\n";
                exit;

            } else {
                echo "Invalid option.\n";
            }
        }
    }
}

$game = new EscapeRoom();
$game->escapeRoomGame();
