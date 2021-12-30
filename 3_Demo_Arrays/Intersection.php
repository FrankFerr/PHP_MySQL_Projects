<?php
    echo '<head><style>body,pre{font-family:Verdana}td{padding: 50px}</style></head>';

    /*
    *   array_intersect()/array_intersect_key() restituiscono un array contenente tutti i valori/chiavi
    *    che compaiono nel primo array passato come argomento  e in tutti gli altri array passati.
    *   Per capire se due elementi sono uguali la funzione fa una comparazione sul valore, quindi 1 e "1"
    *   sono diversi. Nel caso di array_intersect() la chiave viene mantenuta nel nuovo array mentre
    *   in array_intersect_key() viene mantenuto il valore.
    *
    *   array_uintersect() e array_intersect_ukey() funzionano allo stesso modo delle altre due ma la
    *   comparazione avviene in base al criterio definito dall'utente nella funzione passata come
    *   secondo argomento. La funzione deve avere due parametri e ritornare -num, 0, +num rispettivamente 
    *   se il primo valore è minore, uguale o maggiore del secondo
    */
    
    $num1 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];
    $num2 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];
    $num3 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];

    $intersect = array_intersect($num1, $num2, $num3);

    echo '<table><tr><td>$num1:<br><pre>'.print_r($num1, true).'</pre></td><td>$num2:<br><pre>'.print_r($num2, true).'</pre></td>'.
         '<td>$num3:<br><pre>'.print_r($num3, true).'</pre></td></tr></table>';

    echo "\$intersect:<br><pre>".print_r($intersect, true)."<pre>";

    echo "<br><hr><br>";

    //-------------------------------------------------------------------------------------------------------

    /*
    *   array_intersect_assoc() funziona allo stesso modo di array_intersect() solo che la prima prende
    *   in considerazione anche le chiavi, quindi controlla se la coppia chiave/valore è uguale alle altre
    *
    *   array_uintersect_assoc() funziona come  array_intersect_assoc() ma accetta come ultimo argomento una
    *   funzione per comparare i valori (le chiavi vengono comparate normalmente)
    *
    *   array_intersect_uassoc() funziona come  array_intersect_assoc() ma accetta come ultimo argomento una
    *   funzione per comparare le chiavi (i valori vengono comparati normalmente)
    *
    *   array_uintersect_uassoc() funziona come  array_intersect_assoc() ma accetta come ultimi due valori
    *   una funzione per comparare i valori e una funzione per comparare le chiavi
    */

    $array1 = array("OH" => "Ohio", "CA" => "California", "HI" => "Hawaii");
    $array2 = array("50" => "Hawaii", "CA" => "California", "OH" => "Ohio");
    $array3 = array("TX" => "Texas", "MD" => "Maryland", "OH" => "Ohio");

    
    $intersectAssoc = array_intersect_assoc($array1, $array2, $array3);

    echo '<table><tr><td>$array1:<br><pre>'.print_r($array1, true).'</pre></td><td>$array2:<br><pre>'.print_r($array2, true).'</pre></td>'.
         '<td>$array3:<br><pre>'.print_r($array3, true).'</pre></td></tr></table>';

    echo "\$intersectAssoc:<br><pre>".print_r($intersectAssoc, true)."<pre>";

    echo "<br><hr><br>";

    //---------------------------------------------------------------------------------------------------------

    /*
    *   le funzioni array_diff(), array_diff_key(), array_udiff(), array_diff_ukey(), array_diff_assoc(), array_udiff_assoc(),
    *   array_diff_uassoc(), array_udiff,uassoc() restituiscono un array contenente tutti i valori/chiavi che compaiono
    *   nel primo array passato come argomento e non compaiono in tutti gli altri array passati. Per il resto si comportano
    *   come le rispettive "intersect"
    */

    $num1 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];
    $num2 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];
    $num3 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];

    $diff = array_diff($num1, $num2, $num3);

    echo '<table><tr><td>$num1:<br><pre>'.print_r($num1, true).'</pre></td><td>$num2:<br><pre>'.print_r($num2, true).'</pre></td>'.
         '<td>$num3:<br><pre>'.print_r($num3, true).'</pre></td></tr></table>';

    echo "\$diff:<br><pre>".print_r($diff, true)."<pre>";

    echo "<br><hr><br>";

    $array1 = array("OH" => "Ohio", "CA" => "California", "HI" => "Hawaii");
    $array2 = array("50" => "Hawaii", "CA" => "California", "OH" => "Ohio");
    $array3 = array("TX" => "Texas", "MD" => "Maryland", "OH" => "Ohio");

    
    $diffAssoc = array_diff_assoc($array1, $array2, $array3);

    echo '<table><tr><td>$array1:<br><pre>'.print_r($array1, true).'</pre></td><td>$array2:<br><pre>'.print_r($array2, true).'</pre></td>'.
         '<td>$array3:<br><pre>'.print_r($array3, true).'</pre></td></tr></table>';

    echo "\$diffAssoc:<br><pre>".print_r($diffAssoc, true)."<pre>";

    echo "<br><hr><br>";
?>