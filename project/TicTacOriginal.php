<?php

enum Mark: string {
    case X = 'X';
    case O = 'O';
    case EMPTY = ' ';
}

class Position {
    public function __construct(public int $row, public int $col) {}
}

class Cell {
    private Mark $mark;

    public function __construct() {
        $this->mark = Mark::EMPTY;
    }

    public function isEmpty(): bool {
        return $this->mark === Mark::EMPTY;
    }

    public function getMark(): Mark {
        return $this->mark;
    }

    public function setMark(Mark $mark): void {
        if (!$this->isEmpty()) {
            throw new Exception("Cell already filled.");
        }
        $this->mark = $mark;
    }
}

class Board {
    private array $cells;

    public function __construct() {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $this->cells[$i][$j] = new Cell();
            }
        }
    }

    public function display(): void {
        echo "\n";
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                echo "[" . $this->cells[$i][$j]->getMark()->value . "]";
            }
            echo "\n";
        }
        echo "\n";
    }

    public function isCellEmpty(Position $pos): bool {
        return $this->cells[$pos->row][$pos->col]->isEmpty();
    }

    public function placeMark(Position $pos, Mark $mark): void {
        $this->cells[$pos->row][$pos->col]->setMark($mark);
    }

    public function checkWin(Mark $symbol): bool {
        $b = $this->cells;

        for ($i = 0; $i < 3; $i++) {
            if ($b[$i][0]->getMark() === $symbol && $b[$i][1]->getMark() === $symbol && $b[$i][2]->getMark() === $symbol) return true;
            if ($b[0][$i]->getMark() === $symbol && $b[1][$i]->getMark() === $symbol && $b[2][$i]->getMark() === $symbol) return true;
        }

        if ($b[0][0]->getMark() === $symbol && $b[1][1]->getMark() === $symbol && $b[2][2]->getMark() === $symbol) return true;
        if ($b[0][2]->getMark() === $symbol && $b[1][1]->getMark() === $symbol && $b[2][0]->getMark() === $symbol) return true;

        return false;
    }

    public function isFull(): bool {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($this->cells[$i][$j]->isEmpty()) return false;
            }
        }
        return true;
    }

    public function getEmptyPositions(): array {
        $positions = [];
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $pos = new Position($i, $j);
                if ($this->isCellEmpty($pos)) {
                    $positions[] = $pos;
                }
            }
        }
        return $positions;
    }
}

abstract class Player {
    public function __construct(protected string $name, protected Mark $mark) {}
    abstract public function getMove(Board $board): Position;
    public function getMark(): Mark { return $this->mark; }
    public function getName(): string { return $this->name; }
}

class HumanPlayer extends Player {
    public function getMove(Board $board): Position {
        while (true) {
            $input = readline("{$this->name} ({$this->mark->value}), enter move (1-9): ");
            if (!is_numeric($input) || $input < 1 || $input > 9) {
                echo "Invalid input.\n";
                continue;
            }
            $row = intdiv($input - 1, 3);
            $col = ($input - 1) % 3;
            $pos = new Position($row, $col);

            if (!$board->isCellEmpty($pos)) {
                echo "Cell already filled.\n";
                continue;
            }
            return $pos;
        }
    }
}

class WeakBot extends Player {
    public function getMove(Board $board): Position {
        echo "{$this->name} (bot) is thinking...\n";
        $positions = $board->getEmptyPositions();
        shuffle($positions);
        return $positions[0];
    }
}

class Game {
    public function __construct(
        private Player $p1,
        private Player $p2,
        private Board $board = new Board()
    ) {}

    public function play(): void {
        $current = $this->p1;

        while (true) {
            $this->board->display();
            $move = $current->getMove($this->board);
            $this->board->placeMark($move, $current->getMark());

            if ($this->board->checkWin($current->getMark())) {
                $this->board->display();
                echo " {$current->getName()} wins!\n";
                break;
            }

            if ($this->board->isFull()) {
                $this->board->display();
                echo "It's a tie!\n";
                break;
            }

            $current = $current === $this->p1 ? $this->p2 : $this->p1;
        }
    }
}


echo "Choose opponent:\n";
echo "1. Human\n";
echo "2. Weak Bot\n";

$choice = readline("Enter 1 or 2: ");

$p1 = new HumanPlayer("Player", Mark::X);

if ($choice == "1") {
    $p2 = new HumanPlayer("Player ", Mark::O);
} else {
    $p2 = new WeakBot("Bot", Mark::O);
}

$game = new Game($p1, $p2);
$game->play();


