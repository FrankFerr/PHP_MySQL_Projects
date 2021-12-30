<?php
    session_start();

    //se non è stato effettuato il login come amministratore, ritorna all'homepage
    if(!isset($_SESSION['admin']) && !$_SESSION['admin']->login)
    {
        header("location: index.html");
        exit;
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Exercise</title>
    <link rel="stylesheet" href="css/insertFile.css?ts=<?=time()?>&quot">

</head>

<body>

    <div id="boxGrande">

        <h2>Upload products from file</h2>

        <button onclick="document.location='login.php?logout=true'" id="logout">Log out</button>

        <form action="upload.php" method="POST" enctype="multipart/form-data"> 

            <div id="boxInputFile">
                <label for="inputFile">Select a file:</label>
                <input id="inputFile" type="file" name="upload" required>
            </div>
            
            <div id="boxUploadBtn">
                <input id="uploadBtn" type="submit" name="upload" value="Upload"/>
            </div>

        </form>

        <div id="boxReturnBtn">
            <a href="insert.php?order=name"><button id="returnBtn"><- Return</button></a>
        </div>

    </div>

</body>
</html>