<?php
// Creating a class
class Name {
    public $name;

    public function displayName($name) {
        $this->name = $name;
        echo "hii $this->name"; 
    }
}

$object1 = new Name();
$object1-> displayName("mariya");
?>
