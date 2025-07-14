<?php

class UnitConverter{
     
    public function start() {
        echo "===== Unit Converter =====\n";
        echo "1. Length\n";
        echo "2. Weight\n";
        $choice = readline("Choose conversion type : ");

        if ($choice == 1) {
            $this->convertLength();
        } elseif ($choice == 2) {
            $this->convertWeight();
        } else {
            echo "Invalid choice\n";
        }
    }


    public function convertLength() {
        echo "\n--- Length Units ---\n";
        echo "1. Meter to Kilometer\n";
        echo "2. Meter to Centimeter\n";
        echo "3. Kilometer to Meter\n";
        echo "4. Centimeter to Meter\n";

        $option = readline("Choose conversion: ");

        switch($option){

            case '1':
                $km = readline( "Enter the killometer :");
                echo "Meters = " . $km * 1000 . "\n";
                break;

            case '2':

                $m = readline( "Enter the Meter :");
                echo "Killometer = " . $m * 0.001 . "\n";
                break;

            case '3':
                $m = readline( "Enter the meter :");
                echo "CenteMeter = " . $m * 100 . "\n";
                break;

            case '4':

                $cm = readline( "Enter the Cente Meter :");
                echo "Meter = " . $cm * 0.01 . "\n";
                break;

            default:
              
                exit;

        }
        
    }

    public function convertWeight() {
        echo "\n--- Weight Units ---\n";
        echo "1. Kilogram to Gram\n";
        echo "2. Gram to Kilogram\n";

        $option = readline("Choose conversion: ");
        switch($option){

            case '1':
                $kg = readline( "Enter the Killogram :");
                echo "Grams = " . $kg * 1000 . "\n";
                break;

            case '2':

                $g = readline( "Enter the Gram :");
                echo "Killogram = " . $g * 0.001 . "\n";
                break;
            
            default:
              
                exit;

        }
    }



}

$object = new UnitConverter();
$object->start();
