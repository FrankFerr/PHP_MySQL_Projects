<?php

include_once './include/default.php';


if(!isset($_GET['id']) || !isset($_GET['token'])){
    header('location: index.php');
    exit;
}

$ris = $auth->confermaRegistrazione($_GET['id'], $_GET['token']);

if($ris === FALSE){
    header('location: index.php');
    exit;
}


echo <<<HTML
<div class="alert alert-success">Registrazione avvenuta con successo, fai il login <a href="login.php">qui</a></div>
HTML;

?>