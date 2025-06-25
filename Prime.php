<?php

    class  Prime{
        public $number;
        public $flag;

        function __construct($number)
        {
            $this->number = $number;
            //$this->flag = $flag;
        }

        public function checkPrime(){

            $half = (int) ($this->number /2 );
            
            for($i=2;$i<=$half;$i++)
            {
                if($this->number % $i == 0)
                {
                    $this->flag = true;
                    
                }
                
                
            }
            if ($this->flag == true)
            {
                echo " not a prime";
            }
            else{
                echo "prime";
            }


        }

    }

    $number = readline("Enter the number");

    $prime = new Prime($number);

    $prime->checkPrime();
?>