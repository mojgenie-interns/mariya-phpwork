<?php

class LinearSearch{

    public $list =[];
    public $element;

    public function __construct()
    {
        $this->list = ['12','2','6','9','60','1','7','99'];
        $this->element = readline("Enter the element to be searched:");

    }

    public function linearSearch(){

        foreach ($this->list as $index=> $lis){

            if ($this->element == $lis){
                
                echo "Item found  at index :"  .$index . "\n" ;
                exit;

            }

            
        }

        echo "Item not found";
    }

}

$object = new LinearSearch();
$object->linearSearch();
