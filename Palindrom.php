<?php
    class Palindrom {

        public $word;

        public $reve;

        function __construct($word)
        {
            $this->word = $word;

        }
        
        public function checkPalindrom()
        {
            $this->reve = strrev($this->word);
            
            if ($this->reve == $this->word)
            {
                echo " the word is palindrom";

            }
            else{

                echo "the word is not palindrom";
            }
        }

    }

    $word = readline("enter the word");

    $object = new Palindrom($word);

    $object-> checkPalindrom();

?>