<?php
class Queue {

    public $queue;
    public $size;

    function __construct() {
        $this->queue = [];
        $this->size = readline("Enter the size: ");
    }

    public function menu() {
        echo "=========== MENU ===========\n";
        while (true) {
            echo "1. ENQUEUE\n2. DEQUEUE\n3. DISPLAY\n4. EXIT\n";
            $choice = readline("Enter your choice: ");

            switch ($choice) {
                case '1':
                    $this->enqueue();
                    break;
                case '2':
                    $this->dequeue();
                    break;
                case '3':
                    $this->display();
                    break;
                case '4':
                    exit;
                default:
                    echo "Invalid option\n";
            }
        }
    }

    public function enqueue() {
        if (count($this->queue) >= $this->size) {
            echo "Queue is full\n";
            return;
        }

        $element = readline("Enter the element to be inserted: ");
        array_push($this->queue, $element);
        echo "Element added\n";
    }

    public function dequeue() {
        if (empty($this->queue)) {
            echo "No element to be deleted\n";
            return;
        }

        $removed = array_shift($this->queue);
        echo "Element removed: $removed\n";
    }

    public function display() {
        if (empty($this->queue)) {
            echo "No data found\n";
            return;
        }

        echo "Queue elements:\n";
        foreach ($this->queue as $q) {
            echo $q . "\n";
        }
    }
}

$object = new Queue();
$object->menu();
