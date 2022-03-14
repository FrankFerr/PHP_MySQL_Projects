<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

include_once './include/db.php';
include_once './include/AuthSys.php';

$auth = new AuthSys($PDO);

if($auth->utenteLoggato()){
    echo 'Sei loggato - <a href="./logout.php">logout</a><br><br>';
}
?>