<?php
class MazeRunner{
 
    public $maze = [];

    function __construct()
    {
        $this->maze = [['S','1','0','0'],
                        ['0','1','1','0'],
                        ['0','0','0','0'],
                        ['0','1','1','E']
                    ];
    }


    public function findPath() {
            $rows = count($this->maze);
            $cols = count($this->maze[0]);

            $start = null;
            $end = null;

            for ($i = 0; $i < $rows; $i++) {
                for ($j = 0; $j < $cols; $j++) {
                    if ($this->maze[$i][$j] == 'S') $start = [$i, $j];
                    if ($this->maze[$i][$j] == 'E') $end = [$i, $j];
                }
            }

            if (!$start || !$end) {
                echo "Start or End not found.\n";
                return;
            }

            $queue = [ [$start, [$start]] ];
            $visited = [];
            $directions = [[-1,0], [1,0], [0,-1], [0,1]]; 

            while (!empty($queue)) {
                list($pos, $path) = array_shift($queue);
                list($r, $c) = $pos;

                if (isset($visited["$r,$c"])) continue;
                $visited["$r,$c"] = true;

                if ($this->maze[$r][$c] === 'E') {
                    echo "Path found:\n";
                    foreach ($path as $step) {
                        echo "(" . $step[0] . "," . $step[1] . ") ";
                    }
                    echo "\n";
                    return;
                }

                foreach ($directions as $d) {
                    $nr = $r + $d[0];
                    $nc = $c + $d[1];

                    if (
                        $nr >= 0 && $nr < $rows &&
                        $nc >= 0 && $nc < $cols &&
                        ($this->maze[$nr][$nc] === '1' || $this->maze[$nr][$nc] === 'E') &&
                        !isset($visited["$nr,$nc"])
                    ) {
                        $newPath = $path;
                        $newPath[] = [$nr, $nc];
                        $queue[] = [[$nr, $nc], $newPath];
                    }
                }
            }

            echo "No path found.\n";
    }


}

$object = new MazeRunner();
$object->findPath();
