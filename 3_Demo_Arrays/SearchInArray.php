<?php
    echo <<< FORMAT
    <head>
        <style>
            body, pre{
                font-family:Verdana
            }
        </style>
    </head>
    FORMAT;

   /*
    *  ARRAY'S SEARCHING FUNCTIONS 
    */

    //in_array() cerca un valore (primo parametro) nell'array (secondo parametro)
    //ritornando true se l'ha trovato e false se non c'è, il terzo parametro (false di default) 
    //se settato a true fa la distinzione anche tra i tipi, mentre false no.
    $numbers = range(1, 15);
    
    echo 'in_array("10", $numbers): '.in_array("10", $numbers)."<br>";
    echo 'in_array("10", $numbers, true): ', in_array("10", $numbers, true) ? 1 : 0,"<br>";

    echo "<br><hr><br>";
//-------------------------------------------------------------------------------------------------------------------

    //array_key_exists() cerca una chiave (primo parametro) in un array (secondo parametro)
    $city = [
        "RM" => "Roma",
        "NA" => "Napoli",
        "MI" => "Milano",
        "PD" => "Padova",
        "PA" => "Palermo"
    ];
    
    echo 'array_key_exists("MI", $city): '.array_key_exists("MI", $city)."<br>";
    echo 'array_key_exists(14, $numbers): '.array_key_exists(14, $numbers)."<br>";
    echo 'array_key_exists(15, $numbers): ', array_key_exists(15, $numbers) ? 1 : 0, "<br>";

    echo "<br><hr><br>";
//----------------------------------------------------------------------------------------------------------------------

    //array_search() cerca un valore (primo parametro) nell'array (secondo parametro)
    //ritornando la rispettiva chiave se l'ha trovato e false se non c'è, il terzo parametro 
    //(false di default) se settato a true fa la distinzione anche tra i tipi, mentre false no.  
    if($key = array_search("Padova", $city))
    {
        echo "\$key: $key<br>\$city[\$key]: $city[$key]";
    }

    if($key = array_search("Pisa", $city))
    {
        echo "\$key: $key<br>\$city[\$key]: $city[$key]";
    }

    echo "<br><hr><br>";
//----------------------------------------------------------------------------------------------------------------------

    //array_keys() ritorna un array contenente tutte le chiavi dell'array passato come argomento.
    $arrKeys = array_keys($city);
    echo "\$city keys<br><pre>".print_r($arrKeys, true)."</pre>";
    
    echo "<br><hr><br>";
//----------------------------------------------------------------------------------------------------------------------

    //array_values() ritorna un array contenente tutti i valori dell'array passato come argomento.
    echo "\$city values<br><pre>".print_r(array_values($city), true)."</pre>";
?>