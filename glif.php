<?php

class Glif {
    static public $iterations = 10;
    static public $inputFile = 'input.jpg';
    static public $outputDir = './frames';

    static public $data;

    static public $count = 1;

    static public function corrupt($content) {
        $image = $content;

        foreach($image as $offset => $byte) {
            if(rand(0, 10000) > 0 || $offset < 10) {
                continue;
            }
        
            $byte = chr(rand());
        
            $image[$offset] = $byte;
        }

        return $image;
    }

    static public function getInputArray() {
        $input = file_get_contents(self::$inputFile);
        $input = str_split($input);

        return $input;
    }

    static public function getOutputFilePath() {
        $path = self::$outputDir;
        $path .= DIRECTORY_SEPARATOR;
        $path .= uniqid();
        $path .= '.jpg';

        return $path;
    }

    static public function write($image) {
        return file_put_contents(self::getOutputFilePath(), $image);
    }

    static public function generateFrame() {
        $image = self::$data;
        $image = self::corrupt($image);

        echo self::$count, " ";

        self::write($image);
        self::$count++;
    }

    static public function run() {
        if (! is_dir(self::$outputDir)) {
            mkdir(self::$outputDir);
        }

        self::$data = self::getInputArray();
 
        for($i=0; $i<self::$iterations; $i++) {
            self::generateFrame();
        }        
    }
}

