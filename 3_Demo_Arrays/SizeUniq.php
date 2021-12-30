<?php
    echo '<head><style>body, pre{font-family:Verdana;}</style></head>';

    //la funzione count() restituisce il numero di elementi dell'array passato come argomento

    $city = [
        "RM" => "Roma",
        "NA" => "Napoli",
        "MI" => "Milano",
        "PD" => "Padova",
        "PA" => "Palermo"
    ];

    echo "\$city:<br>".print_r($city, true)."<br><br>";

    echo 'count($city): '.count($city)."<br>";

    echo "<br><hr><br>";


    //per sapere il numero di tutti gli elementi di un array multidimensionale basta settare
    //il secondo parametro di count() a COUNT_RECURSIVE o 1

    $simpsons = [
        ["name" => "Homer Simpson", "gender" => "Male", "age" => "40"],
        ["name" => "Marge Simpson", "gender" => "Female", "age" => "38"],
        ["name" => "Bart Simpson", "gender" => "Male", "age" => "11"],
        ["name" => "Lisa Simpson", "gender" => "Female", "age" => "10"],
    ];

    echo "\$simpsons:<br><pre>".print_r($simpsons, true)."</pre><br>";

    echo 'count($simpsons, COUNT_RECURSIVE): '.count($simpsons, COUNT_RECURSIVE)."<br>";

    echo "<br><hr><br>";


/*  
 *  array_count_values() restituisce un array con chiave associativa in cui:
 *   
 *  associative key --> è il valore degli elementi dell'array passato come argomento
 *   
 *  value --> è la frequenza di apparizione, del valore usato come chiave, nell'array passato come argomento
 */

    $winner = ["Francesco", "Marco", "Francesco", "Antonio", "Marco", "Angelo",  "Francesco"];
    $winnerFreq = array_count_values($winner);

    echo "\$winner:<br>".print_r($winner, true)."<br><br>";
    echo "\$winnerFreq:<br><pre>".print_r($winnerFreq, true)."</pre><br>";

    echo "<br><hr><br>";


   /*
    *   array_unique() restituisce un array contenente i valori unici dell'array passato come argomento
    *   per controllare se due valori sono uguali vengono convertiti in stringhe quindi 1 == "1"
    */
    echo "\$winner:<br><pre>".print_r($winner, true)."</pre><br>";
    
    $winnerUniq = array_unique($winner);

    echo "\$winnerUniq:<br><pre>".print_r($winnerUniq, true)."</pre><br>";
    
?>