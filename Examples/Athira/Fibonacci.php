<?php

class Fibonacci{


    public $limit;


    public function generateFib(){

        $this->limit=readline("Enter the limit you want");
        $x=0;
        $y=1;
        echo "\n Series is : $x  ";

        for ($i=2;$i<=$this->limit;$i++)
        {
            $sum=$x+$y;
            echo $sum," ";
            $y=$x;
            $x=$sum;
            
        }
    }
}

$fib = new Fibonacci();
$fib->generateFib();
