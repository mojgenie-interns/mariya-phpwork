<?php

class ContactBook{

    public $dataFile = 'contact.json';
    public $contact = [];

    function __construct()
    {
       if(file_exists($this->dataFile)){

                $this->contact = json_decode(file_get_contents($this->dataFile),true)?? [];

            }else{

                $this->contact = [];

        } 
        
    } 

    public function save(){

            file_put_contents($this->dataFile, json_encode($this->contact, JSON_PRETTY_PRINT));
    }

    public function menu() {
        while (true) {
            echo "========== WELCOME =========\n";
            echo "1. Add Contact\n";
            echo "2. View Contacts\n";
            echo "3. Delete Contact\n";
            echo "4. Exit\n";
            $option = readline("Enter your choice: ");
        

            switch ($option){

                case '1':
                    $this->addContact();
                    break;
                case '2':
                    $this->viewContact();
                    break;
                case '3':
                    $this->deleteContact();
                    break;
                case '4':
                    exit;
                default:
                echo "Invaild option\n";

            }

        }   
    }

    public function addContact(){

        $name = readline("Enter Name: ");
        $number = readline("Enter Contact Number: ");

        if (strlen($number) != 10){

            echo "Enter 10 digit number:\n";
            echo "Contact not saved\n";
            return;
        }
        $newContact = [
            'name' => $name,
            'number' => $number
        ];

        $this->contact[] = $newContact;
        $this->save();

        echo "Contact added successfully!\n";
    }

    public function viewContact() {
        if (empty($this->contact)) {
            echo "No contacts available.\n";
            return;
        }

        echo "---- Contact List ----\n";
        foreach ($this->contact as $index => $cont) {
            echo ($index + 1) . ". Name: {$cont['name']}, Number: {$cont['number']}\n";
        }
    }

    public function deleteContact() {
        $this->viewContact();
        if (empty($this->contact)) {

            echo "No contact to delete\n";
            return;
        }

        $index = readline("Enter index number to delete : ");
        $realIndex = $index - 1;

        if (isset($this->contact[$realIndex])) {
            unset($this->contact[$realIndex]);
          
            $this->contact = array_values($this->contact);
            echo "Contact deleted successfully.\n";
        } else {
            echo "Invalid index.\n";
        }
    }

}

$object = new ContactBook();
$object->menu();


