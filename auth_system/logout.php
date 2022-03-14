<?php
require_once './include/default.php';

if($auth->logout()){
    header('location:./index.php');
    exit;
}


?>
