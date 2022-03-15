<?php
require_once './include/default.php';

$result = "";

if($_POST){
    $result = $auth->registraNuovoUtente($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/stile.css">
    <title>Registrazione nuovo utente</title>
</head>

<body>
    <p>Sei in >> registrati.php</p>
    
    <a type='button' class='btn btn-info' href="index.php">Home</a>
    <a type='button' class='btn btn-info' href="login.php">Login</a>
    <hr>

    <?php echo "<p><strong>$result</strong></p>"; ?>

    <form class="" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username *">
        </div>
    
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password *">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="cpassword" placeholder="Conferma Password *">
        </div>
        
        <div class="form-group">
            <input type="text" class="form-control" name="nome" placeholder="Nome *">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email *">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-info" value="Invia">
        </div>
    </form>

</body>


</html>