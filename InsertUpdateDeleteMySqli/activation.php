<?php
    require_once "utility.php";

    //controlla se nell'url non ci sono i dati di email e verify
    if(!isset($_GET['email']) && !isset($_GET['verify']))
    {
        header("location: index.html");
        exit;
    }

    //connessione database
    $mysqli = connectToDb();

    //scrittura query per cercare l'username nel database collegato all'email passato tramite url
    $query = "SELECT username FROM customers WHERE email='{$_GET['email']}'";
    $result = $mysqli->query($query);

    //controlla se è stata trovata una corrispondenza, allora si può procedere per l'attivazione
    if(isset($result->num_rows) && $result->num_rows == 1)
    {
        //controlla se l'username conbacia con l'hash inviato tramite url
        if(password_verify($result->fetch_array(MYSQLI_NUM)[0], $_GET['verify']))
        {
            //scrittura query per attivare l'account settando la colonna 'user_active' ad 1
            $query = "UPDATE customers SET user_active=1 WHERE email='{$_GET['email']}'";

            if($mysqli->query($query))
            {
                messageHtml("Actiovation complete", "Your account is active now, log in through the homepage", "index.html");
            }
            else
            {
                messageHtml("Error website", "Some error occurred with website, please try the activation later", "index.html");
            }
        }
        else
        {
            messageHtml("Error", "error in control code activation", "index.html");
        }
    }
    else
    {
        messageHtml("Error", "Email doesn't exists", "index.html");
    }
?>