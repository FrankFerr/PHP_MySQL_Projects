<?php
    session_start();

    //se non è stato effettuato il login come amministratore, ritorna alla pagina di autenticazione (login.php)
    if(!isset($_SESSION['admin']) && !$_SESSION['admin']->login)
    {
        header("location: index.html");
        exit;
    }

    require_once("utility.php");

    define("UPLOADS_DIR", "uploads/");

    //se il file non è un file di testo mostra un messaggio di errore con il pulsante
    //per tornare a insertFile.php
    if($_FILES && $_FILES['upload']['type'] != "text/plain")
    {
        exit(messageHtml("Some error occurred", "Must upload a text file (.txt)", "insertFile.php"));
    }
    else
    {
        //creazione percorso file
        $upFile = UPLOADS_DIR . basename(validationInput($_FILES['upload']['name']));

        //caricamento file
        if(!move_uploaded_file($_FILES['upload']['tmp_name'], $upFile))
            exit(messageHtml("Some error occurred", "Some error occurred while uploading file, please try again.", "insertFile.php"));

        //apertura file
        $file = fopen($upFile, "r") or exit(messageHtml("Some error occurred", "Some error occurred while reading file, maybe it is empty or corrupted.
         Try with another file.", "insertFile.php"));
        
        //legge l'intero file 
        $fileString = fread($file, $_FILES['upload']['size']);
        
        //i prodotti vengono separati da un doppio spazio quindi con explode("\n\r\n"..., recupera un array con i dati dei prodotti
        $records = explode("\n\r\n", $fileString);

        //conta quanti elementi sono stati trovati
        $numElements = count($records);
        
        
        fclose($file);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Exercise</title>
    <link rel="stylesheet" href="css/upload.css?ts=<?=time()?>&quot">

</head>

<body>

    <div id="boxGrande">
        <h2>Upload products from file</h2>

        <button onclick="document.location='login.php?logout=true'" id="logout">Log out</button>

        <div id="boxInsertSuccess">There are <?php echo $numElements; ?> elements </div>

        <table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Detail</th>
            </tr>
            <?php
                //creazione delle celle della tabella con le informazioni dei prodotti trovate nel file caricato
                foreach($records as $record)
                {
                    //recupero nome, prezzo e descrizione del prodotto che vengono separate dal carattere '|' nel file di testo
                    list($name, $price, $detail) = explode("|", $record);
        
                    //sanifica i dati recuperati dal file caricato
                    $name = $mysqli->real_escape_string(trim(validationInput($name)));
                    $price = $mysqli->real_escape_string(str_replace(",", ".", trim(validationInput($price))));
                    $detail = $mysqli->real_escape_string(trim(validationInput($detail)));

                    //dopo la sinificazione i dati vengono salvati nell'array "elements" che verrà recuperato nel file uploadQuery.php per la creazione della query
                    $elements[] = array($name, $price, $detail);

                    echo <<< HTML
                    <tr>
                        <td class="tdName">$name</td>
                        <td class="tdPrice">$price</td>
                        <td class="tdDetail">$detail</td>
                    </tr>
                    HTML;
                }

                $_SESSION['elements'] = $elements;
                $_SESSION['numElements'] = $numElements;
            ?>
        </table>

        <form action="uploadQuery.php" method="POST">

            <div id="boxUploadBtn">
                <input id="confirmBtn" type="submit" name="uploadQuery" value="Confirm"/>
                <input id="cancelBtn" type="submit" name="uploadQuery" value="Cancel"/>
            </div>

        </form>
        
    </div>

</body>
</html>