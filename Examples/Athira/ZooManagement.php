<?php
class AnimalManagement{

    public $name;
    public $species;
    public $dataFile = 'animal.json';
    public $list = [];

    function __construct()
    {
        echo "===========ZOO MANAGEMENT=============\n";
        if(file_exists($this->dataFile)){
            $this->list = json_decode(file_get_contents($this->dataFile),true) ?? [];
        }else{
            $this->list = [];
        }
    }

    public function save(){
        file_put_contents($this->dataFile, json_encode($this->list ,JSON_PRETTY_PRINT));
    }

    public function menu(){

        echo "------MENU-------\n";
        echo "1.VIEW ANIMAL LIST\n2.ADD ANIMAL DATA\n3.DELETE DATA\n4.UPDATE ANIMAL DATA\n5.EXIT\n";
        $choice = readline("Enter your choice:");
    }

    public function addAnimal(){

        $this->name = readline("Enter the name:");
        $this->species = readline("Enter the species: ");
        $age = readline("Enter the age :");

        $newData =[
            "name"=>$this->name,
            "species"=>$this->species,
            "age"=>$age 
        ];

        $this->list[] = $newData;
        $this->save();
        echo "SAVED\n";

    }

    public function viewAnimal($list){

        foreach ($list as $index=> $animal){
            echo $index+1 ."NAME = " .$list['name'] . "SPECIES = " . $list['species'] . "AGE =" . $list['age'];
        }
    }


}