<?php
    //reading 2 number

    $number1 = readline("Enter the first digit");

    $number2 = readline("Enter the second number");

    echo "*******MENU*********\n";
    echo "\n 1.ADDITION\n2.SUBSTRACTION\n3.MULTIPLICATION\n4.DIVISION\n5.MODULO DIVISION\n";
    $menu = readline();

    if($menu == 1){
        echo "SUM= ",$number1 + $number2 ;
    }
    elseif($menu == 2){
        echo "SUBSTRACTION= ",$number1 - $number2 ;
    }
    elseif($menu == 3){
        echo "MULTIPLICATION = ",$number1 * $number2 ;
    }
    elseif($menu == 4){
        echo "DIVITION =",$number1 / $number2 ;  
      }
    elseif($menu == 5){
        echo "MODULAR DIVISION= ",$number1 % $number2 ;
    }
    else {
        echo "INVALID OPTION!!!!";
    }
?>