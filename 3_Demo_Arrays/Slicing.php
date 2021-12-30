<?php
    echo '<head><style>body, pre{font-family:Verdana}</style></head>';

   /*
    *   array_slice() restituisce un nuovo array partendo da quello passato come argomento.
    *   
    *   PARAMETRI:
    *   
    *   --> array $array: l'array dal quale ricavare il nuovo array
    *
    *   --> int $offset: indica da dove si incomincia a prendere in considerazione i valori e può essere
    *       - positivo -> indica quanti valori saltare partendo dall'inizio dell'array
    *
    *       - negativo -> indica di quante posizioni deve tornare indietro partendo dalla fine dell'array
    *
    *   --> int $length: indica quanti valori si devono prendere in considerazione e può essere
    *       - niente -> vengono presi in considerazione tutti i numeri partendo dall'offset fino alla fine dell'array
    *
    *       - positivo -> vengono presi in considerazione quel tot di numeri partendo dall'offset
    *
    *       - negativo -> indica quanti valori non prendere in considerazione partendo dalla fine, ad esempio -2
    *                     significa che gli ultimi due numeri non vengono presi
    *
    *   --> bool $preserve_keys = false: indica se mantenere (true) o meno (false) la rispettiva chiave di quei valori dal
    *                                    vecchio al nuovo array
    */

    $states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut");

    echo "states: <br>".print_r($states, true)."<br><br>";
    echo "array_slice(\$states, 2, 4): <br>".print_r(array_slice($states, 2, 4), true)."<br><br>";
    echo "array_slice(\$states, -5, 2): <br>".print_r(array_slice($states, -5, 2), true)."<br><br>";
    echo "array_slice(\$states, 1, -3, true): <br>".print_r(array_slice($states, 1, -3, true), true)."<br><br>";
    echo "array_slice(\$states, -3, -2): <br>".print_r(array_slice($states, -3, -2), true)."<br><br>";

    echo "<br><hr><br>";

    /*
    *   array_splice() serve per rimuovere e/o sostituire degli elementi in un array che si trovano in un determinato range.
    *   Gli elementi rimossi vengono restituiti in un nuovo array
    *   
    *   PARAMETRI:
    *   
    *   --> array &$array: l'array dal quale eliminare/sostituire gli elementi
    *
    *   --> int $offset: si comporta in modo analogo a $offset della funzione array_slice() (vedi sopra)
    *
    *   --> int $length: si comporta in modo analogo a $length della funzione array_slice() (vedi sopra)
    *
    *   --> mixed $replacement: valori o array da sostituire e/o aggiungere all'array
    */

    $states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut");

    echo "states: <br>".print_r($states, true)."<br><br>";

    $remove = array_splice($states, 2, 3);

    echo "states after array_splice(\$states, 2, 3): <br>".print_r($states, true)."<br><br>";
    echo "removed array from states: <br>".print_r($remove, true)."<br><br>";

    $states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut");
    $remove = array_splice($states, 2, 3, array("Florida", "New Jersey", "Las Vegas"));

    echo 'states after array_splice($states, 2, 3, array("Florida", "New Jersey", "Las Vegas")): <br>'
         .print_r($states, true)."<br><br>";
?>