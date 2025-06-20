<?php

    //while loop
    echo "while\n ";
    $a=0;
    while($a<6)
    {
        echo $a,"\n";
        $a++;
    }

    //do while
    echo "do while\n";
    $aa=0;
    do
    {
        echo $aa;
        $aa++;
    }while ($aa<5);
    echo"\n";


    //for loop
    echo "for loop\n";
    for ($i=0;$i<=100;$i+=10)
    {
        echo $i,"\n";
    }

    //foreach
    echo "foreach\n";
    $s=array("ma","la","ta");
    foreach ($s as $a)
    {
        echo $a,"\n";
    }
?>