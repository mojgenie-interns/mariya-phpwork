<?php
    //creating namespace
    namespace Login;
    class UserLogin
    {
        public $name;
        public $password;
        // function __construct($name,$password)
        // {
        //     $this->name = $name;
        //     $this->password = $password;
        // }
        public function loginPage()
        {
            $name = readline("Enter your Name ");
            $password = readline("Enter your password ");

        }
    }
?>