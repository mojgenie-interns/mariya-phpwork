<?php

    class Name {
        public $name;
        public $course;

        //creating constuctor
        function __construct($name,$course)
        {
            $this->name=$name;
            $this->course=$course;           
        }
        function getName()
        {
            echo "My name is $this->name i am a $this->course ";

        }
    }

    $object1= new Name ("mariya","graduate");
    $object1->getName();
?>
