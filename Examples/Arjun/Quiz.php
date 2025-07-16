<?php

class QuizGame{

    private array $questions = [];

    public function __construct()
    {

        $this->questions = [
           
                [
                    'question' => "Which language runs in a web browser?",
                    'options' => ['A) Java', 'B) C', 'C) Python', 'D) JavaScript'],
                    'answer' => 'D'
                ],
                [
                    'question' => "What does CSS stand for?",
                    'options' => ['A) Cascading Style Sheets', 'B) Computer Style Sheet', 'C) Creative Style Syntax', 'D) Control Style System'],
                    'answer' => 'A'
                ],
                [
                    'question' => "Which of the following is a backend language?",
                    'options' => ['A) HTML', 'B) CSS', 'C) PHP', 'D) Bootstrap'],
                    'answer' => 'C'
                ],
                [
                    'question' => "Which database is NoSQL?",
                    'options' => ['A) MySQL', 'B) MongoDB', 'C) PostgreSQL', 'D) Oracle'],
                    'answer' => 'B'
                ],
                [
                    'question' => "Which tag is used to create a hyperlink in HTML?",
                    'options' => ['A) <link>', 'B) <href>', 'C) <a>', 'D) <url>'],
                    'answer' => 'C'
                ]
            
            ];
    }

    public function quiz()
    {
        shuffle($this->questions);
       

        foreach ($this->questions as $q) {
            echo "\n" . $q['question'] . "\n";
            foreach ($q['options'] as $option) {
                echo $option . "\n";
            }

            $input = strtoupper(readline("Enter an option: "));

            if ($input == $q['answer']) {
                echo "Correct\n";
                exit;
               
            } else {
                echo "Wrong\nCorrect answer is " . $q['answer'] . "\n";
                exit;
            }
        }
    }
}

$quiz = new QuizGame();
$quiz->quiz();