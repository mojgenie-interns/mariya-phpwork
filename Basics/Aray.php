<?php

    class Arrayy{

        public $arr=array(1,22,11,6,4,22,11);
        public $total=0;

        public function sum(){

            foreach($this->arr as $a){


                $this->total+=$a;
            }

            echo $this->total;

        }

        public function minimum(){

            echo "\nSMALLEST == ",min($this->arr);
        }
        public function maximum(){

            echo "\nLARGEST ==" ,max($this->arr);
        }

    }

    $obj = new Arrayy();

    $obj->sum();

    $obj->minimum();

    $obj->maximum();
?>