<?php

$files = glob('*.jpg');

?>
<html>
    <head>
        <style type="text/css">
            * {
                padding:0;
                margin:0;

                text-align: center;
            }

            body {
                background:#000;
            }

            .container {
                position: absolute;
                width:100%;
                left: 50%;
                transform: translateX(-50%);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <?php foreach ($files as $file): ?><img src="<?= $file; ?>" /><?php endforeach; ?>
        </div>
    </body>
</html>
