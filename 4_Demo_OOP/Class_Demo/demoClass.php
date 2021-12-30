<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    require_once "class.php";

    $frank = new Employee("Francesco Ferrante", "PHP Programmer");
    $frank->wage = 18500;

    echo "{$frank->sayHello()}<br>";
    printf("wage: %s€", number_format($frank->wage, 2, ",", "."));    

    $frank->city = "Naples";
    echo "<br>city: $frank->city";

    echo "<br>età: $frank->eta";

    echo "<br><br>";

    echo var_dump($frank)."<br>";
?>