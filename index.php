<?php

use GifCreator\GifCreator;

require 'vendor/autoload.php';

$frames = [];
$durations = [];

$iterations = 30;

$original = realpath('input.jpg');
$original = imagecreatefromjpeg($original);

$glitches = scandir('./frames/');

for ($i=0; $i<$iterations;$i++) {
    if (rand(0, 5) == 0) {
        $glitch = rand(0, count($glitches)-1);
        $frame = @imagecreatefromjpeg(realpath('frames/'.$glitches[$glitch]));

        $frames[] = $frame;
        $durations[] = rand(4, 12);
    } else {
        $frames[] = $original;
        $durations[] = 17;
    }
}

$gc = new GifCreator();
$gc->create($frames, $durations);
$gif = $gc->getGif();

$id = uniqid();

// save the gif to disk
//file_put_contents('gif/'.$id.'.gif', $gif);

header('Content-type: image/gif');
header('Content-Disposition: filename="'.$id.'.gif"');

echo $gif;

exit;
