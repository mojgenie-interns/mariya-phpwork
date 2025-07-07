<?php

class Converter {

    public $celsius;
    public $kelvin;
    public $fahrenheit;

    public function celsiusToFahrenheit() {
        $this->celsius = readline("Enter Celsius:\n");
        $this->fahrenheit = ($this->celsius * 9/5) + 32;
        echo "Fahrenheit: $this->fahrenheit\n";
    }

    public function fahrenheitToCelsius() {
        $this->fahrenheit = readline("Enter Fahrenheit:\n");
        echo "Celsius: " . (($this->fahrenheit - 32) * 5/9) . "\n";
    }

    public function celsiusToKelvin() {
        $this->celsius = readline("Enter Celsius:\n");
        echo "Kelvin: " . ($this->celsius + 273.15) . "\n";
    }

    public function kelvinToCelsius() {
        $this->kelvin = readline("Enter Kelvin:\n");
        echo "Celsius: " . ($this->kelvin - 273.15) . "\n";
    }

    public function fahrenheitToKelvin() {
        $this->fahrenheit = readline("Enter Fahrenheit:\n");
        echo "Kelvin: " . (($this->fahrenheit - 32) * 5/9 + 273.15) . "\n";
    }

    public function kelvinToFahrenheit() {
        $this->kelvin = readline("Enter Kelvin:\n");
        echo "Fahrenheit: " . (($this->kelvin - 273.15) * 9/5 + 32) . "\n";
    }
}

$object = new Converter();

echo "--------------- MENU ---------------\n";
echo "1. Celsius to Fahrenheit\n";
echo "2. Fahrenheit to Celsius\n";
echo "3. Celsius to Kelvin\n";
echo "4. Kelvin to Celsius\n";
echo "5. Fahrenheit to Kelvin\n";
echo "6. Kelvin to Fahrenheit\n";

$choice = readline("Enter your choice: ");
echo "------------------------------------\n";

if ($choice == 1) {
    $object->celsiusToFahrenheit();
} elseif ($choice == 2) {
    $object->fahrenheitToCelsius();
} elseif ($choice == 3) {
    $object->celsiusToKelvin();
} elseif ($choice == 4) {
    $object->kelvinToCelsius();
} elseif ($choice == 5) {
    $object->fahrenheitToKelvin();
} elseif ($choice == 6) {
    $object->kelvinToFahrenheit();
} else {
    echo "Invalid choice\n";
}
?>
