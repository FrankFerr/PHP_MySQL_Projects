<?php
require_once './include/default.php';

if(!$authLogin->utenteLoggato()){
    header('location:./index.php');
    exit;
}

$_SESSION['csrf'] = AuthSysSecure::getTokenCSRF();

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stile.css">
    <title>Document</title>
</head>

<body>
    
    <p>Sei in >> profilo.php</p>

    <a type='button' class='btn btn-info' href="index.php">Home</a>
    <a type='button' class='btn btn-info' href="registrati.php">Registrati</a>
    <a type='button' class='btn btn-info' href="login.php">Login</a>
    <hr>

    <a type='button' class='btn btn-danger' href="cancella-account.php">Cancella account</a>


</body>


</html>