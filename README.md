# GLIF
Quick n dirty scripts for glitching JPEGs and creating animated GIFs out of them.

I wrote the code for creating an animated glitch GIF of the cover art for the landing page of my song [The Sea](https://strdl.de/listen/the-sea).

<a href="https://strdl.de/listen/the-sea">
    <img src="https://raw.githubusercontent.com/ledeniz/glif/master/example.gif" alt="Example of a glitched GIF" />
</a>

## Overview
- ```glif.php```
  - static usable class for (iterative) data corruption
- ```frames.php```
  - generates a variety of glitched JPEGs
- ```index.php```
  - produces a gif with a random selection from ```frames/``` and ```input.jpg```

- ```frames/index.php```
  - displays a gallery of the images in ```frames/```
 
## Problems
Since the corruption process is literally random, some of the resulting JPEGs may not be valid pictures at all.
I recommend using imagemagick as a way to streamline them, example: ```for file in frames/*.jpg; do convert $file $file; done```

Also I noticed that ```index.php``` does not have a 100% success rate of creating a valid GIF 100%, but it seems to work most of the time.
This is probably due too corrupt JPEGs.