<?php
    session_start();

    //se non è stato effettuato il login come amministratore, ritorna all'homepage
    if(!isset($_SESSION['admin']) && !$_SESSION['admin']->login)
    {
        header("location: index.html");
        exit;
    }
    
    require_once "utility.php";

    //se in upload.php è stato premuto Cancel, i dati nella sessione vengono cancellati e si viene reindirizzati a insertFile.php
    if($_POST['uploadQuery'] == 'Cancel')
    {
        $_SESSION['numElements'] = null;
        $_SESSION['elements'] = null;
        header("location: insertFile.php");
        exit;
    }

    //se in upload.php è stato premuto Confirm si procede all'inserimento
    if($_POST['uploadQuery'] == 'Confirm')
    {
        //connessione al database
        $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

        //controlla se c'è stato un errore nella connessione al database in modo da eliminare i dati e mostrare un messaggio di errore
        if($mysqli->connect_errno)
        {
            $_SESSION['elements'] = null;
            $_SESSION['numElements'] = null;

            exit(messageHtml("Error with database", "It couldn't be possible to connect with the database, try another time", "insertFile.php"));
        }

        //recupera l'array con i dati dei prodotti
        $elements = $_SESSION['elements'];

        //scrittura query per l'inserimento di tutti i prodotti
        $query = "INSERT INTO products (name, price, detail) VALUES ";
        foreach($elements as $element)
        {
            list($name, $price, $detail) = $element;

            $query .= "('$name', $price, '$detail'),";
        }
        
        //cancellazione dati
        $_SESSION['elements'] = null;

        //viene eliminato l'ultima virgola rimasta dopo la concatenazione continua nel ciclo foreach precedente
        $query[strlen($query) - 1] = " ";

        //se la query fallisce viene mostrato un messaggio di errore
        if(!$mysqli->query($query))
        {
            $mysqli->close();

            exit(messageHtml("Error with database", "It couldn't be possible to insert element into database, try another time",
            "insertFile.php"));
        }

        $mysqli->close();

        //messaggio del corretto caricamento dei prodotti
        exit(messageHtml("Element uploaded succefully", "{$_SESSION['numElements']} items were loaded correctly", "fetch.php?order=name"));
    }

?>