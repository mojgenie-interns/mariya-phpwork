<?php
     class  Magic{

        public $question;

        publiC function magicBall(){

            $this->question = readline("Enter your question:\n");

            $random = rand(1,9);

            if ($random == 1){

                echo "It is certain.\n";

            }elseif  ($random == 2){

                echo "Reply hazy, try again.\n";

            }elseif ($random == 3){

                echo "Ask again later.\n";

            }elseif  ($random == 4){

                echo "My sources say no.\n"; 

            } elseif($random == 5){

                echo "Very doubtful.\n";
            }elseif  ($random == 6){

                echo "Without a doubt.\n";

            }elseif  ($random == 7){

                echo "Don’t count on it.\n";

            }elseif ($random == 8){

                echo "You may rely on it.\n";

            }elseif ($random == 9){

                echo "Cannot predict now.\n";

            }
        }

     }

    $object = new Magic();
    $object->magicBall();
