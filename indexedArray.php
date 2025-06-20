<?php

    //creating an indexed array
    $fruits=array("apple","orange","cherry","grapes","banana","mango");


    //acces 
    echo $fruits[3],"\n";
    echo $fruits[4],"\n";
    echo"**********************\n";

    //change element
    $fruits[1]="pineapple";

    // using foreach
    foreach ($fruits as $z)
    {
        echo $z,"\n";
    }

    //add element 
    echo "*************************\n";
    array_push($fruits,"rambutan");

    foreach ($fruits as $z)
    {
        echo $z,"\n";
    }

    //sort 
    
    sort($fruits);
    $cou=count($fruits);
    echo "**************\n";
    for ($i=0;$i<$cou;$i++)
    {
        echo $fruits[$i],"\n";
    }
?>