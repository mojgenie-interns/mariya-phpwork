<?php   

class Merge {

    public $list = [];

    function __construct() {
        $mergeList = readline("Enter the numbers :\n");
        $this->list = array_map('intval', explode(",", $mergeList));
    }

    public function mergeSort($array) {
        if (count($array) <= 1) {
            return $array;
        }

        $mid = intdiv(count($array), 2);

        $left = array_slice($array, 0, $mid);
        $right = array_slice($array, $mid);

        $left = $this->mergeSort($left);
        $right = $this->mergeSort($right);

        return $this->merge($left, $right);
    }

    public function merge($left, $right) {
        $result = [];

        $i = 0;
        $j = 0;

        while ($i < count($left) && $j < count($right)) {
            if ($left[$i] <= $right[$j]) {
                $result[] = $left[$i];
                $i++;
            } else {
                $result[] = $right[$j];
                $j++;
            }
        }

        while ($i < count($left)) {
            $result[] = $left[$i];
            $i++;
        }

        while ($j < count($right)) {
            $result[] = $right[$j];
            $j++;
        }

        return $result;
    }
}

$object = new Merge();

echo "Array After Sorting:\n";
$sorted = $object->mergeSort($object->list);
print_r($sorted);

?>
