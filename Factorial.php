<?php   
    function factorial($number)
    {
        $fact=$number;
        $x=$fact-1;
        while($x!=0){
        $fact=$fact*$x;
        $x--;
        }
        return $fact;


    }
    echo "factorial  is ",factorial(3);
    

?>
    