<?php
    session_start();

    //se non è stato effettuato il login come amministratore, ritorna all'homepage'
    if(!isset($_SESSION['admin']) && !$_SESSION['admin']->login)
    {
        header("location: index.html");
        exit;
    }

    require_once "utility.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Exercise</title>
    <link rel="stylesheet" href="css/insert.css?ts=<?=time()?>&quot">
</head>
<body>

    <button onclick="document.location='login.php?logout=true'" id="logout">Log out</button>
    
    <div id="boxGrande">

        <h2>Insert new record</h2>

        <form action="insert.php" method="POST">

            <div id="boxInput">
                <input type="text" maxlength="40" name="prodName" placeholder="Insert product name" value="" required/>
            </div>

            <div id="boxInput">
                <input type="text" name="prodPrice" maxlength="10" pattern="\d+[,.]\d\d" placeholder="insert product price (es. 10,80)" value="" required/>
            </div>

            <div id="boxInput">
                <textarea name="prodDetail" placeholder="Insert product detail" value="" cols="30" rows="5" required></textarea>
            </div>

            <div id="boxSubmit">
                <input type="submit" id="submitInput" name="submit" value="Insert value"/>

                <a href="insertFile.php"><input type="button" id="uploadBtn" value="Upload file" /></a>
            </div>

        </form>
        
        <div id="boxFetchBtn">
        <a href="fetch.php?order=name"><button id="fetchBtn">View records</button></a>
        </div>

<?php
    //controlla se è stato premuto il bottone 'insert value' per inserire un nuovo prodotto nel database
    if(isset($_POST['submit']))
    {
        //connessione al database
        $mysqli = connectToDb();

        //recupero e sanificazione delle informazioni sul prodotto inserite 
        $name = $mysqli->real_escape_string(validationInput($_POST['prodName']));
        $price = str_replace(",", ".", $_POST['prodPrice']);
        $detail = $mysqli->real_escape_string(validationInput($_POST['prodDetail']));

        //scrittura query per l'inserimento del prodotto
        $query = "INSERT INTO products(name, price, detail) VALUES('$name', $price, '$detail')";

        //controlla il risultato della query mostrando un messaggio a schermo
        if(!$mysqli->query($query))
        {
            echo <<<HTML
            <div id='boxInsertSuccess'>Error with database, please try again later</div>
            HTML;
        }
        else
        {
            echo <<<HTML
            <div id="boxInsertSuccess">insert successful</div>
            HTML;
        }

        $mysqli->close();
        
    }
?>
    </div>

</body>
</html>