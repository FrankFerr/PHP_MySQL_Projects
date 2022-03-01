<head><style>*{font-family: 'Gill Sans', 'Gill Sans MT';font-size: 1.2rem;}</style></head>

<?php

    /* mktime() restituisce i secondi passati dalla 'Epoca Unix' alla data passata come
    argomento (non passata come stringa ma ogni singolo numero). Se non passiamo nessun
    argomento si comporta come la funzione time() */

    //con solo la data
    echo 'mktime(0, 0, 0, 6, 19, 1997): '.mktime(0, 0, 0, 6, 19, 1997).'<br><br>';

    $timestamp = mktime(0, 0, 0, 6, 19, 1997);
    echo 'date(\'d-m-Y\', $timestamp): '.date('d-m-Y', $timestamp).'<br><br>';

    //data e ora
    echo 'mktime(11, 1, 20, 2, 27, 2022): '.mktime(11, 1, 20, 2, 27, 2022).'<br><br>';

?>