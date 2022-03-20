<?php
session_start();

if($_POST){

    if($_POST['csrf'] !== $_SESSION['csrf']){
        header('location:index.php');
        exit;
    }
    else{
        echo <<<HTML
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <div class='alert alert-info'>Il tuo account è stato eliminato con successo</div>
        <br>
        <a type='button' class='btn btn-info' href="index.php">Home</a>
        HTML;

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
    <title>Document</title>
</head>
<body>
    
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

        <textarea name="info" class="form-control" cols="30" rows="6" placeholder="Perchè vuoi cancellare il tuo account?"></textarea>
        <br>

        <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">

        <input type="submit" class="btn btn-danger" value="Cancella il mio account">

    </form>

    <hr>
    <a href="profilo.php" class="btn btn-info" type="button"><- return</a>


</body>
</html>