<?php

    enum Mark : string{

        case X = 'X';
        case O = 'O';
        case EMPTY = ' ';
    
    }

    enum BroadState : string{

        case PLAYING = 'Playing';
        case  X_WON = 'X Won';
        case  O_won = 'O_Won';
        case TIE = 'Tie';
    }

    interface BoardDisplay{


        public function consoleDisplay();

    }

    class Position{
        
    }