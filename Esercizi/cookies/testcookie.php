<?php

    //settaggio cookie -> nome, valore, tempo di permanenza (in questo caso 2 ore perchè
    //7200 secondi sono 2 ore)
    setcookie('colore', 'giallo', time() + 7200);

    //per settare dei cookie senza dover calcolare i secondi possiamo usare la funzione
    //strtotime(). All'inizio della stringa si deve inserire il simbolo '+' e poi scrivere
    //in inglese la scadenza del cookie come nell'esempio
    setcookie('color', 'red', strtotime('+2 days 4 hours 30 minutes 10 seconds'));

    //è possibile anche settare una data
    setcookie('car', 'Ferrari', strtotime('19 june 2022'));

    
    echo $_COOKIE['colore'].'<br>';
    echo $_COOKIE['color'].'<br>';
    echo $_COOKIE['car'].'<br>';


?>