<?php
class PollSystem {

    public $puzzle;
    public $countA;
    public $countB;
    public $countC;
    public $countD;
    public $maxPoll;

    function __construct() {
        $this->puzzle = [
            'question' => "Which database is NoSQL?",
            'options' => ['A) MySQL', 'B) MongoDB', 'C) PostgreSQL', 'D) Oracle']
        ];
        $this->countA = 0;
        $this->countB = 0;
        $this->countC = 0;
        $this->countD = 0;
        $this->maxPoll = 0;
    }

    public function pollSystem() {
        while ($this->maxPoll < 16) {
            $this->display();

            $poll = strtoupper(readline("Enter your poll (A/B/C/D): "));
            switch ($poll) {
                case 'A':
                    $this->countA++;
                    break;
                case 'B':
                    $this->countB++;
                    break;
                case 'C':
                    $this->countC++;
                    break;
                case 'D':
                    $this->countD++;
                    break;
                default:
                    echo "Invalid option. Try again.\n";
                    break;
            }
                 $this->maxPoll++;
        }

    }

    public function display() {
        echo "\n" . $this->puzzle['question'] . "\n";
        foreach ($this->puzzle['options'] as $option) {
            echo $option . "\n";
        }
    }

    public function result() {
        $votes = [
            'A' => $this->countA,
            'B' => $this->countB,
            'C' => $this->countC,
            'D' => $this->countD,
        ];

        $maxVotes = max($votes);
        $winners = array_keys($votes, $maxVotes); 

        echo "\n=== POLL RESULT ===\n";
        foreach ($votes as $opt => $count) {
            echo "$opt: $count votes\n";
        }

        echo "HIGHEST POLL: ";
        echo implode(', ', $winners) . " with $maxVotes votes\n";
    }
}

$object = new PollSystem();
$object->pollSystem();
$object->result();
