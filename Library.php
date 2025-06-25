<?php   

    //creating an abstract class

    abstract class LibraryItem
    {
        public $title, $author;
        
    
        
        // constuctor
        function __construct($title,$author)
        {
            $this->title = $title;
            $this->author = $author;
        
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
            echo " $action\n";
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
           
            $this->logActions("Borrowed the book --$this->title \n");
     
       }

       //implement the interface 

       public function returnItem()
       {
        $this-> logActions("Returnrd the book--$this->title\n");
       }
    }

        class DVD extends LibraryItem implements Borrowable{

            //trait 

            use Logger;
            public $type;
            public $name;

            //constructor
            function __construct($type,$name)
        
            {
               $this->type = $type;
               $this->name = $name; 
            }

            public function getDetails()
            {
                echo " DVD type is : $this->type \n";
                echo " Name of the DVD is $this->name \n";

            }

            public function borrowItem()
            {
                $this->logActions("Borrowed the DVD $this->name \n");

            }

            public function returnItem()
            {
                $this->logActions("Returned the DVD $this->name\n");

            }
        }
        //user need to enter the title ,name,author and type

        $title = readline("Enter the title of the book :\n");

        $author = readline("Enter the author of the book :\n");

        $type = readline("Enter the type of DVD :\n");

        $name = readline("Enter the name of the DVD : \n");


         //creting instance of book

        $book = new Book($title,$author);

        //creating the instance of DVD

        $dvd = new DVD($type,$name);
        
        
        $ques = readline(" 1.Book   2.DVD \n");
        $ques2 = readline("1.Borrow  2.Return \n");

        if ($ques==1 && $ques2==1){

            $book->borrowItem();
            $book->getDetails();
        }

        elseif($ques == 1 && $ques2 == 2){
            $book->returnItem();
            $book->getDetails();
        }
        
        elseif($ques == 2 && $ques2 == 1){
            $dvd->borrowItem();
            $dvd->getDetails();
        }
        else {
            $dvd->returnItem();
            $dvd->getDetails();
        }

?>
