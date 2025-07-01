<?php

    function myFunction()
    {
        echo " a sample function\n";
    }

    myFunction();

    //function with afrgument
    function addNumber($a,$b)
    {
        $z=$a+$b;
        echo "sum = $z \n ";
    }
    addNumber(4,6);

    //function with no argument with return type

    function sum()
    {
        $x=12;
        $y=12;
        $w=$x+$y;
        return $w;
    }

    $v=sum();
    echo $v,"\n";

    //with argument and return type

    function add($p,$t)
    {
        return $p+$t;
    }
    $r=add(4,6);
    echo $r;
?>