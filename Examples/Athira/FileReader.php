<?php

class FileReader {

    public function read() {
        $filename = "hi.txt";
        $myfile = fopen($filename, "r") or die("Unable to open file!");
        echo fread($myfile, filesize($filename));
        fclose($myfile);
    }
}

$object = new FileReader();
$object->read();