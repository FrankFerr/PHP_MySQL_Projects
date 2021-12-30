<?php
    session_start();

    //se non è stato effettuato il login come amministratore e se non c'è l'id del prodotto da eliminare, ritorna all'homepage
    if(!isset($_SESSION['admin']) && !$_SESSION['admin']->login && isset($_GET['id']))
    {
        header("location: index.html");
        exit;
    }

    require_once "utility.php";

    // connessione al database
    $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    // controllo errori connessione
    if($mysqli->connect_errno) exit("connection failed with database in delete.php: {$mysqli->info}");

    // scrittura query
    $query = "DELETE FROM products WHERE id={$_GET['id']}";

    // controllo errori query
    if(!$mysqli->query($query)) exit("some error occurred with query in delete.php");

    // chiusura databse
    $mysqli->close();

    // reindirizzamento a fetch.php, passando tramite GET l'ordine con il quale visualizzare i prodotti nella tabella
    header("location: fetch.php?order=name");
?>