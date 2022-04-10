<head><style>*{font-family: 'Gill Sans', 'Gill Sans MT';font-size: 1.2rem;}</style></head>

<?php

    // $file = fopen('file1.txt', 'w');

    /* con file_put_contents il contenuto del file viene cancellato e riscritto */
    file_put_contents('file1.txt', 'Prima riga del file');
    // echo file_get_contents('file1.txt');

    file_put_contents('file1.txt', 'Seconda riga del file');
    echo file_get_contents('file1.txt');

    echo '<br><br>';

    //<---------------------------------------------------------------------------------->

    /* una soluzione (pessima) al problema esposto sopra è quella di salvare in una variabile
    il contenuto con file_get_contents(), aggiungerci il contenuto nuovo e riscriverlo
    con file_put_contents() */
    file_put_contents('file1.txt', 'Prima riga del file');

    $str = file_get_contents('file1.txt');
    $str .= '<br>Seconda riga del file';

    file_put_contents('file1.txt', $str);
    echo file_get_contents("file1.txt");

    echo '<br><br>';



    //fwrite ----------------------------->
    $frase = "Lorem ipsum dolor sit amet consectetur adipisicing elit.\nConsequuntur, esse!\n";
    $frase2 = "Lorem ipsum dolor sit amet.";
    
    file_put_contents('file1.txt', $frase);

    //la modalità 'a+' serve per leggere e scrivere in fondo al file in modo da
    //non cancellare niente
    $file = fopen('file1.txt', 'a+');
    fwrite($file, $frase2);

    echo nl2br(file_get_contents("file1.txt"));

    fclose($file);




    //<----------------------------- LETTURA --------------------------->
    echo '<br><br>';

    $file = fopen('file1.txt', 'r');

    //fgets() legge riga per riga fino alla fine del file. Per controllare
    //se il puntatore ha raggiunto la fine del file si usa feof($stream) torna
    //true se è stata raggiunta la fine altrimenti false
    while(!feof($file))
    {
        echo nl2br(fgets($file));
    }

    echo '<br><br>';

    $file = fopen('file1.txt', 'r');

    //fread() legge dal file il numero di bytes passato come secondo argomento
    while(!feof($file))
    {
        echo fread($file, 6) . '<br>';
    }

    echo '<br><br>';


    
    //<-------------------- QUANDO AVVIENE IL SALVATAGGIO DEL FILE ---------------------------->
    $f2 = fopen('file2.txt', 'w');
    fwrite($f2, 'Hello File!');

    //la chiusura e riapertura del file in questo punto è necessaria perchè
    //chiudendo il file vengono salvati i dati al suo interno, infatti se proviamo
    //a scrivere in un file e subito dopo a leggere il suo contenuto senza prima 
    //chiuderlo non verrà letto niente perchè i dati non sono ancora stati salvati
    fclose($f2);
    $f2 = fopen('file2.txt', 'r');

    while(!feof($f2))
    {
        echo fgets($f2);
    }
?>