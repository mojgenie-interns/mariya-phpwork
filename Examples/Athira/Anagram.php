<?php

class Anagram{

    public $word;
    public $anagram;

    public function getWWords(){
        $this->word = readline("Enter the word:");
        $this->anagram = readline("Enter the anagram :");
    }

    public function checkAnagram(){
        if(strlen($this->word) != strlen($this->anagram)){
            echo "Not anagram \n";
            exit;
        }

        $checkWord = strtolower($this->word);
        $checkAnagram = strtolower($this->anagram);

        if (count_chars($checkAnagram, 1) === count_chars($checkWord, 1)){
            echo "$this->anagram is an Anagram of $this->word \n";
        } else {
           
            echo "$this->anagram is NOT an Anagram of $this->word \n";
        }
    }
}

$object = new Anagram();
$object->getWWords();
$object->checkAnagram();
