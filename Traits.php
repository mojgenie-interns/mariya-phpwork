<?php
    //create a trait
    trait Logger
    {
        public function LoggMessage($message)
        {
            echo "[LOG] $message \n";
            
        }
    }

    //create class
    class User{
        use Logger;
        //public $usename;
        public function register()
        {
          echo " User  registered";  

        }

    }
    $user=new User();
    $user->LoggMessage("MARIYA");
    $user->register();
    
?>
