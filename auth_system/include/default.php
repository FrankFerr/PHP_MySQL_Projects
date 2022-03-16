<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

include_once './include/db.php';
include_once './include/AuthSys.php';
include_once './lib/PHPMailer/src/PHPMailer.php';
include_once './lib/PHPMailer/src/SMTP.php';
include_once './lib/PHPMailer/src/POP3.php';


$mail = new PHPMailer\PHPMailer\PHPMailer();

$auth = new AuthSys($PDO, $mail);

if($auth->utenteLoggato()){
    echo 'Sei loggato - <a href="./logout.php">logout</a><br><br>';
}
?>