<?php
     
     
     class Inventory{

        public $name;
        public $price;
        public $quantity;
        public $list = [];
        public $dataFile = 'inventory.json';

        public function __construct(){

            if (file_exists($this->dataFile)) {
                $this->list = json_decode(file_get_contents($this->dataFile), true) ?? [];
            } else {
                $this->list = [];
            }
        }


        public function menu(){


            echo "=============MENU=============\n";
            echo "1.Add Item :\n";
            echo "2.View Inventory:\n";
            echo "3.Update Item :\n";
            echo "4.Delete Item :\n";
            //echo "5.Search Item :\n";
            echo "5.Exit \n";
            $choice = readline("Enter your choice");
            if($choice == 1){$this->addItem();}
            
            elseif ($choice == 2){$this->viewInventory($this->list);}
            elseif ($choice == 3){$this->updateItem();}
            elseif ($choice == 4){$this->deleteItem();}
            elseif ($choice == 5){exit;}
            else{
                echo "Invalid choice\n";
            }
        
        }


        public function save(){

            file_put_contents($this->dataFile, json_encode($this->list, JSON_PRETTY_PRINT));
        }

        public function addItem(){

            $this->name = readline("Enter Item:\n");
            $this->quantity = readline("Quantity :\n");
            $this->price = readline("Enter the Price :\n");

            $newData = [

                "item"=> $this->name,
                "quantities"=> $this->quantity,
                "cost"=> $this->price,
            ];

            $this->list[] = $newData;

            $this->save();
            echo "Item Created--\n";



        }

        public function viewInventory($lists){

            echo "=====View Inventory======\n";

            foreach ($lists as $index => $li) {
                echo ($index + 1) . ".\n";
                echo "Item     : " . $li['item'] . "\n";
                echo "Quantity : " . $li['quantities'] . "\n";
                echo "Price    : " . $li['cost'] . "\n";
                echo "------------------------\n";
            }



        }

        public function updateItem(){

            if(empty($this->list)){
                echo "No data found \n";
                return;
            }

            $this->viewInventory($this->list);

            $update = readline("Enter the index number you want to update:\n");

            $index = (int)$update - 1;

            if (!isset($this->list[$index])) {
                echo "Invalid  number.\n";
                return;
            }

            echo "What do you want to update?\n";
            echo "1. Item name\n";
            echo "2. Price \n";
            echo "3. Quantity\n";
            $choice1 = readline("Choose : ");

            if ($choice1 == 1) {
                $newName = readline("Enter new  name: ");
                $this->list[$index]['item'] = $newName;

            } elseif ($choice1 == 2) {
                $newPrice = readline("Enter new price: ");
                $this->list[$index]['cost'] = $newPrice;

            } elseif($choice1 == 3) {

                $newQty = readline("Enter the new Quantity :\n");
                $this->list[$index]['quantities'] = $newQty;

            }else {
                echo "Invalid Choice\n";
            }
            $this->save();
            echo "Updated \n";

        }


        public function deleteItem(){

            if (empty($this->list)) {
             echo "No tasks found to delete.\n";
             return;
            }

            $this->viewInventory($this->list);

            $deleteIndex = readline("Enter the number to delete: ");
            $deleteIndex = (int)$deleteIndex - 1;

            if (isset($this->list[$deleteIndex])) {
                unset($this->list[$deleteIndex]);
                $this->list = array_values($this->list);
                file_put_contents($this->dataFile, json_encode($this->list, JSON_PRETTY_PRINT));
                echo "Task deleted successfully.\n";
            } else {
                echo "Invalid task number.\n";
            }
        }


        
     }


     $object = new Inventory();
     
     while(true){

        $object->menu();

     }