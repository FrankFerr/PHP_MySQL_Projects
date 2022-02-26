<?php

    $var = 'Francesco <a href="">link malevolo</a>';

    //deprecato -> usare al suo posto htmlspecialchars()
    $var = filter_var($var, FILTER_SANITIZE_STRING);

    echo $var;

?>