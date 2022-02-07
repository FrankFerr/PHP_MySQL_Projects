<?php
    // declare(strict_types=1);

    ini_set('display_errors', '1'); //mettere a 0 il secondo parametro per togliere gli errori

    //anche se viene visualizzato un 'Warning' il quale notifica che c'è qualcosa
    //che non va, lo script prosegue facendo le sue conversioni e l'addizione.
    //per non vedere quelle avvertenze durante l'esecuzione del programma sul web
    //si può usare la funzione ini_set(), vedi su
    echo somma('10sda', 23);

    function somma($num1, $num2)
    {
        return $num1 + $num2;
    }


    echo '<br><br>';
    //------------------------------------------------>

    //TYPE HINTING SCALARE (PHP 7)
    //ci permette di specificare il tipo di dato che deve essere passato come
    //argomento. Anche se passiamo una stringa l'ide non ci avverte perchè lo
    //stiamo eseguendo in modalità 'coercive'. Mentre se impostiamo lo strict types
    //come a riga 2 (deve essere la prima istruzione dello script) l'ide ci avverte
    //con la segnalazione di un errore
    function somma2(int $num1, int $num2) : int
    {
        return $num1 + $num2;
        // return '10'; -> in modalità strict questo è un errore perchè
        //dobbiamo restituire lo stesso tipo di dato del tipo di ritorno
        //In modalità coercive (non strict) il php avrette tentato di convertire
        //la stringa '10' in int prima di restituirlo
    }

    // echo somma2('10sda', 23); -> errore
    echo somma2(10, 30);

?>