<?php

class LibraryManagement{
    
    protected $dataFile = 'library.json';
    protected $books = [];
    public $bookTitle;
    public $bookAuthor;
    public $bookLanguage;

    public function __construct()
    {
        if (file_exists($this->dataFile))
            $this->books = json_decode(file_get_contents($this->dataFile), true);
    }

    public function save()
    {
        file_put_contents($this->dataFile, json_encode($this->books, JSON_PRETTY_PRINT));
    }

    public function libraryMenu()
    {
        echo "\n=== LIBRARY MANAGEMENT ===\n";
        while (true) {
            echo "\n--- MENU ---";
            echo "\n1. Take book\n2. Add book\n3. Exit";
            $choice = readline("\nEnter the option: ");
            if ($choice == 1)
                $this->takeBook();
            elseif ($choice == 2)
                $this->addBook();
            elseif ($choice == 3) {
                exit;
            } else
                echo "Invalid entry. Try again.\n";
        }
    }

    public function takeBook()
    {
        echo "\n--- Available Books ---\n";

        foreach ($this->books as $book) {
            echo "- " . $book['title'] . " by " . $book['author'] . " \n";
        }

        $this->bookTitle = trim(readline("Enter the title to take: "));

        foreach ($this->books as $index => $book) {
            if (strtolower($this->bookTitle) === strtolower($book['title'])) {
                echo "\nYou have successfully taken " . $book['title'] . "\n";
                unset($this->books[$index]);
                return;
            }
        }

        echo "\nBook not found!\n";
    }


    public function addBook()
    {
        echo "\n--- Add New Book ---\n";
        $this->bookTitle = trim(readline("Enter the title: "));
        foreach ($this->books as $book)
            if ($this->bookTitle === $book['title']) {
                echo $this->bookTitle . " already exists!\n";
                return;
            }

        $this->bookAuthor = trim(readline("Enter the author's name: "));
        $this->bookLanguage = trim(readline("Enter the language: "));
        $this->books[] = [
            'title' => $this->bookTitle,
            'author' => $this->bookAuthor,
        ];
        echo "Added successfully.\n";
        $this->save();
    }
}

$object = new LibraryManagement();
$object->libraryMenu();