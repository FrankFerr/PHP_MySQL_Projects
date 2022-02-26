<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Person</title>
    <style>*{font-family:Tahoma;font-size:large}</style>
</head>
<body>
    
    <form action="<?php $_SERVER['SCRIPT_NAME']?>" method="post">
        <input type="text" name="initials" placeholder="Inserisci una lettera">
        <input type="submit" value="Cerca Persone">
    </form>

<?php

    $dsn = 'mysql:host=localhost;dbname=phptest';

    try
    {
        $PDOconn = new PDO($dsn, 'francesco', 'kekko9719', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch(PDOException $exc)
    {
        $exc->getMessage();
    }


    if(isset($_POST['initials']))
    {
        $initials = $_POST['initials'];

        $st = $PDOconn->query("CALL Seleziona('$initials%')");

        if($st->rowCount() == 0)
            echo '<h3>Non è stato trovato nessun utente con quell\'iniziale</h3>';
        else
        {
            $records = $st->fetchAll(PDO::FETCH_OBJ);

            foreach($records as $record)
            {
                echo "Nome: {$record->nome} Cognome: {$record->cognome}<br>";
            }
        }
    }
    
?>


</body>
</html>