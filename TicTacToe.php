<?php


    interface TicTacToe{

	public function display();
    }

    class TicTac implements TicTacToe{

        public $X;
        public $O;
        public $board; 
        function __construct()
        {
            $this->X = $X=0;
            $this->O = $O=0;
            $this->board = $board = [
                [' ', ' ', ' '],
                [' ', ' ', ' '],
                [' ', ' ', ' ']
                        ];


        }

        public function display(){
          
            foreach ($this->board as $row) {
                foreach ($row as $cell) {
                    echo "[{$cell}]";
                }
                echo PHP_EOL;
            }
        }
        

        public function humanPlayer($symbol)
        {
            
           $input = readline("$symbol please enter your move");

           if (!is_numeric($input) || $input < 1 || $input > 9) {
            echo "!! Invalid move \n";
            return $this->humanPlayer($symbol);

           }

            $row = floor(($input - 1) / 3);
            $col = ($input - 1) % 3;

            if ($this->board[$row][$col] !== ' '){

            echo " Already filled \n";

            return $this->humanPlayer($symbol);

           }

           $this->board[$row][$col] = $symbol;
            
        }

        public function checkGame($symbol)
        {

            $b = $this->board;


            for($i=0;$i<3;$i++){

                if ($b[$i][0] === $symbol && $b[$i][1] === $symbol && $b[$i][2] === $symbol ) return true;
                if ($b[0][$i] === $symbol && $b[1][$i] === $symbol && $b[2][$i] === $symbol ) return true;
            }

            if ($b[0][0] === $symbol && $b[1][1] === $symbol && $b[2][2] === $symbol) return true;
            if ($b[0][2] === $symbol && $b[1][1] === $symbol && $b[2][0] === $symbol) return true;

        return false;
        }
    }

    $object = new TicTac();
    $turn  = 0 ;
    $current = 'X';
    $object->display();

    while ($turn<9)
    {
        $object->humanPlayer($current);
        $object->display();
        $turn++;


        if ($object->checkGame($current)){

            echo " Player $current win***\n";
            exit;

        }
        
       if ($current === 'X'){

        $current = 'O';
       }
       else {
        $current = 'X';
       }
       
    }

    echo " It's a draw!!!!";
?>



    
