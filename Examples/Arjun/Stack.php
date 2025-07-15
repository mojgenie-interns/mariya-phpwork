<?php
class Stack{

    public $top;
    public $size;
    public $data = [];
    function __construct()
    {
        $this->size = readline("Enter the size of the stack");
        $this->top = 0;

    }

    public function push(){
        if($this->size - 1 == $this->top){

            echo "STACK OVERFLOW \n";
            exit;
        }
         $element = readline("Enter the element:");


        $this->data[$this->top] = $element;
        $this->top++;
    }

    public function pop(){
        if($this->top == 0){
            echo "STACK UNDERFLOW\n";
            exit;
        }

        $value = $this->data[$this->top - 1];
        $this->top--;
        echo "Popped: $value\n";
        return $value;
    }

}

$object = new Stack();

while(true){

    echo "=====STACK====\n";
    echo "1.PUSH\n";
    echo "2.POP\n";
    $ch = readline("Enter your choice:");
    if($ch == 1){
        $object->push();   
    }else{
        $object->pop();
    } 

}