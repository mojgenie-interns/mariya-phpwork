<?php

class Stopwatch{

    public $start;
    public $stop;


    public function calculate(){

        $this->start = readline("enter start to start:");

        $startTime = microtime(true);

        $this->stop = readline("Enter stop to stop:");

        $stopTime = microtime(true);

        $time = $stopTime - $startTime;

        echo "Stop Watch time = $time seconds ";

    }

}

$object = new Stopwatch();
$object->calculate();
