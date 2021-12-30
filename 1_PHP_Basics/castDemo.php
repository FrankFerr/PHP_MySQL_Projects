<?php
    echo "<body style=\"font-family:Tahoma;\">";

    $num = (int) 15.7;
    echo "\$num = (int) 15.7, \$num = ", $num, "<br><br>";

    $num2 = (int) "string";
    echo "\$num2 = (int) \"string\", \$num2 = ", $num2, "<br><br>";

    $num3 = (int) "1510string";
    echo "\$num3 = (int) \"1510string\", \$num3 = ", $num3, "<br><br>";

    $num4 = 1200;
    $array1 = (array) $num4;
    echo "\$array1 = (array) \$num4, \$array1 diventa un array con il primo elemento contenente il numero in \$num4. \$array1[0] = ".$array1[0];

    $num5 = 15.23;
    echo "<br><br>\$num5 = $num5, dopo \$num5 = (int) \$num5: ", $num5 = (int) $num5, "<br><br>";

    //Type Juggling

    $val1 = 10;
    $val2 = "20";

    echo "\$val1 = 10;<br>";
    echo "\$val2 = \"20\";<br>";
    echo "\$val1 + \$val2 = ", $val1 + $val2, "<br><br>";

    $val2 = "35 Mouse";

    echo "\$val1 = 10;<br>";
    echo "\$val2 = \"35 Mouse\";<br>";
    echo "\$val1 + \$val2 = ", $val1 + $val2, "<br><br>";

    $val2 = "1.2e3"; // == 1200
    $val1 = 2;
    
    echo "\$val1 = 2;<br>";
    echo "\$val2 = \"1.2e3\";<br>";
    echo "\$val1 * \$val2 = ", $val1 * $val2, "<br><br>";


?>