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

        public function maximumTotal(){

            for ($i = $this->row - 2; $i >= 0; $i--) {
                for ($j = 0; $j <= $i; $j++) {
                    $this->numberArray[$i][$j] += max($this->numberArray[$i + 1][$j], $this->numberArray[$i + 1][$j + 1]);
                }
                //echo "MAXIMUM PATH SUM : ".$this->numberArray[0][0];
            } 
            echo "MAXIMUM PATH SUM : ".$this->numberArray[0][0];  
        }
    }
    $object = new NumberTower();
    $object->getNumber();
    echo "----------------------------\n";
    $object->display();

    $object->maximumTotal();