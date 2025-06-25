<?php

    class Reverse{

        public $string;

        function __construct($string)
    
        {
                $this->string = $string;

        }

        public function getReverse(){


            $rev = strrev($this->string);
            echo $rev;
        }
    }


    $string = readline("enter the string");
    //creating instance

    $object = new Reverse($string);

    $object-> getReverse();

?>
