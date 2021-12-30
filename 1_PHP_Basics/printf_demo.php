<?php
    $qta = 22;
    $prezzo = 13.50;
    $prodotto = "Mouse";

    printf("%s, quantità: %d prezzo: %.2f", $prodotto, $qta, $prezzo);

    $output = sprintf("%s, quantità: %d prezzo: %.2f", $prodotto, $qta, $prezzo);

    echo "<br>";
    
    print($output);
?>