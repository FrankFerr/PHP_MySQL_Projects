<?php
    echo '<head><style>body, pre{font-family:Verdana}</style></head>';

    /*
    *   array_merge() restituisce un array composto dagli elementi degli array passati come argomento.
    *   Se gli array hanno un valore con una chiave associativa identica l'ultimo tra questi sovrascrive
    *   gli altri
    */

    $arr1 = ["a", "b", "c", "d", "e"];
    $arr2 = [1, 2, 3, 4, 5];

    echo "arr1: ".print_r($arr1, true)."<br>";
    echo "arr2: ".print_r($arr2, true)."<br>";
    echo "arr1 & arr2 merged: <br><pre>".print_r(array_merge($arr1, $arr2), true)."</pre><br>";

    $arr1 = ["a", "test" => "b", "c", "d", "e"];
    $arr2 = [1, 2, 3, 4, "test" => 5];
    $arr3 = [10, "test" => 20, 30, 40];

    echo "arr1 associative key: ".print_r($arr1, true)."<br>";
    echo "arr2 associative key: ".print_r($arr2, true)."<br>";
    echo "arr3 associative key: ".print_r($arr3, true)."<br>";
    echo "arr1 & arr2 & arr3 merged: <br><pre>".print_r(array_merge($arr1, $arr2, $arr3), true)."</pre><br>";

    echo "<br><hr><br>";

    /*
    *   array_merge_recursive() funziona allo stesso modo di array_merge() tranne per come gestisce le
    *   chiavi associative, infatti se ci sono più valori con la stessa chiave invece di sovrascriverli
    *   crea un array con quei valori che verrà indicizzato dalla stessa chiave nell'array principale
    */

    echo "arr1 associative key: ".print_r($arr1, true)."<br>";
    echo "arr2 associative key: ".print_r($arr2, true)."<br>";
    echo "arr3 associative key: ".print_r($arr3, true)."<br>";
    echo "arr1 & arr2 & arr3 merged recursively: <br><pre>".print_r(array_merge_recursive($arr1, $arr2, $arr3), true)."</pre><br>";

    echo "<br><hr><br>";


    /*
    *   array_combine() restituisce un nuovo array le cui chiavi sono costituite dai valori del primo array
    *   passato come argomento e i valori sono i valori del secondo array passato come argomento. Gli array
    *   devono avere lo stesso numero di elementi
    */

    $arr1 = ["a", "b", "c", "d", "e"];
    $arr2 = [1, 2, 3, 4, 5];

    echo "arr1: ".print_r($arr1, true)."<br>";
    echo "arr2: ".print_r($arr2, true)."<br>";
    echo "arr1 & arr2 combined: <br><pre>".print_r(array_combine($arr1, $arr2), true)."</pre><br>";
?>