<?php
    $limit=readline("Enter the limit you want");
    $x=0;
    $y=1;
    echo "\n Series is : $x  ";

    for ($i=2;$i<=$limit;$i++)
    {
        $sum=$x+$y;
        echo $sum," ";
        $y=$x;
        $x=$sum;
        
    }
?>