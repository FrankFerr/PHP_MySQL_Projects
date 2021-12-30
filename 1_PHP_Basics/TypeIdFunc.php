<?php
    echo "<body style=\"font-family:Verdana\">";

    $val1 = 12;
    $val2 = 12.50;
    $val3 = "Hello";
    $val4 = true;

    echo "\$val1: ", $val1, " | \$val2: ", $val2, " | \$val3: ", $val3, " | \$val4: ", $val4, "<br><br>";

    printf("\$val1 is float? %d<br>", is_float($val1));
    printf("\$val1 is numeric? %d<br>", is_numeric($val1));
    printf("\$val2 is float? %d<br>", is_float($val2));
    printf("\$val3 is string? %d<br>", is_string($val3));
    printf("\$val4 is bool? %d<br>", is_bool($val4));

?>