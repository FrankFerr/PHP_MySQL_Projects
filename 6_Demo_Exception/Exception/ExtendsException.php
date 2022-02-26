<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    require_once "../../Classes/MyException.class.php";

    define("PW_CORRECT", '19061997');

    $password = '19061';

    try
    {
        if($password != PW_CORRECT) throw new MySpace\MYException("italian", 2);
        
        echo "Password corretta";
    }
    catch(MySpace\MyException $exc)
    {
        echo "<br><br>Error: (file: {$exc->getFile()} at line {$exc->getLine()}), {$exc->getErrorMessage()}<br>";
    }

?>