<?php
    echo '<head><style>body,pre{font-family:Verdana}td{padding: 50px}</style></head>';

    /*
    *   array_rand() restituisce un array con le chiavi prese casualmente dall'array passato come argomento,
    *   il secondo argomento è un intero che specifica quante chiavi prendere sempre in modo casuale
    *
    *   shuffle() mischia l'ordine degli elementi dell'array passato come argomento
    *
    *   array_chunk() restituisce un array multidimensionale le cui creato dalla suddivisione dell'array
    *   passato come primo argomento, la grandezza di ogni "sotto-array" viene specificata con un intero
    *   passato come secondo argomento
    *
    *   array_sum() fa la somma di tutti i numeri e stringhe numeriche trovate nell'array passato come
    *   argomento e ne restituisce il risultato, se nell'array ci sono stringhe letterali vengono ignorate
    */

    $num1 = ["dieci" => 10, "nove" =>  9, "otto" =>   8, "sette" =>   7, "sei" =>   6, "cinque" =>   5,
             "quattro" => 4, "tre" => 3, "due" =>  2, "uno" =>  1];

    echo '<table><tr><td>$num1:<br><pre>'.print_r($num1, true).'</pre></td><td>array_rand($num1, 5):<br><pre>'
         .print_r(array_rand($num1, 5), true).'</pre></td>';

    shuffle($num1);

    echo '<td>shuffle($num1):<br><pre>'.print_r($num1, true).'</pre></td></tr></table>';

    $cards = array("jh", "js", "jd", "jc", "qh", "qs", "qd", "qc", "kh", "ks", "kd", "kc", "ah", "as", "ad", "ac");

    shuffle($cards);

    $hands = array_chunk($cards, 4);

    echo "<br>array_chunk(\$cards, 4):<br><pre>".print_r($hands, true)."</pre>";
?>