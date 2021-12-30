<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    $str = "stringa di prova";

    echo "\$str = 'stringa di prova'";
    echo "<br><br>";

    // strlen() --> ritorna la lunghezza della stringa
    echo "strlen(\$str): ".strlen($str)."<br>";

    // COMPARE STRING
    // ci sono quattro funzioni per comparare le stringhe
    echo "<br>COMPARE STRING<br><br>";

    /* strcmp() effettua una comparazione case-sensitive tra due stringhe, i valori restituiti sono
    - 0 se le stringhe sono uguali
    - 1 se la seconda stringa è minore
    - -1 se la prima strings è minore
    una stringa è minore dell'altra quando viene prima in ordine alfabetico */
    echo "strcmp('casa', 'casa'): ".strcmp('casa', 'casa')."<br>";
    echo "strcmp('caso', 'casa'): ".strcmp('caso', 'casa')."<br>";
    echo "strcmp('casa', 'caso'): ".strcmp('casa', 'caso')."<br>";

    /* strcasecmp() è simile a strcmp() solo che la comparazione e case-insensitive */
    echo "<br>strcasecmp('admin@example.com', 'ADMIN@example.com'): ";
    if(strcasecmp('admin@example.com', 'ADMIN@example.com') != 0)
        echo "sono diverse";
    else
        echo "sono uguali";

    
    /* strspn() ritorna la lunghezza del primo segmento di caratteri della prima stringa che 
    si trovano anche nella seconda stringa.
    $start (opzionale) serve per decidere da dove inizia la stringa (== offset)
    $length (opzionale) serve per decidere la lunghezza della prima stringa partendo da $start */
    echo "<br><br>";
    $password = "3312345";
    echo "strspn('$password', '1234567890'): ".strspn("$password", "1234567890");
    if(strspn($password, "1234567890") == strlen($password))
        echo "<br>la password contiene solo numeri<br>";

    /* strcspn() ritorna la lunghezza del primo segmento di caratteri della prima stringa che 
    non si trovano nella seconda stringa. $start e $length si comportano come in strspn() */
    echo "<br>";
    $password = "abc1234";
    echo "strcspn('$password', '1234567890'): ".strcspn("$password", "1234567890");
    if(strcspn($password, "1234567890") != 0)
        echo "<br>la password non contiene solo numeri<br>";
    

    // MANIPULATE CASE STRING

    echo "<br>strtolower('EXAMPLE'): ".strtolower('EXAMPLE');
    echo "<br>strtoupper('example'): ".strtolower('example');
    echo "<br>ucfirst('hamburgher'): ".ucfirst("hamburgher");
    echo "<br>lcfirst('HAMBURGHER'): ".lcfirst("HAMBURGHER");
    echo '<br>ucwords("this is a long sentence"): '.ucwords("this is a long sentence");
    
?>