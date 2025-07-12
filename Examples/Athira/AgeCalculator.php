<?php

class AgeCalculator
{
    public $fromDate;
    public $toDate;

    public function getDates()
    {
        $this->fromDate = readline("Enter your DOB (YYYY-MM-DD): ");
        $this->toDate = readline("Age at the Date of (YYYY-MM-DD): ");
    }

    public function calculateAge()
    {
        $start = new DateTime($this->fromDate);
        $end = new DateTime($this->toDate);

        $age = $start->diff($end);

        echo "Age is: {$age->y} years, {$age->m} months, and {$age->d} days.\n";
    }
}


$object = new AgeCalculator();
$object->getDates();
$object->calculateAge();
