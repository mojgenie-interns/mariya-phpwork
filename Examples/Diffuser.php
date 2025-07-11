<?php

class Diffuser
{
    public $wires = [];
    public $code;
    public $correctWire;

    function __construct()
    {
        $this->wires = ['red', 'green', 'blue', 'yellow'];
        $this->correctWire = $this->wires[array_rand($this->wires)];
        $this->code = 342002;
    }

    public function bombDiffuser()
    {
        echo "Bomb is active.\n";
        echo "Available wires: " . implode(", ", $this->wires) . "\n";
        $wire = strtolower(trim(readline("Choose a wire to cut\n")));

        if ($wire !== $this->correctWire) {
            echo "Wrong wire. The bomb has exploded.\n";
            echo "Correct wire was: {$this->correctWire}\n";
            return;
        }

        echo "Correct wire cut. Enter the 6-digit code.\n";
        $attempt = trim(readline("Enter the code\n"));

        if ($attempt == $this->code) {
            echo "Bomb disarmed successfully.\n";
        } else {
            echo "Incorrect code. The bomb has exploded.\n";
            echo "Correct code was: {$this->code}\n";
        }
    }
}

$object = new Diffuser();
$object->bombDiffuser();
