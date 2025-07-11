<?php
class MineField {

    public $field = [];
    public $player;
    public $mines = [3, 6, 9, 12];

    function __construct() {
        $this->field = array_fill(0, 16, '*');
        $this->field[0] = 'P';
        $this->player = readline("Enter your name: ");
    }

    public function display() {
        for ($i = 0; $i < 16; $i += 4) {
            echo "+----+----+----+----+----+\n";
            echo "|";
            for ($j = 0; $j < 4; $j++) {
                $val = $this->field[$i + $j];
                echo " " . str_pad($val, 3) . " |";
            }
            echo "\n";
        }
        echo "+----+----+----+----+----+\n";
    }

    public function escape() {
        $i = 0;
        while ($i < 4) {
            $index = (int)readline($this->player . ", choose a cell from row " . ($i+1) . ": ");

            $start = $i * 4;
            $end = $start + 3;

            if ($index < $start || $index > $end) {
                echo "Invalid choice! Please choose a cell from row " . ($i+1 ) . "\n";
                continue;
            }

            if (in_array($index, $this->mines)) {
                $this->field[$index] = 'M';
                $this->display();
                echo "MINE!!! Game Over, $this->player\n";
                exit;
            } else {
                // Clear previous 'P'
                foreach ($this->field as $k => $v) {
                    if ($v === 'P') $this->field[$k] = '*';
                }
                $this->field[$index] = 'P';
                echo "SAFE! Go to the next level.\n";
                $this->display();
                $i++;
            }
        }

        echo "Congratulations $this->player! You escaped the minefield safely.\n";
    }
}

$object = new MineField();
$object->display();
$object->escape();
