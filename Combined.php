<?php

    //create an interface
    interface Work
    {
        public function doWork();

    }

    //creating a n abstract class

    abstract class Person
    {
        public $name;
        public $role;

        // constructor

        function __construct($name,$role)
        {
            $this->name = $name;
            $this->role = $role;

        }

        abstract function getDetails();

    }

    //creating a child class 

    class Engineer extends Person implements Work {
        public function getDetails()
        {
        
            echo " NAME : $this->name \n";

            //$role = readline("enter your role");

            //echo "Role :  $this->role \n";
        }

        // implements interface Work  
        public function doWork()
        {
             echo " As a  $this->role , $this->name, you must complete the work within 2 weeks!!!!\n";
        }
    }


    $role = readline("Enter your role : ");

    //creating object for Engineer
    $object = new Engineer("mariya",$role);
    $object-> getDetails();
    $object->doWork();
?>