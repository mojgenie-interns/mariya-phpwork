<?php
class AnimalManagement{

    public $name;
    public $species;
    public $dataFile = 'animal.json';
    public $list = [];

    function __construct()
    {
        echo "=========== ZOO MANAGEMENT =============\n";
        if(file_exists($this->dataFile)){
            $this->list = json_decode(file_get_contents($this->dataFile), true) ?? [];
        }
    }

    public function save(){
        file_put_contents($this->dataFile, json_encode($this->list, JSON_PRETTY_PRINT));
    }

    public function menu(){
        while(true){
            echo "\n------ MENU ------\n";
            echo "1. VIEW ANIMAL LIST\n";
            echo "2. ADD ANIMAL DATA\n";
            echo "3. DELETE DATA\n";
            echo "4. UPDATE ANIMAL DATA\n";
            echo "5. EXIT\n";
            $choice = readline("Enter your choice: ");

            switch($choice){
                case 1:
                    $this->viewAnimal();
                    break;
                case 2:
                    $this->addAnimal();
                    break;
                case 3:
                    $this->deleteAnimal();
                    break;
                case 4:
                    $this->updateAnimal();
                    break;
                case 5:
                    echo "Exiting...\n";
                    exit;
                default:
                    echo "Invalid choice.\n";
            }
        }
    }

    public function addAnimal(){
        $this->name = readline("Enter the name: ");
        $this->species = readline("Enter the species: ");
        $age = readline("Enter the age: ");

        $newData = [
            "name" => $this->name,
            "species" => $this->species,
            "age" => $age
        ];

        $this->list[] = $newData;
        $this->save();
        echo "Animal data SAVED.\n";
    }

    public function viewAnimal(){
        if(empty($this->list)){
            echo "No animals found.\n";
            return;
        }

        echo "\n---- Animal List ----\n";
        foreach ($this->list as $index => $animal){
            echo ($index + 1) . ". Name: " . $animal['name'] . 
                 ", Species: " . $animal['species'] . 
                 ", Age: " . $animal['age'] . "\n";
        }
    }

    public function deleteAnimal(){
        $this->viewAnimal();
        $index = readline("Enter the number of the animal to delete: ") - 1;

        if(isset($this->list[$index])){
            unset($this->list[$index]);
            $this->list = array_values($this->list); 
            $this->save();
            echo "Animal deleted.\n";
        } else {
            echo "Invalid selection.\n";
        }
    }

    public function updateAnimal(){
        $this->viewAnimal();
        $index = readline("Enter the number of the animal to update: ") - 1;

        if(isset($this->list[$index])){
            $this->list[$index]['name'] = readline("Enter new name: ");
            $this->list[$index]['species'] = readline("Enter new species: ");
            $this->list[$index]['age'] = readline("Enter new age: ");
            $this->save();
            echo "Animal updated.\n";
        } else {
            echo "Invalid selection.\n";
        }
    }
}


$zoo = new AnimalManagement();
$zoo->menu();
