<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    //COME SPIEGATO NELLA SEZIONE 'LUNGHEZZA STRINGHE' LE FUNZIONI SULLE STRINGHE
    //TRATTANO I BYTES DELLA STRINGA. PER ELABORARE I CARATTERI INVECE DOVREMMO USARE 
    //LA FAMIGLIA DELLE FUNZIONI 'mb_nomefunzione()'


    //LUNGHEZZA STRINGHE ---------------------------------------------------------->
    echo "<-------------- strlen()/mb_strlen() -----------------------><br><br>";

    $str = "abc";
    $str2 = "aòc";

    //Quando utilizziamo le parentesi quadre per accedere ai caratteri di una stringa in realtà
    //stiamo accedendo ai sui bytes, infatti in str2 la 'c' la troviamo all'indice numero 3 perchè
    //il carattere 'ò' occupa 2 bytes e non 1 come i caratteri normali

    echo "str[0]: $str[0], str[1]: $str[1], str[2]: $str[2]<br>";
    echo "strlen(\$str): ".strlen($str)."<br>"; // -> 3
    echo "mb_strlen(\$str): ".mb_strlen($str)."<br><br>"; // -> 3

    echo "str2[0]: $str2[0], str2[1]: $str2[1], str2[2]: $str2[2], str2[3]: $str2[3]<br>";

    //la funzione strlen() ci restituisce la grandezza di una stringa in bytes, ecco perchè ci restituisce 4 (1 byte per 'a', 2 bytes per 'ò', 1 bytes per 'c')
    echo "strlen(\$str2): ".strlen($str2)."<br>"; // -> 4

    //mentre con la funzione mb_strlen() ci verrà restituito il numero dei caratteri, quindi 3
    echo "mb_strlen(\$str2): ".mb_strlen($str2)."<br>"; // -> 3


    // COMPARE STRING ----------------------------------------------------------->
    // ci sono quattro funzioni per comparare le stringhe
    echo "<br><br><-------------- strcmp()/strcasesmp() -----------------------><br><br>";

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
        echo "sono diverse<br>";
    else
        echo "sono uguali<br>";

    
    //-------------------------------------------------------------------------------------------->
    echo "<br><br><-------------- strspn()/strcspn() -----------------------><br><br>";
    /* strspn() ritorna la lunghezza del primo segmento di caratteri della prima stringa che 
    si trovano anche nella seconda stringa.
    $start (opzionale) serve per decidere da dove inizia la stringa (== offset)
    $length (opzionale) serve per decidere la lunghezza della prima stringa partendo da $start */

    $password = "3312345";
    echo "strspn('$password', '1234567890'): ".strspn("$password", "1234567890");

    if(strspn($password, "1234567890") == strlen($password))
        echo "la password contiene solo numeri<br>";

    /* strcspn() ritorna la lunghezza del primo segmento di caratteri della prima stringa che 
    non si trovano nella seconda stringa. $start e $length si comportano come in strspn() */
    echo "<br>";
    $password = "abc1234";
    echo "strcspn('$password', '1234567890'): ".strcspn("$password", "1234567890");
    if(strcspn($password, "1234567890") != 0)
        echo "<br>la password non contiene solo numeri<br>";
    

        
    // MANIPULATE CASE STRING ----------------------------------------------------------->
    echo "<br><br><-------------- strtolower()/strtoupper()/ucfirst()/lcfirst() -------------><br>";

    echo "<br>strtolower('EXAMPLE'): ".strtolower('EXAMPLE');
    echo "<br>strtoupper('example'): ".strtoupper('example');
    echo "<br>ucfirst('hamburgher'): ".ucfirst("hamburgher");
    echo "<br>lcfirst('HAMBURGHER'): ".lcfirst("HAMBURGHER");
    echo '<br>ucwords("this is a long sentence"): '.ucwords("this is a long sentence");
  
    echo "<br>";
    
    //MANIPULATE STRING --------------------------------------------------->

    //<------------------ Explode/Implode -------------------------------------->
    echo "<br><br><-------------- explode()/implode() -------------><br><br>";

    $str = 'Ciao sono Francesco e sono un web dev';
    
    //divide una stringa (2° parametro) utilizzando il 1° parametro come separatore
    //restituendo un array con gli elementi separati
    $arr = explode(' ', $str);

    echo 'explode(\' \', $str): ';
    print_r($arr);
    
    echo "<br>";

    //il terzo parametro indica quante separaioni si devono fare
    $arr = explode(' ', $str, 4);

    echo 'explode(\' \', $str, 4): ';
    print_r($arr)."<br>";

    echo "<br>";

    $arr2 = ["Ciao", "sono", "Francesco", "e", "sono", "un", "web", "dev"];
    //con la funzione 'implode' si uniscono gli elementi di un array in una stringa
    //separati tra di loro con il carattere passato come primo parametro
    $str = implode(' ', $arr2);
    var_dump($str);
    echo "<br><br>";


    //<------------------- trim/ltrim/rtrim --------------------------->
    echo "<br><-------------- trim()/ltrim()/rtrim() -------------><br><br>";

    //con trim() si rimuovono gli spazi bianchi dall'inizio e fine di una stringa
    //ltrim() rimuove solo all'inizio, rtrim() rimuove solo alla fine
    $str3 = '    Hello World!  ';
    echo '$str3: ', var_dump($str3), '<br>';
    echo 'trim(): ', var_dump(trim($str3)), '<br>';
    echo 'ltrim(): ', var_dump(ltrim($str3)), '<br>';
    echo 'rtrim(): ', var_dump(rtrim($str3)), '<br>';

    echo '<br>';

    //<-------------------------- strpos/strrpos ------------------------------->
    echo "<br><-------------- strpos()/strrpos() -------------><br><br>";

    $str = 'Ciao sono Francesco e sviluppo in php';
    //strpos ritorna la posizione della prima occorrenza di un carattere o una stringa(2° par.)
    //in una stringa(1° par.). Restituisce false se non c'è, la funzione è case sensitive
    echo 'strpos(\'o\', $str): ', strpos($str, 'o'), '<br>';

    //il terzo parametro è l'offset per decidere da dove iniziare il controllo, se è positivo
    //la ricerca parte dall'inizio dopo 'offset' caratteri mentre se è negativo parte dalla fine
    //e torna indietro di 'offset' caratteri
    echo 'strpos(\'o\', $str, 5): ', strpos($str, 'o', 5), '<br>';
    echo 'strpos(\'o\', $str, -8): ', strpos($str, 'o', -8), '<br><br>';

    ////strpos ritorna la posizione dell'ultima occorrenza di un carattere o una stringa(2° par.)
    //in una stringa(1° par.). Restituisce false se non c'è, la funzione è case sensitive
    echo 'strrpos(\'p\', $str): ', strrpos($str, 'p'), '<br>';
    echo 'strrpos(\'p\', $str, 5): ', strrpos($str, 'p', -2), '<br>';
    echo '<br>';

    //<-------------------------------- substr ------------------------------------>
    echo "<br><----------------------- substr() ----------------------><br><br>";
    
    $str = 'Ciao sono Francesco e sviluppo in php';

    //substr restituisce una sottostringa partendo da un altra stringa.
    //1° Param. -> stringa di partenza
    //2° Param. -> numero intero che indica da che posizione della stringa iniziale partire
    //3° Param. (opzionale) -> numero intero che indica la lunghezza in bytes della sottostringa,
    //                         se non si inserisce nulla la lunghezza sarà da 'offset' a
    //                         'fine della stringa inisizale' 
    $subStr = substr($str, 0, 4);
    echo '$str == '.$str.'<br>';
    echo 'substr($str, 0, 4) -> ',var_dump($subStr),'<br>';

    $subStr = substr($str, strpos($str, 'F'), 9);
    echo 'substr($str, strpos($str, \'F\'), 9) -> ', var_dump($subStr), '<br>';
    
?>