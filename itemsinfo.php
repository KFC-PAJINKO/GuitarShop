<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guitar Item Info Page</title>
        <link rel="stylesheet" href="itemsinfo.css">
    </head>
    <body>
        <h1>This is item info page</h1>
        <?php
            require('connect.php');
            echo "Guitar ID: " . $_GET['gid'];
        ?>
    </body>
</html>