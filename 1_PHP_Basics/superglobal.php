<?php
    echo "<body style=\"font-family:Verdana\">";

    foreach($_SERVER as $idx => $value)
        echo "$idx: $value<br>";


    echo "<br>HTTP_REFERER: {$_SERVER['HTTP_REFERER']}<br>";
?>