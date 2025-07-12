<?php

class WordScramble{

    public $words = [];

    function __construct()
    {
        $this->words = [ 'maria','elephant','athira','arjun','encyclopedia'];
    
    }

    public function scrambleGeneration(){

        $word = $this->words[array_rand($this->words)];
        $letters = str_split($word);
          shuffle($letters);
          $scrambled = implode("", $letters);

         echo "The Scrambled word is : $scrambled  \n";

         $correct = readline("Enter the correct word:");
         echo "\n";
         if ($correct == $word){

            echo "CORRECT\n";
         }else{
            echo "WRONG\n";
         }
    }
}


$object =   new WordScramble();
$object->scrambleGeneration();
