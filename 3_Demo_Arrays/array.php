<?php
    echo '<body style="font-family:Verdana">';

   /*
    *  ARRAY
    * 
    *  struttura per contenere dati con caratteristiche simili.
    *  immagazina i dati associandoli ad una chiave per poterli identificare
    *  e ritrovare in qualsiasi momento. La chiave può essere numerica o associativa 
    */


    //ARRAY CON CHIAVE NUMERICA

    //se non viene specificata, la chiave parte da 0 (come negli array di altri linguaggi di programmazione)
    $carBrands = ["Cheverolet", "Chrysler", "Ford", "Honda", "Toyota"];
    echo "\$carBrands[0]: $carBrands[0]<br>";

    //se viene specificato solo il primo allora la chiave parte da quel numero, quindi "Porche"
    //avrà come chiave 14
    $carBrands2 = [12 => "Rolls Royce", "Bentley", "Porche"];
    echo "\$carBrands2[14]: $carBrands2[14]<br>";

    //è possibile assegnare una chiave numerica diversa per ogni elemento
    $carBrands3 = [15 => "Cheverolet", "Ferrari", 22 => "Chrysler", 25 => "Ford", "Bentley"];
    echo "\$carBrands3[16]: $carBrands3[16]<br>";
    echo "\$carBrands3[22]: $carBrands3[22]<br>";
    echo "\$carBrands3[26]: $carBrands3[26]<br>";

    echo "<br><hr><br>";

    //ARRAY CON CHIAVE ASSOCIATIVA

    //è possibile usare delle stringhe come chiave per un valore per una maggiore chiarezza
    $itCity = ["RM" => "Roma", "NA" => "Napoli", "MI" => "Milano"];
    echo "\$itCity['MI']: ".$itCity['MI']."<br>";

    //si possono creare anche array di array (array multidimensionali) per mantenere più informazioni
    //riguardo ad un dato, nell'esempio è possibile salvare più informazioni sulle città
    $itCity2 = [
        "Roma" => array("popolazione" => 2_873_000, "area" => 1_285),
        "Napoli" => array("popolazione" => 3_012_243, "area" => 1_171),
        "Milano" => array("popolazione" => 1_396_522, "area" => 181.61)
    ];
    echo "\$itCity2['Roma']['popolazione']: {$itCity2['Roma']['popolazione']} abitanti<br>";
    echo "\$itCity2['Milano']['area']: {$itCity2['Milano']['area']} km^2<br>";

?>