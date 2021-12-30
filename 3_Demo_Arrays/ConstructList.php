<?php
    echo '<body style="font-family:Verdana">';

    //apro il file users.txt
    $users = file("users.txt");

    //fino alla fine del file, legge una riga per volta e la salva in $user
    foreach($users as $user)
    {
        //explode() mi ritorna un array di stringhe separate dalla stringa principale dal carattere passato come
        //primo argomento, con list() inserisco, nelle variabili tra parentesi, i valori che si trovano nell'array
        //restituito 
        list($name, $profession, $color) = explode("|", $user);

        //stampo le informazioni formattate
        printf("Name: %s<br>", $name);
        printf("Profession: %s<br>", $profession);
        printf("Color: %s<br><br>", $color);
    }

?>