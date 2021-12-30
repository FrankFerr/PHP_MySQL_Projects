<?php
    echo "<body style=\"font-family:Verdana\">";

    //Preferred
    define("PI", 3.14); //il terzo parametro è un valore booleano per decidere se deve essere case-sensitive; -> eliminato da PHP 7.3.0 
    const FEETMILE = 5280;

    printf("constant PI = %f<br>", PI);
    printf("constant FEETMILE: %d<br>", FEETMILE);

?>