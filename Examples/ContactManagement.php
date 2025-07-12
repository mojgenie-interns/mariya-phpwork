<?php

class ContactManagement {

    public $contacts = [];

    public function menu() {
        while (true) {
            echo "========== WELCOME =========\n";
            echo "1. Add Contact\n";
            echo "2. View Contacts\n";
            echo "3. Delete Contact\n";
            echo "4. Exit\n";
            $option = readline("Enter your choice: ");

            switch ($option) {
                case 1:
                    $this->addContact();
                    break;
                case 2:
                    $this->viewContact();
                    break;
                case 3:
                    $this->deleteContact();
                    break;
                case 4:
                    echo "Goodbye!\n";
                    exit;
                default:
                    echo "Invalid choice. Try again.\n";
            }
        }
    }

    public function addContact() {
        $name = readline("Enter Name: ");
        $number = readline("Enter Contact Number: ");

        if (strlen($number) != 10){

            echo "Enter 10 digit number:\n";
            echo "Contact not saved\n";
            return;
        }
        $this->contacts[] = [
            'name' => $name,
            'number' => $number
        ];
        echo "Contact added successfully!\n";
    }

    public function viewContact() {
        if (empty($this->contacts)) {
            echo "No contacts available.\n";
            return;
        }

        echo "---- Contact List ----\n";
        foreach ($this->contacts as $index => $contact) {
            echo ($index + 1) . ". Name: {$contact['name']}, Number: {$contact['number']}\n";
        }
    }

    public function deleteContact() {
        $this->viewContact();
        if (empty($this->contacts)) {

            echo "No contact to delete\n";
            return;
        }

        $index = readline("Enter contact number to delete : ");
        $realIndex = $index - 1;

        if (isset($this->contacts[$realIndex])) {
            unset($this->contacts[$realIndex]);
          
            $this->contacts = array_values($this->contacts);
            echo "Contact deleted successfully.\n";
        } else {
            echo "Invalid index.\n";
        }
    }
}

$object = new ContactManagement();
$object->menu();
