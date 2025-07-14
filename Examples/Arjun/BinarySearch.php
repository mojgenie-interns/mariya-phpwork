<?php

class BinarySearch{

    public $limit;
    public $arrays;

    function __construct()
    {
        $this->limit = readline("Enter the size of your array:");

        $this->arrays = [];

    }
    public function getArray(){

        echo "Enter the array Elements:";

        for ($i = 0; $i < $this->limit; $i++){

            $number = readline();
            $this->arrays[$i] = $number;
        }

        sort($this->arrays);
        echo "Array is sorted\n";



    }

    public function binarySearch(){

        $start = 0;
        $end = $this->limit-1;
        $element = readline("Enter the element to be searched :");

        while ($start <= $end){

            $mid = intdiv($start + $end, 2);

            if ($this->arrays[$mid] == $element)
            {
                echo "Item found";
                exit;
            }elseif ($element < $this->arrays[$mid]){

                $end = $mid-1;
            }else{

                $start = $mid + 1;
            
            }
        }

        echo "Item not found\n";
    }
}

$object =  new BinarySearch();
$object->getArray();
$object->binarySearch();
