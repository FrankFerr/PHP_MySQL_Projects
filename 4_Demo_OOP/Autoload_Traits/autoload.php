<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    spl_autoload_register(function ($class) { require_once("../../Classes/$class.class.php"); });

    $emp1 = new Employee("Francesco Ferrante");
    $prog1 = new Programmer("Francesco Ferrante", "PHP Dev.", 22500);

    echo $emp1."<br><br>".$prog1;
?>