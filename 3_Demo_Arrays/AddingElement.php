<?php
    echo '<head><style>body, pre{font-family:Verdana}</style></head>';

    //AGGIUNTA -----------------------------------------------

    //array_unshift() aggiunge elementi in testa all'array
    $city = ["Roma", "Napoli"];
    $total = array_unshift($city, "Cagliari", "Milano");

    echo "total element: $total<br><pre>".print_r($city, true)."</pre>";

    echo "<br><hr><br>";

    //array_push() aggiunge elementi alla fine dell'array
    $city2 = ["Roma", "Napoli"];
    $total = array_push($city2, "Cagliari", "Milano", "Palermo");

    echo "total element: $total<br><pre>".print_r($city2, true)."</pre>";

    echo "<br><hr><br>";
    
    //RIMOZIONE ----------------------------------------------------

    //array_shift() rimuove il primo elemento dall'array e lo restituisce
    $first = array_shift($city2);
    echo "<pre>".print_r($city2, true)."</pre>";
    echo "\$first: $first";

    echo "<br><hr><br>";

    //array_pop() rimuove l'ultimo elemento di un array e lo restituisce
    $last = array_pop($city2);
    echo "<pre>".print_r($city2, true)."</pre>";
    echo "\$last: $last";

?>