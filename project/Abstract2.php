<?php  
    abstract class Employee
    {
        public $name;

        function __construct($name)
        {
            $this->name = $name;
        }

        //creating abstract class

        abstract function calculateSalary();

    }

    //child class 
     
    class FullTimeEmployee extends Employee
    {
        public function calculateSalary()
        {

            $salary=50000;
            echo " $this->name  's  salary is $salary \n";


        }
    }

    class PartTimeEmployee extends Employee
    {
        public function calculateSalary()
    
        {
            $hourlyRate = 500;
        
            $hoursWorked = readline("How many hours worked ");

            $salary = $hourlyRate * $hoursWorked;
            echo " $this->name's salary is  $salary";
        }
    }


    //create object for FullTimeEmployee

    $object = new FullTimeEmployee("mariya");

    // calling the calculateSalary function

    $object->calculateSalary();

    //creating object for ParTimeEmployee

    $object1 = new PartTimeEmployee("athira");

    //calling the abstract function calculateSalary

    $object1->calculateSalary();

?>