<?php
    class Vowel {
        public $string;
        public $count = 0;

        function __construct() {
            $this->string = readline("Enter the string: ");
        }

        public function getCount() {
            for ($i = 0; $i < strlen($this->string); $i++) {
                $s = strtolower($this->string[$i]);
                if ($s == 'a' || $s == 'e' || $s == 'i' || $s == 'o' || $s == 'u') {
                    $this->count++;
                }
            }
            echo "Number of vowels: " , $this->count;
        }
    }


    $object = new Vowel();
    $object->getCount();
?>
