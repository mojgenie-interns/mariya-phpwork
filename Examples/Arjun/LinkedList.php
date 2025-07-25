<?php


class Node {
    public $data; 
    public $link; 

    public function __construct($data) {
        $this->data = $data;
        $this->link = null;
    }
}


class LinkedList {
    private $head; 

    public function __construct() {
        $this->head = null; 
    }

    public function insert($data) {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = $newNode;
            return;
        }

        $current = $this->head;
        while ($current->link !== null) {
            $current = $current->link;
        }
        $current->link = $newNode;
    }


    public function delete($data) {
        if ($this->head === null) {
            echo "List is empty, cannot delete.\n";
            return false;
        }

        if ($this->head->data === $data) {
            $this->head = $this->head->link;
            echo "Deleted $data from the list.\n";
            return true;
        }

        $current = $this->head;
        while ($current->link !== null && $current->link->data !== $data) {
            $current = $current->link;
        }

        if ($current->link !== null) {
            $current->link = $current->link->link;
            echo "Deleted $data from the list.\n";
            return true;
        }

        echo "Value $data not found in the list.\n";
        return false;
    }

    public function traverse() {
        if ($this->head === null) {
            echo "Linked List is empty\n";
            return;
        }

        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->link;
        }
        echo "null\n";
    }
}


$list = new LinkedList();

while (true) {
    echo "\nLinked List Operations:\n";
    echo "1. Insert a value\n";
    echo "2. Delete a value\n";
    echo "3. Traverse the list\n";
    echo "4. Exit\n";
   
    $choice = readline("Enter Choice:"); 

    switch ($choice) {
        case 1:
            echo "Enter the value to insert: ";
            $value = readline();
            if (is_numeric($value)) {
                $list->insert($value);
                echo "Inserted $value into the list.\n";
            } else {
                echo "Please enter a valid number.\n";
            }
            break;

        case 2:
            echo "Enter the value to delete: ";
            $value = readline();
            if (is_numeric($value)) {
                $list->delete($value);
            } else {
                echo "Please enter a valid number.\n";
            }
            break;

        case 3:
            $list->traverse();
            break;

        case 4:
            echo "Exiting program.\n";
            exit;

        default:
            echo "Invalid choice...\n";
    }
}

?>