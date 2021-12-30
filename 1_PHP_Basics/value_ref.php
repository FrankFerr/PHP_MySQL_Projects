<?php
    echo "<body style=\"font-family:Verdana\">";


    //Assigning by value

    $str1 = "Hello";
    $str2 = $str1;
    $str2 = "World";

    echo "\$str1 = \"Hello\";<br> \$str2 = \$str1;<br> \$str2 = \"World\";<br><br>";
    echo "\$str1 = $str1, \$str2 = $str2.<br><br><br>";

    //Assigning by reference

    $str1 = "Hello";
    $str2 =& $str1;  //ok --> $str2 = &$str1;
    $str2 = "World";

    echo "\$str1 = \"Hello\";<br> \$str2 =& \$str1;<br> \$str2 = \"World\";<br><br>";
    echo "\$str1 = $str1, \$str2 = $str2.<br><br><br>";

?>