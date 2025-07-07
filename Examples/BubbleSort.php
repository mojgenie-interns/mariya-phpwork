<?php

class BubbleSort {

    public $elements = [];

    function __construct() {
        $input = readline("Enter  elements to be sorted:\n");
        $this->elements = array_map('intval', explode(" ", trim($input)));
    }

    public function displayArray() {
        echo "ELEMENTS:\n";
        foreach ($this->elements as $val) {
            echo $val . " ";
        }
        echo "\n";
        //var_dump($this->elements);
    }

    public function sort(){
        $count = count($this->elements);

        for ($i = 0; $i < $count - 1; $i++){
            for ($j = 0; $j < $count - $i - 1;$j++)
            if($this->elements[$j] > $this->elements[$j+1])
            {
                $temp = $this->elements[$j];
                $this->elements[$j] = $this->elements[$j+1];
                $this->elements[$j+1] = $temp;

            }
        }
        foreach($this->elements as $ele){

            echo $ele . " ";

            //echo "\n";
        }
    }
}

$object = new BubbleSort();
$object->displayArray();
echo "AFTER SORTING\n";
$object->sort();
