<?php
class Encryption{

    public $text;
    public $shift;

    function __construct()
    {
        $this->text = strtoupper(readline("Enter the word:"));

    }

    public function textEncryption(){

        $shift = rand(3,100);

        $arr = str_split($this->text);
        $cipherText = ''; 

        foreach($arr as $char){
        
            $position = ord($char) - 65;  
            $shifted = ($position + $shift) % 26;
            $newChar = chr($shifted + 65);

            $cipherText .= $newChar;

        }

        echo "ENCRYPTED WORD = $cipherText \n";
        echo "KEY = $shift ";

    }

}

$object = new Encryption();
$object->textEncryption();
