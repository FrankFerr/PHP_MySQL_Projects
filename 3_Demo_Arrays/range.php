<?php
    echo '<body style="font-family:Verdana">';

    //restituisce un array in cui gli elementi sono presi da un range di valori
    //dettati dai parametri

    //1° Param. -> valore di partenza del range
    //2° Param. -> valore di fine range
    $die = range(1, 6);

    printArray($die, "die");

    //----------------------------------------------

    //3° Param. (opzionale) -> viene usato come valore di incremento per il prossimo elemento
    //ad esempio nel codice qui sotto i numeri partono da 0 fino a 20 e andranno di 2 in 2
    $evenNumber = range(0, 20, 2);

    printArray($evenNumber, "evenNumber");

    //----------------------------------------------

    $char = range("A", "J");

    printArray($char, "char");

    //----------------------------------------------

    $float = range(12.2, 12.8, 0.1);
    printArray($float, 'FloatNum');

    //----------------------------------------------


    function printArray(array $array, string $nome = "array")
    {
        for($i = 0; $i < count($array); $i++)
        {
            echo "\$$nome"."[$i]: $array[$i]<br>";
        }

        echo "<br>";
    }
?>