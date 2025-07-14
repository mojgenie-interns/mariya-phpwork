<?php

class Calculator{

    public $number1;
    public $number2;

    function __construct()
    {
        $this->number1 = readline("Enter 1st number:");

        $this->number2 = readline("Enter the 2nd number:");

    }

    public function menu(){

        while(true){

            echo "\n1.ADDITION \n2.SUBSTRACTION\n3.DIVISION\n4.MULTIPLICATION\n5.MODULO DIVISION\n6.EXIT\n";
             $choice = readline("ENTER YOUR CHOICE:");
            switch($choice){

                 case '1':
                    $this->addition();
                    break;
                case '2':
                    $this->substraction();
                    break;
                case '3':
                    $this->division();
                    break;
                    case '4':
                    $this->multiplication();
                    break;
                case '5':
                    $this->moduloDivision();
                    break;
                case '6':
                    exit;
                default:
                echo "Invaild option\n";

            }
        }


    }

    public function addition(){

          echo "SUM = ".$this->number1 + $this->number2 ;
    }

    public function substraction(){

        echo "DIFFERENC = ".$this->number1 - $this->number2 ;

    }

    public function division(){

        echo "DIVISION = ".$this->number1 / $this->number2 ;
    }

    public function multiplication(){

        echo "PRODUC T= ".$this->number1 * $this->number2 ;
    }

    public function moduloDivision(){
        echo "REMINDER = ".$this->number1 % $this->number2 ;
    }
}

$object = new Calculator();
$object->menu();
