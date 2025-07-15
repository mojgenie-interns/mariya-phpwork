<?php
class Converter{

    public $number;

    function __construct($number)
    {
        $this->number = $number;

    }

    public function menu(){
        echo "========NUMBER SYSTEM CONVERTER========\n";
        echo "1.DECIMAL TO BINARY\n2.DECIMAL TO OCTAL\n3.DECIMAL TO HEXADECIMAL\n";
        echo "4.BINARY TO DECIMAL\n5.HEXADECIMAL TO DECIMAL\n6.OCTAL TO DECIMAL\n7.EXIT\n\n";
        $choice = readline( "Enter your choice:\n");

         if ($choice == 1) {
            $this->decimalToBinary();
        } elseif ($choice == 2) {
            $this->decimalToOctal();
        } elseif ($choice == 3) {
            $this->decimalToHexadecimal();
        } elseif ($choice == 4) {
            $this->binaryToDecimal();
        } elseif ($choice == 5) {
            $this->hexadecimalToDecimal();
        } elseif ($choice == 6) {
            $this->octalToDecimal();
        } else {
            echo "Invalid entry.\n";
        }

    }
    public function decimalToBinary()
    {
        echo "\nBinary: ".decbin((int)$this->number);
    }

    public function binaryToDecimal()
    {
        echo "\nDecimal: ".bindec($this->number);
    }
    
    public function decimalToOctal()
    {
        echo "\nOctal: ".decoct($this->number);
    }
    
    public function octalToDecimal()
    {
        echo "\nDecimal: ".octdec($this->number);
    }
    
    public function decimalToHexadecimal()
    {
        echo "\nHexadecimal: ".dechex($this->number);
    }
    
    public function hexadecimalToDecimal()
    {
        echo "\nDecimal: ".hexdec($this->number);
    }
}
 $number = readline("Enter the number:");
$object = new Converter($number);
$object->menu();
