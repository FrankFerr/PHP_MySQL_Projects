<?php
    echo '<head><style>body, pre{font-family:Verdana}</style></head>';

    $simpsons = [
        ["name" => "Homer Simpson", "gender" => "Male", "age" => "40"],
        ["name" => "Marge Simpson", "gender" => "Female", "age" => "38"],
        ["name" => "Bart Simpson", "gender" => "Male", "age" => "11"],
        ["name" => "Lisa Simpson", "gender" => "Female", "age" => "10"],
    ];

 /* con array_column() è possibile estrarre tutte le informazioni di una determinata
  * colonna di un array multidimensionale (è molto utile quando si ricavano delle informazioni da 
  * un database).
  *
  * Primo parametro -> array multidimensionale contenente le informazioni
  * 
  * Secondo parametro -> chiave dell'informazione desiderata
  * 
  * Terzo parametro -> (string|int|null -- default null) serve per indicare una chiave dell'array passato
  * come primo argomento, il cui valore associato verrà usato come chiave nell'array ritornato
  */
  
    $name = array_column($simpsons, "name");
    $gender = array_column($simpsons, "gender");
    $name2 = array_column($simpsons, "name", "age");

    echo "<pre>".print_r($name, true)."</pre>";
    echo "<pre>".print_r($gender, true)."</pre>";
    echo "<pre>".print_r($name2, true)."</pre>";

?>