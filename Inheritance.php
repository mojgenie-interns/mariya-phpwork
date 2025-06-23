 <?php
    class Plants{
        public $plantName;
        public $plantPrice;
        public function __construct($plantName,$plantPrice)
        {
          $this->plantName=$plantName;
          $this->plantPrice=$plantPrice;  
        }
        function getDetails()
        {
            echo " Name of the plant: $this->plantName \n ";
            echo "Price : $this->plantPrice";

        }
    }
    class Fruits extends Plants{
        public $categoryName;
        public function category($categoryName){
            $this->categoryName=$categoryName;
            echo " New category is $this->categoryName\n";

        }
    }
    $object = new Fruits("MANGO",556);
    $object->category("fruits");
    $object->getDetails();
?>