<head><style>body{font-family: 'Segoe UI', Tahoma; font-size: 1.1rem;}</style></head>

<?php
    $dsn = 'mysql:host=localhost;dbname=phptest';
    $username = 'francesco';
    $password = 'kekko9719';
    $opzioni = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try
    {
        $PDOconn = new PDO($dsn, $username, $password, $opzioni);
    }
    catch(PDOException $exc)
    {
        $exc->getMessage();
    }

    $PDOconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $nome = 'Francesco';
    $cognome = 'Ferrante';

    //prepared statement -> sostituire i dati con il '?'
    $query = 'SELECT * FROM User WHERE nome = ? AND cognome = ?';

    //settare la prepared statement con il metodo prepare(), ritorna un oggetto
    //PDOStatement
    $p_st = $PDOconn->prepare($query);

    //eseguire la query con il metodo execute() passando come parametro un array
    //contenente i valori da sostituire ai segnaposto facendo attenzione all'ordine
    //di questi ultimi nella query
    $p_st->execute([$nome, $cognome]);

    echo '<pre>'.print_r($p_st->fetchAll(), true).'<pre><br><hr><br>';

    //<------------------------------------------------------------------->

    //è possibile anche usare un'altra parola come placeholder, ma deve essere
    //preceduta dai due punti
    $query = "SELECT * FROM user WHERE nome = :nome_form";

    $p_st = $PDOconn->prepare($query);

    //nel caso in cui si usa un placeholder diverso dal '?', bisogna specificarlo
    //come chiave del valore da passare come parametro
    $p_st->execute(['nome_form' => $nome]);

    echo '<pre>'.print_r($p_st->fetchAll(), true).'<pre><br>';


    //BIND PARAM ---------------------------------------------------------->

    echo '<br><hr><br><b>Bind Param</b><br><br>';

    //prepared statement
    $query = 'SELECT * FROM user WHERE nome LIKE :likePL LIMIT :limitPL';

    //valori da sostituire ai placeholder
    $likePL = 'F%';
    $limitPL = 2;

    //preparazione query
    $st = $PDOconn->prepare($query);

    //legatura della variabile al placeholder
    $st->bindParam(':likePL', $likePL, PDO::PARAM_STR);
    $st->bindParam(':limitPL', $limitPL, PDO::PARAM_INT);

    $st->execute();


    echo '<br><pre>'.print_r($st->fetchAll(PDO::FETCH_ASSOC), true).'</pre><br>';
?>