<?php

interface ForToDo {
    public function createList();
    public function deleteList();
    public function updateList();
}

trait Tasks {
    public function displayToDo($tasks) {
        if (empty($tasks)) {
            echo "No tasks found.\n";
            return;
        }

        echo "Your existing Tasks:\n";
        foreach ($tasks as $index => $task) {
            echo ($index + 1) . ". " . $task['task'] . " (Created: " . $task['date'] . ", Target: " . $task['target'] . ")\n";
        }
    }
}

class NewToDo implements ForToDo {
    use Tasks;

    public $tasks = [];
    public $file = 'task.json';

    public function __construct() { 
        if (file_exists($this->file)) {
            $json = file_get_contents($this->file);
            $this->tasks = json_decode($json, true);
        } else {
            file_put_contents($this->file, json_encode([]));
            $this->tasks = [];
        }
    }

    public function createList() {
        echo "Creating new task\n";

        $name = readline("Enter the new task:\n");
        $target = readline("Enter target date (Y-M-D):\n");

        $newTask = [
            "task" => $name,
            "date" => date("Y-m-d"),
            "target" => $target
        ];

        $this->tasks[] = $newTask;
        file_put_contents($this->file, json_encode($this->tasks, JSON_PRETTY_PRINT));

        echo "Task created and saved.\n";
    }

    public function deleteList() {
        if (empty($this->tasks)) {
            echo "No tasks found to delete.\n";
            return;
        }

        $this->displayToDo($this->tasks);

        $deleteIndex = readline("Enter task number to delete: ");
        $deleteIndex = (int)$deleteIndex - 1;

        if (isset($this->tasks[$deleteIndex])) {
            unset($this->tasks[$deleteIndex]);
            $this->tasks = array_values($this->tasks);
            file_put_contents($this->file, json_encode($this->tasks, JSON_PRETTY_PRINT));
            echo "Task deleted successfully.\n";
        } else {
            echo "Invalid task number.\n";
        }
    }

    public function updateList() {
        if (empty($this->tasks)) {
            echo "No tasks to update.\n";
            return;
        }

        $this->displayToDo($this->tasks);

        $index = readline("Enter the task number to update: ");
        $index = (int)$index - 1;

        if (!isset($this->tasks[$index])) {
            echo "Invalid task number.\n";
            return;
        }

        echo "What do you want to update?\n";
        echo "1. Task name\n";
        echo "2. Target date\n";
        $choice = readline("Choose (1 or 2): ");

        if ($choice == 1) {
            $newName = readline("Enter new task name: ");
            $this->tasks[$index]['task'] = $newName;
        } elseif ($choice == 2) {
            $newDate = readline("Enter new target date (Y-M-D): ");
            $this->tasks[$index]['target'] = $newDate;
        } else {
            echo "Invalid choice.\n";
            return;
        }

        file_put_contents($this->file, json_encode($this->tasks, JSON_PRETTY_PRINT));
        echo "Task updated successfully.\n";
       
    }

    public function viewToDo() {
        $this->displayToDo($this->tasks);
    }
}

// Main
$object = new NewToDo();

echo "~~~ WELCOME TO YOUR TO-DO LIST ~~~\n";
echo "---------------------------------\n";
//echo "Current To-Do Items:\n";
$object->viewToDo();
echo "---------------------------------\n";
echo "--------MENU-----------\n";
echo "\n1. CREATE A TO-DO ITEM\n";
echo "2. DELETE A TO-DO ITEM\n";
echo "3. UPDATE A TO-DO ITEM\n";
$choi = readline("Enter your choice: ");


if ($choi == 1) {
    $object->createList();

} elseif ($choi == 2) {

    $object->deleteList();

    echo "After deleting the list is\n";
    
    $object->viewToDo();

} elseif ($choi == 3) {

    $object->updateList();
} else {

    echo "Invalid choice.\n";
}
 echo "The list is::\n";
        $object->viewToDo();

