<?php
require_once './include/default.php';

$result = "";

if($_POST){

    $result = $authLogin->login($_POST['username'], $_POST['password']);

    if($result === TRUE){
        header('location:./profilo.php');
        exit;
    }

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
    <title>Login utente</title>
</head>

<body>
    <p>Sei in >> login.php</p>        

    <a type='button' class='btn btn-info' href="index.php">Home</a>
    <a type='button' class='btn btn-info' href="registrati.php">Registrati</a>

    <hr>


    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

        <div class="from-group">
            <input type="text" name="username" class="form-control" placeholder="Username">
        </div>

        <div class="from-group">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

        <?php 
            if($result !== "")
                echo "<div class='alert alert-danger'>$result</div>";
        ?>

        <div class="from-group">
            <input type="submit" value="Effettua il login" class="btn btn-info">
        </div>

    </form>

</body>


</html>