<?php
    function iterables(iterable $items)
    {
        foreach($items as $item)
        {
            echo $item ,"\n";
        }
    }

    $arr=["mariya","arjun","athira"];
    iterables($arr);
?>
