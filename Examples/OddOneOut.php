<?php

    class OddOne{

        public $cubes = [ ];
        public $square = [];

        function __construct()
        {
            $this->cubes = [

                8, 27, 64, 100, 125, 216, 343,
            ];

            $this->square = [
                1, 4, 9, 16, 25, 36, 49, 65, 81, 100
            ];
        }

        public function findOddOne(){

            echo "The  Question is : \n";

            echo "A--";

            foreach ($this->cubes as $cube){

                echo "" . $cube .",";
            }
            
            echo "\n B--";

            foreach ($this->square as $sq){

                echo "" . $sq .",";
            }
            
            $a = readline("\nEnter the answer for A :");

            if ($a == 100 ){

                echo " Correct  !!!!!\n";

            }
            else {
                echo "Wrong\n";
                
            }

            $b = readline( "Enter the answer for B :\n");

            if ($b == 65){

                echo "Correct Answer !!!!!\n";

            }
            else {
                echo "Wrong\n";
                
            }
        }  

    }

    $object = new OddOne();

    while (true)
    {
        $object->findOddOne();

        $choice = readline("Do you wnat to continue(Y / N ):\n");

        if ( strtolower($choice) == 'n'){

            echo "Thank You...\n";

            exit;

        }
    }

?>