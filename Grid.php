<?php


    interface GridDisplayInterface {
        public function gridDisplay(CircularGrid $grid): void;
    }

    
    class CircularGrid {
        public $currentRow;
        public $currentCol;
        public $size;
        public $data;

        public function __construct($size) {
            $this->currentRow = 0;
            $this->currentCol = 0;
            $this->size = $size;
            $this->data = array_fill(0, $size, array_fill(0, $size, 0));
        }

        public function moveUpRight() {
            $this->currentRow = ($this->currentRow - 1 + $this->size) % $this->size;
            $this->currentCol = ($this->currentCol + 1) % $this->size;
        }

        public function moveDown() {
            $this->currentRow = ($this->currentRow + 1) % $this->size;
        }

        public function set($row, $col, $value) {
            $this->data[$row][$col] = $value;
        }

        public function get($row, $col) {
            return $this->data[$row][$col];
        }

        public function getSize() {
            return $this->size;
        }

        public function getData() {
            return $this->data;
        }
    }

    
    class MagicSquare {
        public $grid;
        public $size;
        public $magicConstant;

        public function __construct($n) {
            $this->size = $n;
            $this->grid = new CircularGrid($n);
            $this->magicConstant = ($n * ($n * $n + 1)) / 2;
        }

        public function generate() {
            $n = $this->size;
            $i = 0;
           $j = floor($n / 2); 

            for ($num = 1; $num <= $n * $n; $num++) {
                $this->grid->set($i, $j, $num);

                $nextI = ($i - 1 + $n) % $n;
                $nextJ = ($j + 1) % $n;

                if ($this->grid->get($nextI, $nextJ) != 0) {
                    $i = ($i + 1) % $n;
                } else {
                    $i = $nextI;
                    $j = $nextJ;
                }
            }
        }

        public function isMagic() {
        $n = $this->size;
        $data = $this->grid->getData();
        $expected = $this->magicConstant;

        // Check rows
        for ($i = 0; $i < $n; $i++) {
            $rowSum = 0;
            for ($j = 0; $j < $n; $j++) {
                $rowSum += $data[$i][$j];
            }
            if ($rowSum !== $expected) return false;
        }

        // Check columns
        for ($j = 0; $j < $n; $j++) {
            $colSum = 0;
            for ($i = 0; $i < $n; $i++) {
                $colSum += $data[$i][$j];
            }
            if ($colSum !== $expected) return false;
        }

        // Check diagonals
        $diag1Sum = 0;
        $diag2Sum = 0;
        for ($i = 0; $i < $n; $i++) {
            $diag1Sum += $data[$i][$i]; 
            $diag2Sum += $data[$i][$n - $i - 1];
        }

        if ($diag1Sum !== $expected || $diag2Sum !== $expected) return false;

        return true;
    }
}
    


    class ConsoleDisplay implements GridDisplayInterface {

        public function gridDisplay(CircularGrid $grid): void {

            $size = $grid->getSize();//this $grid is a instance of circularGrid

            $data = $grid->getData();

            echo "Magic Constant: " . (($size * ($size * $size + 1)) / 2) . "\n";

            echo "\nMagic Square :\n";
            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size; $j++) {
                    echo ($data[$i][$j]." ");
                }
                echo "\n";
            }
            
        }
    }



        $n = readline("Enter an odd number for the size of the square : ");

        $magicSquare = new MagicSquare($n);
        $magicSquare->generate();

        $display = new ConsoleDisplay();
        $display->gridDisplay($magicSquare->grid);
?>