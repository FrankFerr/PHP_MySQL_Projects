<?php

    echo '<head><style>body{font-family:Verdana}</style></head>';

    require_once 'Autoload.php';

    $emp1 = new Classes\Employee("Antonio");
    $prog1 = new Classes\Programmer("Marco", "Java SE", 19000);

    echo $emp1."<br><br>".$prog1;


?>