<?php

    echo '<head><style>body{font-family:Verdana}</style></head>';

    require_once 'Autoload.php';

    $emp1 = new Classes\Employee("Francesco Ferrante");
    $prog1 = new Classes\Programmer("Francesco Ferrante", "PHP Dev.", 22500);

    echo $emp1."<br><br>".$prog1;
?>