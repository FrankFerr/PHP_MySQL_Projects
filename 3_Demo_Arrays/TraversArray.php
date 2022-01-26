<?php
    echo '<head><style>body, pre{font-family:Verdana}</style></head>';

    $regioni = [
        "Campania" => "Napoli",
        "Lombardia" => "Milano",
        "Lazio" => "Roma",
        "Sicilia" => "Palermo",
        "Basilicata" => "Potenza",
        "Molise" => "Campobasso",
        "Sardegna" => "Cagliari"
    ];

    /*
    * key() restituisce la chiave che si trova nella posizione corrente del puntatore
    * interno dell'array passato come argomento. All'inizio il puntatore punta sempre 
    * al primo elemento e per farlo avanzare si deve usare la funzione next() passando
    * coma argomento l'array al quale si vuole far avanzare il puntatore
    */
    while($key = key($regioni))
    {
        echo "$key<br>";
        next($regioni);
    }

    echo "<br><hr><br>";


   /*
    * current() restituisce il valore che si trova nella posizione corrente del puntatore
    * interno dell'array passato come argomento. All'inizio il puntatore punta sempre 
    * al primo elemento e per farlo avanzare si deve usare la funzione next() passando
    * come argomento l'array al quale si vuole far avanzare il puntatore
    */
    $regioni2 = [
        "Campania" => "Napoli",
        "Lombardia" => "Milano",
        "Lazio" => "Roma",
        "Sicilia" => "Palermo",
        "Basilicata" => "Potenza",
        "Molise" => "Campobasso",
        "Sardegna" => "Cagliari"
    ];

    while($capitale = current($regioni2))
    {
        echo "$capitale<br>";
        next($regioni2);
    }

    echo "<br><hr><br>";

    
    /*
    *  1) con la funzione next() si fa avanzare il puntatore interno dell'array passato come argomento
    *  e viene restituito il valore successivo al quale punta. Il puntatore all'inizio punta al primo
    *  elemento quindi usando next() il puntatore si sposta nella seconda posizione e ne restituisce il valore.
    *  se il puntatore si trova nell'ultima posizione e si chiama next(), ritorna false
    *
    *  2) la funzione prev() funziona allo stesso modo di next() ma fa tornare il puntatore all'inizio dell'array
    *
    *  3) la funzione reset() "resetta" il puntatore interno dell'array passato come argomento facendolo puntare
    *  al primo elemento e restituendo il suo valore
    *
    *  4) la funzione end() setta il puntatore interno dell'array passato come argomento facendolo puntare
    *  all'ultimo elemento e restituendo il suo valore
    */
    
    reset($regioni2);
    
    while($value = next($regioni2))
    {
        echo "$value<br>";
    }

    echo "<br><hr><br>";

    end($regioni2);

    while($value = prev($regioni2))
    {
        echo "$value<br>";
    }
?>