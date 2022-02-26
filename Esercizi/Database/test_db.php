<head><style>body{font-family: 'Segoe UI', Tahoma; font-size: 1.1rem;}</style></head>

<?php

    $dsn = 'mysql:host=localhost;dbname=phptest';
    $username = 'francesco';
    $password = 'kekko9719';

    try
    {
        //connessione al database
        $PDOconn = new PDO($dsn, $username, $password);
        //con il metodo setAttribute settiamo il comportamento dell'oggetto PDO,
        //in questo caseo gli abbiamo detto che deve lanciare un'eccezione ad ogni errore
        $PDOconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $exc)
    {
        echo 'ERRORE: '.$exc->getMessage();
    }

    //il metodo query serve per eseguire delle istruzioni sql, ritorna un oggetto
    //di tipo PDOStatement
    
/* BLOCCO DI CODICE COMMENTATO PER NON FARLO ESEGUIRE OGNI VOLTA -------------------->

    $PDOconn->query("INSERT INTO User (nome, cognome) VALUES ('Francesco', 'Ferrante')");
    
    $st = $PDOconn->query("INSERT INTO User (nome, cognome) VALUES ('Emilio', 'Ferrante')");
    var_dump($st);

    $st = $PDOconn->query("INSERT INTO User (nome, cognome) VALUES ('Giovanni', 'Ferrante')");

    // rowCount() ci ritorna il numero di righe modificate, quindi se è uguale a '0'
    // c'è stato qualche errore
    if($st->rowCount() > 0)
    {
        echo 'Record inserito correttamente';
    }

   BLOCCO DI CODICE COMMENTATO PER NON FARLO ESEGUIRE OGNI VOLTA -------------------->
*/

    echo 'fetch() con PDO::FETCH_ASSOC<br>';

    $st = $PDOconn->query('SELECT * FROM User');

    //con il metodo fetch() ci viene restituito uno alla volta 
    //tutti i record che sono stati trovati con la query precedente
    //Con la costante 'PDO::FETCH_ASSOC' gli indici dell'array saranno 
    //il nome delle colonne della tabella
    while($record = $st->fetch(PDO::FETCH_ASSOC))
    {
        echo "Nome: {$record['nome']}<br>Cognome: {$record['cognome']}<br><br>";
    }


    echo '<hr>fetchAll() con PDO::FETCH_NUM<br><br>';

    $st = $PDOconn->query('SELECT * FROM User');

    //con fetchAll() ci viene restituito un array in cui ogni elemento è
    //un array che rappresenta il record prelevato dal database
    //Con la costante 'PDO::FETCH_NUM' l'array avrà solo indici numerici
    $records = $st->fetchAll(PDO::FETCH_NUM);

    for($i = 0; $i < count($records); $i++)
    {
        echo "id: {$records[$i][0]}<br>nome: {$records[$i][1]}<br>cognome: {$records[$i][5]}<br><br>";
    }


    echo '<hr>fetch() con PDO::FETCH_OBJ<br>';

    $st = $PDOconn->query('SELECT * FROM User');

    //con 'PDO::FETCH_OBJ' il record viene restituito come un oggetto
    //con le proprietà il cui nome è il nome della colonna e il valore
    //è il valore in quella cella
    $record = $st->fetch(PDO::FETCH_OBJ);

    echo "<br>id: {$record->id}<br>nome: {$record->nome}<br>cognome: {$record->cognome}<br>";


    echo '<br><hr>fetch() con setAttribute()<br>';

    //invece di inserire ogni volta la costante nel metodo fetch() o
    //fetchAll() è possibile settare un comportamento di default con 
    //setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, 'metodo_fetch_desiderato');
    $PDOconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    $st = $PDOconn->query('SELECT * FROM User');

    $record = $st->fetch();

    echo "<br>id: {$record->id}<br>nome: {$record->nome}<br>cognome: {$record->cognome}<br>";

?>