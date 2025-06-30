<?php

    //creating interface to specify how the grid should be displayed

    interface GridDisplayInterface{

        public function gridDisplay();

    }

    class CircularGrid {


        public $currentRow;
        public $currentCol;
        public $size;
        public $data;


         public function __construct($size)
        {
            $this->currentRow = $currentRow = 0;
            $this->currentCol = $currentCol  = 0;
            $this->size = $size; 

            $this->data = array_fill(0, $size, array_fill(0, $size, 0));
        }

        public function moveUpRight()
        {

            $this->currentRow = $this->currentRow-1;
            $this->currentCol = $this->currentCol+1;


        }

        public function moveDown()
        {

            $this->currentRow = $this->currentRow+1;
            $this->currentCol = $this->currentCol;
        }






    }