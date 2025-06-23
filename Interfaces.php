<?php
    interface Shape{
        public function area($length,$breadth);
    }
    
    class Rectangle implements Shape {
        public function area($length,$breadth)
        {
            echo "area== ",$length*$breadth;
        }
    }
    class Square implements Shape{
        public function area($length, $breadth)
        {
            echo "\narea==", $length*$length;
        }
    }

    $obj=new Rectangle();
    $obj->area(2,6);
    $obj2= new Square();
    $obj2->area(2,2);
?>