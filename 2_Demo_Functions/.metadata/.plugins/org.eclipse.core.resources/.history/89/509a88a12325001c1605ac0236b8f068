<?php
    echo '<head><style>body,pre{font-family:Verdana}td{padding: 50px}</style></head>';

    /*
    *   array_intersect()/array_intersect_key() restituiscono un array contenente tutti i valori/chiavi
    *    che compaiono nel primo array passato come argomento  e in tutti gli altri array passati.
    *   Per capire se due elementi sono uguali la funzione fa una comparazione sul valore, quindi 1 e "1"
    *   sono diversi. Nel caso di array_intersect() la chiave viene mantenuta nel nuovo array mentre
    *   in array_intersect_key() viene mantenuto il valore.
    */

    $num1 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];
    $num2 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];
    $num3 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];

    $intersect = array_intersect($num1, $num2, $num3);

    echo '<table><tr><td>$num1:<br><pre>'.print_r($num1, true).'</pre></td><td>$num2:<br><pre>'.print_r($num2, true).'</pre></td>'.
         '<td>$num3:<br><pre>'.print_r($num3, true).'</pre></td></tr></table>';

    echo "\$intersect:<br><pre>".print_r($intersect, true)."<pre>";

    echo "<br><hr><br>";

    $checkEven = function ($a, $b){
        if($a % 2 == 0 && $b % 2 == 0)
            return $a <=> $b;

        return 1;
    };

    $num1 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];
    $num2 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];
    $num3 = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];

    $intersectEven = array_uintersect($num1, $num2, $num3, $checkEven);

    echo '<table><tr><td>$num1:<br><pre>'.print_r($num1, true).'</pre></td><td>$num2:<br><pre>'.print_r($num2, true).'</pre></td>'.
         '<td>$num3:<br><pre>'.print_r($num3, true).'</pre></td></tr></table>';

    echo "\$intersectEven:<br><pre>".print_r($intersectEven, true)."<pre>";
?>