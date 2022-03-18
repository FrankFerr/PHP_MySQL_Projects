<?php
require_once './include/default.php';

if($authLogin->logout()){
    header('location:./index.php');
    exit;
}


?>
