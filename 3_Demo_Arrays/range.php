<?php
    echo '<body style="font-family:Verdana">';

    $die = range(1, 6);

    printArray($die, "die");

    //----------------------------------------------

    $evenNumber = range(0, 20, 2);

    printArray($evenNumber, "evenNumber");

    //----------------------------------------------

    $char = range("A", "J");

    printArray($char, "char");

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