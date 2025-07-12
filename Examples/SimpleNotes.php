<?php

    class SimpleNote{


        public $title;
        public $content;
        public $dataFile = 'notes.json';
        public $notes = [];

        public function __construct()
        {
            if(file_exists($this->dataFile)){

                $this->notes = json_decode(file_get_contents($this->dataFile),true)?? [];
            }else{

                $this->notes = [];

                }
        }


        public function menu(){

             echo "=============MENU=============\n";
            echo "1.Add Note :\n";
            echo "2.View All Notes :\n";
            echo "3.Update Note :\n";
            echo "4.Delete Note :\n";
            echo "5.Exit \n";
            $choice = readline("Enter your choice");
            if($choice == 1){$this->addNote();}
            
            elseif ($choice == 2){$this->viewNotes($this->notes);}
            elseif ($choice == 3){$this->updateNotes();}
            elseif ($choice == 4){$this->deleteNotes();}
            elseif ($choice == 5){exit;}
            else{
                echo "Invalid choice\n";
            }


        }


        public function save(){

            file_put_contents($this->dataFile, json_encode($this->notes, JSON_PRETTY_PRINT));
        }


        public function addNote(){

            $this->title = readline("Enter the Title:\n");
            $this->content = readline("Enter the content:\n");

            $newNotes = [

                "title"=> $this->title,
                "content"=> $this->content
            ];

            $this->notes[] = $newNotes;
            $this->save();
            echo "Created\n";


        }

        public function viewNotes($notes){

            foreach($notes as $index=> $note){

                echo ($index + 1) . ".\n";
                echo "Title     : " . $note['title'] . "\n";
                echo "Content   : " . $note['content'] . "\n";
                echo "------------------------\n";
            }


        }


        public function updateNotes(){

            if(empty($this->notes)){

                echo "No data found \n";
                return;
            }


            $this->viewNotes($this->notes);

            $update = readline("Enter your index you want update:\n");
            $index = (int)$update - 1;

            if (!isset($this->notes[$index])) {
                echo "Invalid  number.\n";
                return;
            }

            echo "What do you want to update?\n";
            echo "1. Title name\n";
            echo "2. Content \n";

             $choice1 = readline("Choose : ");

             if ($choice1 == 1) {
                $newtitle = readline("Enter new  Title: ");
                $this->notes[$index]['title'] = $newtitle;

            } elseif ($choice1 == 2) {
                $newContent = readline("Enter new Content: ");
                $this->notes[$index]['content'] = $newContent;

            }else{
                echo "Invalid Choice\n";

            }

            $this->save();
        }



        public function deleteNotes(){

            if (empty($this->notes)) {
             echo "No tasks found to delete.\n";
             return;
            }


            $this->viewNotes($this->notes);

            $deleteIndex = readline("Enter the number to delete: ");
            $deleteIndex = (int)$deleteIndex - 1;

            if (isset($this->notes[$deleteIndex])) {

                unset($this->notes[$deleteIndex]);
                $this->notes = array_values($this->notes);
                file_put_contents($this->dataFile, json_encode($this->notes, JSON_PRETTY_PRINT));
                echo "Task deleted successfully.\n";

            } else {
                echo "Invalid task number.\n";
            }
        }
    }

$object = new SimpleNote();

while(true){

    $object->menu();
}