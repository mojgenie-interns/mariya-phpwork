<?php

class Sudoku {

    public $grid  = [];
    public $fixed = [];

    function __construct()
    {
        $this->grid = [
            [0, 2, 0, 4],
            [0, 0, 1, 0],
            [4, 0, 0, 3],
            [0, 3, 0, 0]
        ];

        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                $this->fixed[$i][$j] = $this->grid[$i][$j];
            }
        }
    }

    public function displayGrid()
    {
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                echo "[" . $this->fixed[$i][$j] . "]";
            }
            echo "\n";
        }
    }

    public function checkInput(): void
    {
        $cell  = readline("Select the cell (row col): ");
        $parts = explode(" ", $cell);

        if (count($parts) !== 2) {
            echo " Please enter two numbers: row and column (e.g., 1 2)\n";
            return;
        }

        $row = intval($parts[0]);
        $col = intval($parts[1]);

        if ($row < 0 || $row > 3 || $col < 0 || $col > 3) {
            echo " Row and column must be between 0 and 3.\n";
            return;
        }

        if ($this->fixed[$row][$col]) {
            echo " You cannot change a clue cell.\n";
            return;
        }

        $number = readline("Enter the number (1 to 4): ");

        if (!is_numeric($number)) {
            echo " Please enter a number.\n";
            return;
        }

        $num = intval($number);

        if ($num < 1 || $num > 4) {
            echo " Number must be between 1 and 4.\n";
            return;
        }

        $this->fixed[$row][$col] = $num;
    }

    public function validate()
    {
        // rows
        for ($i = 0; $i < 4; $i++) {
            $seen = [];
            for ($j = 0; $j < 4; $j++) {
                $v = $this->fixed[$i][$j];
                if ($v && in_array($v, $seen)) return false;
                $seen[] = $v;
            }
        }

        // columns
        for ($j = 0; $j < 4; $j++) {
            $seen = [];
            for ($i = 0; $i < 4; $i++) {
                $v = $this->fixed[$i][$j];
                if ($v && in_array($v, $seen)) return false;
                $seen[] = $v;
            }
        }

        // 2×2 boxes
        for ($sr = 0; $sr < 4; $sr += 2) {
            for ($sc = 0; $sc < 4; $sc += 2) {
                $seen = [];
                for ($i = $sr; $i < $sr + 2; $i++) {
                    for ($j = $sc; $j < $sc + 2; $j++) {
                        $v = $this->fixed[$i][$j];
                        if ($v && in_array($v, $seen)) return false;
                        $seen[] = $v;
                    }
                }
            }
        }

        return true;  
    }
}

$ob = new Sudoku();

while (true) {
    $ob->displayGrid();

    $isComplete = true;
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            if ($ob->fixed[$i][$j] == 0) {
                $isComplete = false;
                break 2;
            }
        }
    }

    if ($isComplete) {
        break;
    }

    $ob->checkInput();
}

//$ob->displayGrid();

if ($ob->validate()) {
    echo "Success\n";
} else {
    echo "Failed\n";
}
?>
