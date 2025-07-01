<?php
    //global variable
    $x=3;
    $y=12;
    function localVriable()
    {
        $a=4;//local variable
        echo "a is a local varible $a";
        echo "try to print global: $x\n";//error
        echo "using global ",$GLOBALS['x'];
    }
    localVriable();
    //for static variables
    function staticVariable()
    {
        static $q=10;
        echo "\n";
        echo $q;
        $q=$q+10;

    }
    staticVariable();

    staticVariable();
    
    staticVariable();
    
?>
    