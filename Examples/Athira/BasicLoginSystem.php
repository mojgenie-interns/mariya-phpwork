<?php

class LoginSystem{

    public $name;
    public $password;
    public $login = [];
    public $dataFile = 'log.json';


    function __construct()
    {
        if(file_exists($this->dataFile)){

            $this->login = json_decode(file_get_contents($this->dataFile),true) ??[];

        }else{
            $this->login = [];
        }
    }

    public function save(){

        file_put_contents($this->dataFile, json_encode($this->login,JSON_PRETTY_PRINT));

    }

    public function createAccount(){

        $this->name = readline("Enter your username:");
        $this->password = readline("\nEnter your password:");

        $newLogin = [

            "name"=> $this->name,
            "password"=>$this->password

        ];

        $this->login [] = $newLogin;
        $this->save();
        echo "ACCOUNT CREATE \n";



    }

    public function createLogin(){

        echo "======LOGIN PAGE ==========\n";
        $check = readline("USERNAME:");
        echo "\n";

        $checkPassword = readline("PASSWORD :");

        foreach ($this->login as $user) {
            if ($user['name'] === $check && $user['password'] === $checkPassword) {
                echo "WELCOME, $check\n";
                return;
            }
        }

       echo " INCORRECT USERNAME OR PASSWORD\n";

    }

}

$object = new LoginSystem();

while(true) {
    echo "\n1. CREATE ACCOUNT\n";
    echo "2. LOGIN\n";
    echo "3. EXIT\n";
    $choice = readline("CHOICE: ");

    switch($choice) {
        case '1':
            $object->createAccount();
            break;
        
        case '2':
            $object->createLogin();
            break;

        case '3':
            exit;

        default:
            echo "INVALID OPTION\n";
    }
}
