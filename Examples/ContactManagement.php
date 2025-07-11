<?php

class ContactManagement{

        public $name;
        public $contactNumber;


        


        public function menu(){

            echo "==========WELCOME=========\n";

            echo "1. Add Contact\n";
            echo "2. View Contacts\n";
            echo "3. Delete Contact\n";
            echo "4. Exit\n";
            $option = readline("Enter your choice :\n");
            if ($option == 1){

                $this->addContact();

            }elseif($option == 2){

                $this->viewContact();

            }elseif($option == 3){

                $this->deleteContact();

            }elseif ($option == 4){

                echo "Good Bye";
                exit;
            }else{

                echo "invalid choice\n";

            }


        }

        public function addContact(){


        }

        public function viewContact(){

        }

        public function deleteContact(){

        }



}