<?php

class WordCounter{

    public $word;

    public function counting(){

        $this->word = readline("Enter the word :\n");

        $count = str_word_count($this->word);

        echo "The number of words present = $count \n";
    }
}

$object = new WordCounter();
$object->counting();
