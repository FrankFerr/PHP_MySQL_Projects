<?php
    echo '<body style="font-family:Verdana">';

    $states = ["Ohio", "Florida", "Texas"];

    foreach($states as $state)
    {
        echo "$state<br>";
    }

    echo "<br><hr><br>";

    $personInfo = array();
    $personInfo[] = ["Francesco Ferrante", "ferrante@gmail.com", "19/06/1997"];
    $personInfo[] = ["Francesco Ferrante", "ferrante@gmail.com", "19/06/1997"];
    $personInfo[] = ["Francesco Ferrante", "ferrante@gmail.com", "19/06/1997"];

    foreach($personInfo as $person)
    {
        vprintf("<p>Nome: %s<br>E-mail: %s<br>Data di nascita: %s</p>", $person);
    }

    echo "<br><hr><br>";

    //----------------------------------------------

    $output = "";
    foreach($personInfo as $person)
    {
        $output .= vsprintf("<p>Nome: %s<br>E-mail: %s<br>Data di nascita: %s</p>", $person);
    }

    echo "$output";

    echo "<br><hr><br>";
    //------------------------------------------------

    $city['MI'] = "Milano";
    $city['RM'] = "Roma";
    $city['NA'] = "Napoli";

    $numbers = range(1, 10);

    //print_r() è una soluzione più rapida per stampare un array già formattato per effettuare test
    echo "<pre style=\"font-family:Verdana\">";
    print_r($city);
    echo "</pre><br>";

    echo "<pre style=\"font-family:Verdana\">";
    print_r($numbers);
    echo "</pre><br><br>";

    //il secondo argomento è un valore booleano, settato di default a false, che se settato a true 
    //permette di ritornare tutto come stringa invece di stamparlo direttamente
    $output = print_r($personInfo, true);
    echo "<pre style=\"font-family:Verdana\">\$output = $output</pre><br>"; 

    //var_dump() ha la stessa funzione di print_r(), maaggiunge informazioni riguardo i valori 
    //all'interno dell'array
    echo "<pre style=\"font-family:Verdana\">";
    var_dump($personInfo);
    echo "</pre><br>"; 
?>