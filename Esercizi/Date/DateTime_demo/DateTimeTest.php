<head><style>*{font-family: 'Gill Sans', 'Gill Sans MT';font-size: 1.2rem;}</style></head>

<?php
    /****************************************************
        DateTime - classe per la gestione delle date
    ****************************************************/

    //costruttore senza nessun argomento, viene settato l'orario corrente
    $tempo = new DateTime(); //== new DateTime('now')

    echo 'new DateTime() -> '.$tempo->format('d/m/Y  H:i:s').'<br><br>';


    //costruttore con argomento una stringa che rappresenta la data
    // formati supportati -> https://www.php.net/manual/en/datetime.formats.php
    $tempo = new DateTime('19-06-1997 10:30');

    echo 'new DateTime(\'19-06-1997 10:30\') -> '.$tempo->format('d/m/Y  H:i:s').'<br><br>';


    echo '$tempo->getTimestamp(): '.$tempo->getTimestamp().'<br><hr><br>';


    //<-------------- ------------- ---------------- -------------- --------------->


    //settare un determinato Timezone (per gestire il fuso orario)
    $date_time = new DateTime();
    $date_time->setTimezone(new DateTimeZone('Europe/Rome'));

    echo '$date_time->getTimezone(): '.$date_time->getTimezone()->getName().'<br><br>';

    //E' possibile settarlo durante la l'istanziamento dell'oggetto
    $it = new DateTime(null, new DateTimeZone('Europe/Rome'));
    $aus = new DateTime(null, new DateTimeZone('Australia/Sydney'));

    echo 'In Italia sono le '.$it->format('H:i:s').'<br>';
    echo 'In Australia sono le '.$aus->format('H:i:s').'<br><hr><br>';


    //<-------------- ------------- ---------------- -------------- --------------->
    

    $datetime = new DateTime();

    $datetime->setDate(1997, 6, 19);
    $datetime->setTime(10, 30, 22);
    echo '$datetime dopo setDate() e setTime(): '.$datetime->format('d/m/Y  H:i:s').'<br><br>';

    $datetime->setTimestamp(mktime(22, 14, null, 3, 1, 2022));
    echo '$datetime dopo setTimestamp(): '.$datetime->format('d/m/Y  H:i:s').'<br><hr><br>';


    //<-------------- ------------- ---------------- -------------- --------------->
    

    echo '$datetime dopo setTimestamp(): '.$datetime->format('d/m/Y  H:i:s').'<br>';

    $datetime->modify('+1 month 2 day');
    echo '$datetime dopo modify(\'+1 month 2 day\'): '.$datetime->format('d/m/Y  H:i:s').'<br>';

    $datetime->modify('19 june 1997');
    echo '$datetime dopo modify(\'19 june 1997\'): '.$datetime->format('d/m/Y  H:i:s').'<br>';

    $datetime->modify('13-05-2008');
    echo '$datetime dopo modify(\'13-05-2008\'): '.$datetime->format('d/m/Y  H:i:s').'<br><hr><br>';


    //<-------------- ------------- ---------------- -------------- --------------->
    


    $data1 = new DateTime('03/01/2022 18:16:43');
    $data2 = new DateTime('11/16/2021 07:30:43');

    //il metodo diff() ci ritorna un oggetto di tipo DateInterval con le informazioni
    //sulla differenza delle due date
    $diff = $data2->diff($data1);
    echo 'risultato di $data2->diff($data1);';
    echo '<pre>'.print_r($diff, true).'</pre><br>';

    $diff = $data1->diff($data2);
    echo 'risultato di $data1->diff($data2);';
    echo '<pre>'.print_r($diff, true).'</pre><br>';

    //l'unica cosa che cambia tra i due metodi è la proprietà 'invert' dell'oggetto
    //DateInterval. Se è settato a 0 la differenza è positiva mentre se è 1 è negativa

    

    //<-------------- ------------- ---------------- -------------- --------------->
    

    //per istanziare un oggetto DateInterval (che rappresenta un intervallo tra due date)
    //si deve usare come argomento del costruttore una stringa che rappresenti l'intervallo
    //Per indicare una data si inizia con la lettera 'P' (che indica 'period') seguita da 
    //un numero ed una lettera che indica il rispettivo significato, Y -> year  M -> month
    //D -> day. Mentre per l'orario i numeri devono essere preceduti dalla lettera 'T' (che
    //indica 'time') e seguiti da una di queste lettere H -> hours  M -> minutes  S -> seconds
    //nell'esempio sto indicando un intervallo di 3 mesi 15 giorni 10 ore 46 minuti
    $interval = new DateInterval('P3M15DT10H46M');

    echo '$interval -> 3 mesi 15 giorni 10 ore 46 minuti<br>';
    echo '$datetime -> '.$datetime->format('d/m/Y  H:i:s').'<br>';

    $datetime->add($interval);
    echo '$datetime dopo add($interval) -> '.$datetime->format('d/m/Y  H:i:s').'<br>';

    $datetime->sub($interval);
    echo '$datetime dopo sub($interval) -> '.$datetime->format('d/m/Y  H:i:s').'<br><hr><br>';

?>