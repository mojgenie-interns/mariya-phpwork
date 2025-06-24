<?php   

    //creating an abstract class

    abstract class LibraryItem
    {
        public $title, $author;
        public static $count;
    
        
        // constuctor
        function __construct($title,$author)
        {
            $this->title = $title;
            $this->author = $author;
            self::$count++;
        }
        abstract function getDetails();

    }

    //creting interface 


    interface Borrowable
    {
        public function borrowItem();
        public function returnItem();

    }
    //creating traits

    trait Logger
    {
        function logActions($action){
            echo "[] : $action\n";
        }
    }

    class Book extends LibraryItem implements Borrowable{

        use Logger;

        public function getDetails()
        {
            echo "Title : $this->title \n";
            echo " Author : $this->author \n";
        }

        // implement interface

        public function borrowItem()
        {
            
        }
    }

