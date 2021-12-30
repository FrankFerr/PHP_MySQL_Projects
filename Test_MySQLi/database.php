<?php
    echo '<head><style>body, pre{font-family:Verdana}</style></head>';

    $mysqli = new mysqli("localhost", "root", null, "Scuola");

    if($mysqli->connect_error) die("Errore Connessione: {$mysqli->connect_errno} -> {$mysqli->connect_error}");
    echo '<br>entrato in mysql<br>';

    // if(!($mysqli->query('CREATE DATABASE Scuola'))) die($mysqli->error);
    // echo 'database creato<br>';

    // $query = 'CREATE TABLE Alunni (
    //     Id  INT(5) NOT NULL AUTO_INCREMENT,
    //     Nome VARCHAR(30) NOT NULL,
    //     Cognome VARCHAR(45) NOT NULL,
    //     PRIMARY KEY(Id)
    // )';


    // if(!( $mysqli->query($query))) die("errore creazione tabella: ".$mysqli->error);
    // echo 'tabella creata<br>';

    // $query = 'INSERT INTO Alunni (Nome, Cognome) VALUES("Giuseppe", "Rossi")';

    // if(!( $mysqli->query($query))) die($mysqli->error);
    // echo 'elemento inserito<br>';

    // $query = 'INSERT INTO Alunni (Nome, Cognome) VALUES("Marco", "Rossi")';

    // if(!( $mysqli->query($query))) die($mysqli->error);
    // echo 'elemento inserito<br>';

    // $query = 'UPDATE Alunni SET Nome="Carmine", Cognome="La Marca" WHERE Id=4';
    // if(!( $mysqli->query($query))) die($mysqli->error);
    // echo 'elemento inserito<br>';

    // $query = 'UPDATE Alunni SET Nome="Emilio", Cognome="Ferrante" WHERE Id=5';
    // if(!( $mysqli->query($query))) die($mysqli->error);
    // echo 'elemento inserito<br>';

    // $query = 'UPDATE Alunni SET Nome="Filomena", Cognome="Ferrante" WHERE Id=6';
    // if(!( $mysqli->query($query))) die($mysqli->error);
    // echo 'elemento inserito<br>';

    // $query = 'UPDATE Alunni SET Nome="Maria Assunta", Cognome="La Marca" WHERE Id=7';
    // if(!( $mysqli->query($query))) die($mysqli->error);
    // echo 'elemento inserito<br>';

    // $queryDel = 'DELETE FROM Alunni WHERE Id=4';

    // if(!$mysqli->query($queryDel)) die("Error delete: ".$mysqli->error);
    // echo 'elemento eliminato<br>';

    $query = $mysqli->query('SELECT * FROM Alunni');
    if($query->num_rows)
    {
        // for($i = 0; $i < $query->num_rows; $i++)
        // {
        //     $array = $query->fetch_assoc();
        //     foreach($array as $key => $value)
        //     {
        //         echo "$key --> $value<br>";
        //     }

        //     echo "<br>";
        // }

        echo "Table:<br><pre>".print_r($query->fetch_all(MYSQLI_ASSOC), true)."</pre><br>";
    }
    else die("Errore selct");

    $mysqli->close();

?>