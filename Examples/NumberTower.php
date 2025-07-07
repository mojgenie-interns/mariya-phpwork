<?php   

    class NumberTower{

        public $row;
        public $numberArray =[];
        public function __construct()
        {
            $this->row = readline("Enter the number of row\n");

        }

        public function getNumber(){

            for ($i = 0; $i < $this->row; $i++){
                for($j = 0; $j <= $i; $j++){

                    $number = readline( "Enter the ". $i + 1 ." row elements\n");
                    $this->numberArray[$i][$j] = $number;
                }
            }
        }

        public function display(){

            for ($i = 0; $i < $this->row; $i++){
                for($j = 0; $j <= $i; $j++){

                    echo "\t".$this->numberArray[$i][$j];
                    
                }
                echo "\n";
            }
        }
    }
    $object = new NumberTower();
    $object->getNumber();
    echo "----------------------------\n";
    $object->display();

    