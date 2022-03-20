<?php

    $dsn = 'mysql:host=localhost;dbname=auth_system;charset=utf8';

    try{
        $PDO = new PDO($dsn, 'francesco', 'kekko9719');
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $PDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    catch(PDOException $exc){
        echo 'Errore nella connessione al database<br>';
    }

?>