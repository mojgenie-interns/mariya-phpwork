<?php

class QuizManager {
    public $dataFile = "questions.json";
    public $questions = [];

    public function __construct() {
        if (file_exists($this->dataFile)) {
            $json = file_get_contents($this->dataFile);
            $this->questions = json_decode($json, true) ?? [];
        }
    }

    public function menu() {
        while (true) {
            echo "\n=== QUIZ MANAGER ===\n";
            echo "1. Add Question\n";
            echo "2. Take Quiz\n";
            echo "3. Exit\n";

            $choice = readline("Enter your choice (1/2/3): ");

            switch ($choice) {
                case 1:
                    $this->addQuestion();
                    break;
                case 2:
                    $this->takeQuiz();
                    break;
                case 3:
                    echo "Goodbye!\n";
                    exit;
                default:
                    echo "Invalid choice. Try again.\n";
            }
        }
    }

    public function addQuestion() {
        echo "\n--- Add a New Question ---\n";
        $question = readline("Enter the question: ");
        $options = [];
        $options['A'] = readline("Option A: ");
        $options['B'] = readline("Option B: ");
        $options['C'] = readline("Option C: ");
        $options['D'] = readline("Option D: ");
        $answer = strtoupper(readline("Correct answer (A/B/C/D): "));

        if (!in_array($answer, ['A', 'B', 'C', 'D'])) {
            echo "Invalid answer. Question not added.\n";
            return;
        }

        $this->questions[] = [
            'question' => $question,
            'options' => $options,
            'answer' => $answer
        ];

        file_put_contents($this->dataFile, json_encode($this->questions, JSON_PRETTY_PRINT));
        echo "Question added successfully.\n";
    }

    public function takeQuiz() {
        if (empty($this->questions)) {
            echo "No questions available. Add questions first.\n";
            return;
        }

        echo "\n--- Starting Quiz ---\n";
        $score = 0;
        $total = count($this->questions);

        foreach ($this->questions as $index => $q) {
            echo "\nQ" . ($index + 1) . ". " . $q['question'] . "\n";
            foreach ($q['options'] as $key => $value) {
                echo "$key) $value\n";
            }

            $userAnswer = strtoupper(readline("Your answer: "));
            if ($userAnswer == $q['answer']) {
                echo "Correct!\n";
                $score++;
            } else {
                echo "Wrong! Correct answer: " . $q['answer'] . "\n";
            }
        }

        $percentage = ($score / $total) * 100;
        echo "\n--- Quiz Completed ---\n";
        echo "Your Score: $score / $total\n";
        echo "Percentage: $percentage%\n";
    }
}

$quiz = new QuizManager();
$quiz->menu();
