<?php

        class Sliding{

            public $grid = [];

            public $refference = [];

            function __construct()
            {
                $this->grid = [
                    
                    11,14,7,1,
                    8,null,12,9,
                    3,16,2,5,
                    6,13,15,4
                
                ];

                $this->refference = [

                    1,2,3,4,
                    5,6,7,8,
                    9,10,11,12,
                    13,14,15,null
                ];
            }


            public function gridDisplay(){


            for ($i = 0; $i < 16; $i += 4) {

                    echo "+----+----+----+----+----+\n";
                    echo "|";
                    for ($j = 0; $j < 4; $j++) {
                        $val = $this->grid[$i + $j];
                        $cell = $val === null ? " " : $val;
                        echo " " . str_pad($cell, 3, " ", STR_PAD_LEFT) . " |";
                    }
                    echo "\n";
                }   
                 echo "+----+----+----+----+----+\n";
            }

            public function gridMove(){

                $input = readline( "Enter the index and Number eg :(0,2):\n ");
                list($index , $number ) = explode(",",$input);
                $index = (int)$index;
                $number = (int)$number;
                $newindex = array_search($number,$this->grid);

                if($this->grid[$index] != null){
                    echo "enter  null index\n";
                }elseif( $newindex == $index - 1 || $newindex == $index + 1 || $newindex == $index + 4 || $newindex == $index - 4){

                $this->grid[$index] = $number;
                //$newindex = array_search($number,$this->grid);
                $this->grid[$newindex] = null ;
                }else {
                    echo "Invalid Move::\n";
                }
                


            }
        }

    $object = new Sliding();
    $object->gridDisplay();

    while($object->grid != $object->refference){
    $object->gridMove();
    $object->gridDisplay();

    }

?>