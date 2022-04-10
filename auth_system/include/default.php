<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once './include/db.php';
include_once './include/AuthSys.php';
include_once './include/AuthSysReg.php';
include_once './include/AuthSysLogin.php';
include_once './include/AuthSysSecure.php';
include_once './lib/PHPMailer/src/PHPMailer.php';
include_once './lib/PHPMailer/src/SMTP.php';
include_once './lib/PHPMailer/src/POP3.php';


$mail = new PHPMailer\PHPMailer\PHPMailer();

$secure = new AuthSysSecure();

$authReg = new AuthSysReg($PDO, $mail, $secure);
$authLogin = new AuthSysLogin($PDO, $secure);

if($authLogin->utenteLoggato()){
    echo 'Sei loggato - <a href="./logout.php">logout</a><br><br>';
}
?>