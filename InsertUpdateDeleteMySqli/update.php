<?php
    session_start();

    //se non è stato effettuato il login come amministratore e se non c'è l'id del prodotto da eliminare, ritorna all'homepage
    if(!isset($_SESSION['admin']) && !$_SESSION['admin']->login)
    {
        header("location: index.html");
        exit;
    }

    require_once "utility.php";

    //dichiarazione variabili che devono contenere le informazioni del prodotto
    $id = "";
    $name = "";
    $price = "";
    $detail = "";  

    //connessione al database
    $mysqli = connectToDb();

    //controlla se non è stato premuto il tasto submit per aggiornare il prodotto. Se non è stato premuto si andrà a recuperare le informazioni da visualizzare a schermo del prodotto che si vuole aggiornare
    if(!isset($_POST['submit']))
    {
        //recupera l'id del prodotto da aggiornare passato nell'url
        $getId = $mysqli->real_escape_string(validationInput($_GET['id']));

        //costruzione query per il recupero delle informazioni
        $query = "SELECT * FROM products WHERE id=$getId";

        //invio query
        $result = $mysqli->query($query);

        //controlla se è estato trovato un prodotto, se si allora assegno le informazioni recuperate alle variabili dichiarate prima
        if($result->num_rows == 1)
        {
            $record = $result->fetch_array(MYSQLI_NUM);

            list($id, $name, $price, $detail) = $record;

            $price = number_format($price, 2, ",", ".");
        }
    }

    echo <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MySQL Exercise</title>
    HTML;

    echo "<link rel='stylesheet' href='css/update.css?ts=".time()."&quot'>";

    echo <<<HTML
    </head>
    <body>
        
        <div id="boxGrande">
            <h2>Update record</h2>
            <form action="update.php" method="POST">
                <div id="boxInput">
    HTML;
    
    //UNA VOLTA PREMUTO SUBMIT TUTTI I CAMPI DELI INOUT VENGONO DISABILITATI

    //INPUT NOME PRODOTTO ------------------------------>

    echo "<input type='text' maxlength='40' name='prodName' placeholder='insert product name' value='$name' "
    .(isset($_POST['submit']) ? "disabled" : "required")."/>";

    //----------------------------------------------------->

    echo <<< HTML
                </div>
                <div id="boxInput">
    HTML;


    //INPUT PREZZO PEODOTTO ------------------------------>

    echo "<input type='text' name='prodPrice' maxlength='10'pattern='\d+[,.]\d\d' placeholder='insert product price (es. 10,80)' value='$price' "
    .(isset($_POST['submit']) ? "disabled" : "required")."/>";
    
    //----------------------------------------------------->

    echo <<< HTML
                </div>
                <div id="boxInput">
    HTML;
    

    //INPUT DETTAGLI PRODOTTO ------------------------------>

    echo "<textarea name='prodDetail' placeholder='Insert product detail' cols='30' rows='5' ".(isset($_POST['submit']) ? "disabled" : "required").">$detail</textarea>";

    //----------------------------------------------------->

    echo <<< HTML
                </div>
                <div id="boxSubmit">
                    <input type="hidden" name="id" value="$id" />
    HTML;
    
    //se è stato premuto submit viene disabilitato
    echo "<input id='submitBtn' type='submit' name='submit' value='Update value' ".(isset($_POST['submit']) ? "disabled" : "")."/>";
    
    //chiusura form più inserimento bottone return per ritornare alla pagina fetch.php
    echo <<< HTML
                </div>
            </form>
            <div id="boxFetchBtn">
            <a href="fetch.php?order=name"><button id="fetchBtn"><- Return</button></a>
            </div>
    HTML;
    
    //controlla se è stato premuto submit per aggiornare il prodotto
    if(isset($_POST['submit']))
    {
        //recupero e sanificazione dati
        $name = $mysqli->real_escape_string(validationInput($_POST['prodName']));
        $price = str_replace(",", ".", $_POST['prodPrice']);
        $detail = $mysqli->real_escape_string(validationInput($_POST['prodDetail']));

        //scrittura query per l'aggiornamento
        $query = "UPDATE products SET name='{$name}', price={$price}, detail='{$detail}' WHERE i={$_POST['id']}";

        //controlla l'esito della query mostrando un messaggio in caso di successo/fallimento
        if(!$mysqli->query($query))
        {
            $mysqli->close();
            exit(messageHtml("Error Update", "Error during updating element", "update.php?id={$_POST['id']}"));
        }
        else
        {
            echo <<<HTML
            <div id="boxInsertSuccess">Update successful</div>
            HTML;
        }

    }
        
    $mysqli->close();

    echo <<< HTML
    </div>
    <button onclick="document.location='login.php?logout=true'" id="logout">Log out</button>
    </body>
    </html>
    HTML;
?>