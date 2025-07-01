<?php
    $number = readline("Enter the number");

    $sum = 0;

    while($number>0){

        //$number = $number%10;
        $sum += $number%10;
        $number = (int) ($number/10);
        
    }
    echo "sum= $sum";
?>