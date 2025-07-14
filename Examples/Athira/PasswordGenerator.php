<?php

class PasswordGenerator {

    public $length;
    public $pass;

    public function __construct() {
        $this->length = (int)readline("Enter  password length: ");

        $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lowercase = "abcdefghijklmnopqrstuvwxyz";
        $numbers   = "0123456789";
        $symbols   = "@#$%&*!?";

        $this->pass = $uppercase . $lowercase . $numbers . $symbols;
    }

    public function generate() {
        $password = "";

        for ($i = 0; $i < $this->length; $i++) {
            $index = random_int(0, strlen($this->pass) - 1);
            $password .= $this->pass[$index];
        }

        echo "Generated Password: $password\n";
    }
}

$object = new PasswordGenerator();
$object->generate();
