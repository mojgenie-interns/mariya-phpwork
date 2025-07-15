<?php

class Chatbot {

    public $chat;

    public function getChat() {
        $this->chat = strtolower(readline("CHAT: "));
    }

    public function getAnswer() {
        
        if (strpos($this->chat, 'hi') !== false || strpos($this->chat, 'hello') !== false) {
            echo "BOT: Hi, hello! How are you?\n";
        } elseif (strpos($this->chat, 'your name') !== false || strpos($this->chat, 'name') !== false) {
            echo "BOT: My name is Chatbot.\n";
        } elseif (strpos($this->chat, 'who are you') !== false || strpos($this->chat, 'who') !== false) {
            echo "BOT: I am a chatbot.\n";
        } elseif (strpos($this->chat, 'bye') !== false || strpos($this->chat, 'thank you') !== false) {
            echo "BOT: Goodbye!\n";
            exit;
        } else {
            echo "BOT: I'm not sure how to respond to that.\n";
        }
    }
}

$object = new Chatbot();

while (true) {
    $object->getChat();
    $object->getAnswer();
}
