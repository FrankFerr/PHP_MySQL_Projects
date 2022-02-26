<head><style>body{font-family:'Segoe UI', Tahoma; font-size: large;}</style></head>

<?php


    $dsn = 'mysql:host=localhost;dbname=phptest';
    $user = 'francesco';
    $pass = 'kekko9719';

    try
    {
        $PDOconn = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch(PDOException $exc)
    {
        $exc->getMessage();
    }

    $nomi = ['Francesco', 'Gianluca', 'Luisa', 'Roberta', 'Anna'];
    $cognomi = ['Rossi', 'Verdi', 'Bianchi', 'Gialli', 'Neri'];

    $st = $PDOconn->prepare('INSERT INTO user2 (nome, cognome) VALUES (:nomePL, :cognomePL)');

    for($i = 0; $i < count($nomi) && $i < count($cognomi); $i++)
    {
        $st->bindParam(':nomePL', $nomi[$i], PDO::PARAM_STR);
        $st->bindParam(':cognomePL', $cognomi[$i], PDO::PARAM_STR);

        $st->execute();
    }
?>