<?php

    include_once 'validation.php';

    $stato = form();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?ts=<?=time()?>&quot">
    <title>Gestione Form</title>
</head>
<body>

    <h1>Gestione form lato server</h1>
    <hr><br>

    <?php
        echo $stato['message'];
        echo $stato['messageUpload'];


        if(!$stato['send'] || $stato['error'])
        {
            require_once 'form.php';
        }
    ?>

    <hr><br>


</body>
</html>