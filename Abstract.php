<?php
    //creating an abstact class
    abstract class Vehicle{
        public $brand;
        abstract public function startEngine();
        public function showBrand($brand){
            $this->brand=$brand;
            echo "Brand: $this->brand \n";
        }
        
    }

    //creating child class
    class Car extends Vehicle {
        public function startEngine()
        {
            echo " Starting the car engine\n";
        }

    }
    class Bike extends Vehicle{
        public function startEngine()
        {
            echo " Starting the bike engine\n";

        }
    }
    $obj1=new Car();
    $obj2=new Bike ();
    $obj1->showBrand("Toyota");
    $obj1->startEngine();
    $obj2->showBrand( "Yamaha");
    $obj2->startEngine();
?>