<head><style>body{font-family: 'Segoe UI', Tahoma;font-size:large;}</style></head>

<?php

    echo '<b>Transaction</b><br><br>';

    $dsn = 'mysql:host=localhost;dbname=phptest';
    $username = 'francesco';
    $password = 'kekko9719';

    try
    {
        $PDOconn = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    catch(PDOException $exc)
    {
        $exc->getMessage();
    }

    //le transazioni servono per assicurarsi che un determinato numero di
    //query vadano a buon fine, e in caso di interruzioni è possibile ritornare
    //al momento prima dell'inizio delle query in modo da annullare tutte le 
    //modifiche
    $st = $PDOconn->query('SELECT * FROM accounts');
    echo '<pre>'.print_r($st->fetchAll(), true).'</pre>';

    $balance = 0.0;
    $number = 0;

    $query = "UPDATE accounts SET balance = balance + :balancePl WHERE number = :numberPl";
    $st = $PDOconn->prepare($query);

    try
    {
        //inizio della transazione ("punto di salvataggio" al quale tornare in caso di errori)
        $PDOconn->beginTransaction();


        //esecuzione query (scambio di un ammontare di euro da un conto ad un altro)
        $balance = 220.40;
        $number = 12345;
        $st->bindParam(':balancePl', $balance);
        $st->bindParam(':numberPl', $number, PDO::PARAM_INT);
        $st->execute();


        $balance = -220.40;
        $number = 67890;
        $st->bindParam(':balancePl', $balance);
        $st->bindParam(':numberPl', $number, PDO::PARAM_INT);
        $st->execute();


        //se non ci sono stati errori richiamiamo la funzione commit() per confermare
        //le operazioni
        $PDOconn->commit();
    }
    catch(PDOException $exc)
    {
        //in caso una query non sia andata a buon fine con la funzione rollBack()
        //annulliamo le altre query eseguite dall'inizio della transazione
        $PDOconn->rollBack();
        $exc->getMessage();
    }

    echo '<br>account 12345 -> +220.40 | 67890 -> -220.40<br>';

    $st = $PDOconn->query('SELECT * FROM accounts');
    echo '<pre>'.print_r($st->fetchAll(), true).'</pre>';

    //---------------------------------------------------------------------------------->
    //secondo esempio di transazione la prima query è giusta e la seconda è
    //sbagliata ma grazie alla transazione la prima viene annullata
    try
    {
        //inizio della transazione ("punto di salvataggio" al quale tornare in caso di errori)
        $PDOconn->beginTransaction();


        //esecuzione query (scambio di un ammontare di euro da un conto ad un altro)
        $balance = -400;
        $number = 12345;
        $st->bindParam(':balancePl', $balance);
        $st->bindParam(':numberPl', $number, PDO::PARAM_INT);
        $st->execute();


        $balance = 400;
        $number = 567890;
        $st->bindParam(':balancePl', $balance);
        $st->bindParam(':numberPl', $number, PDO::PARAM_INT);
        $st->execute();


        //se non ci sono stati errori richiamiamo la funzione commit() per confermare
        //le operazioni
        $PDOconn->commit();
    }
    catch(PDOException $exc)
    {
        //in caso una query non sia andata a buon fine con la funzione rollBack()
        //annulliamo le altre query eseguite dall'inizio della transazione
        $PDOconn->rollBack();
        $exc->getMessage();
    }

    echo '<br>account 12345 -> -400 | 567890 -> 400 (errore nel secondo account come esempio per la transazione)<br>';

    $st = $PDOconn->query('SELECT * FROM accounts');
    echo '<pre>'.print_r($st->fetchAll(), true).'</pre>';

?>