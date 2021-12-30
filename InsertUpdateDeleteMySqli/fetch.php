<?php
    session_start();
    
    //controlla se chi ha aperto questa pagina è un admin ed è loggato, se non lo è viene reindirizzato alla homepage
    if(!isset($_SESSION['admin']) && !$_SESSION['admin']->login)
    {
        header("location: index.html");
        exit;
    }

    require_once "utility.php";

    
    // connessione al database
    $mysqli = connectToDb();

    // scrittura query per prelevare i dati dal database e mostrarli in una tabella a schermo
    $query = "SELECT * FROM products ORDER BY name";


    /*
        controlla in quale ordine devono essere visualizzati gli elementi.
        è possibile cambiare l'ordine premendo sul nome della colonna 
    */
    if(isset($_GET['order']))
    {
        switch($_GET['order'])
        {
            case "name": $query = "SELECT * FROM products ORDER BY name";
            break;

            case "price": $query = "SELECT * FROM products ORDER BY price";
            break;

            case "nameDesc": $query = "SELECT * FROM products ORDER BY name DESC";
            break;

            case "priceDesc": $query = "SELECT * FROM products ORDER BY price DESC";
            break;
        }
    }

    // invio query
    $result = $mysqli->query($query);

    // controllo errori query
    if(!$result->num_rows) exit("<p>Nessun record trovato</p>");
?> 
                
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetched records</title>
    <link rel="stylesheet" href="css/fetch.css?ts=<?=time()?>&quot">
</head>
<body>

    <div id="boxGrande">
        <h2>Fetched records from products</h2>

        <!-- creazione tabella -->
        <table>
            <tr>
                <th><a href="fetch.php?order=<?php $_GET['order'] == "name" ? print "nameDesc" : print "name" ?>">Name</a></th>
                <th><a href="fetch.php?order=<?php $_GET['order'] == "price" ? print "priceDesc" : print "price" ?>">Price</a></th>
                <th>Detail</th>
                <th>Option</th>
            </tr>
            <?php

                // recupera tutti i record in un array associativo
                $records = $result->fetch_all(MYSQLI_ASSOC);

                // ciclo per creare le celle della tabella con le varie informazioni
                foreach($records as $record)
                {
                    $name = $record['name'];
                    $price = number_format($record['price'], 2, ",", ".")." €";
                    $detail = $record['detail'];

                    //creazione cella di ogni prodotto nella tabella
                    echo <<<HTML
                    <tr>
                        <td class="tdName">$name</td>
                        <td class="tdPrice">$price</td>
                        <td class="tdDetail">$detail</td>
                        <td class="tdDelete">
                            <a href="delete.php?id=$record[id]"><button id="deleteBtn" title="Delete">x</button></a>
                            <a href="update.php?id=$record[id]"><button id="updateBtn" title="Update"><img src="img/matita.png" alt="a"></button></a>
                        </td>
                    </tr>
                    HTML;
                }

                $mysqli->close();
            ?>

        </table>

        <!-- pulsante per tornare alla pagina dell'inserimento  -->
        <div id="boxReturnBtn">
            <a href="insert.php"><button id="returnBtn"><- Return</button></a>
        </div>
            
    </div>

    <button onclick="document.location='login.php?logout=true'" id="logout">Log out</button>

</body>
</html>