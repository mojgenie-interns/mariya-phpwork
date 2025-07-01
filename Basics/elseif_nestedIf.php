<?php
    //elseif
    $a=readline("enter your mark ");

    if ($a<=100 and $a>=90)
    {
        echo "you secured A grade";
    }
    elseif ($a<89 and $a>=80)
    {
        echo "you secured B grade\n";
    
    }
    else 
    {
        echo "not qualified\n";
    }

    // nested if 
    echo "enter 3 numbers";
    $b=readline();
    $c=readline();
    $d=readline();
    if ($b>$c){
        if ($b>$d)
        {
            echo "$b is greater";
        }
        else 
        {
            echo "$d is greater";
        }

    }
    else
    {
        if ($c>$d)
        {
            echo "$c is greater";
        }
        else
        {
            echo " $d is greater";
        }
    }

    ?>