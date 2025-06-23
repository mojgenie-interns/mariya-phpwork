<?php
    // Parent Class
    class Plant {
        public $name;
        private $nickname;
        protected $color;

        public function __construct($name, $nickname, $color) {
            $this->name = $name;
            $this->nickname = $nickname;
            $this->color = $color;
        }

        public function ParentDetails() {
            echo "Name: $this->name\n";           
            echo "Nickname: $this->nickname\n";  
            echo "Color: $this->color\n";        
        }
    }

    // Child Class
    class Flower extends Plant {
        public function ChildDetails() {
            echo "Name: $this->name\n";           
            // echo "Nickname: $this->nickname\n"; //shows error
            echo "Color: $this->color\n";        
        }
    }

    $flower = new Flower("Rose", "nice", "Red");

    $flower->ParentDetails();

    $flower->ChildDetails();
?>
