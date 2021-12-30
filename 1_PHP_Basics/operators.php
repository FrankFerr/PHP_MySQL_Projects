<?php
    echo '<body style="font-family:Verdana">';


    //EQUALITY

    $num1 = 10;
    $strNum = "10";
    $str = "Hello";

    echo 'EQUALITY<br><br>';
    echo '$num1 = 10;<br>';
    echo '$strNum = "10";<br>';
    echo '$str = "Hello";<br><br>';

    //con il doppio uguale viede considerato solo il valore, quindi 10 è uguale a "10"
    printf('$num1 == $strNum: %d<br>', $num1 == $strNum);
    printf('$num1 == $str: %d<br>', $num1 == $str);
    //con il triplo uguale viene considerato anche il tipo, quindi 10 (int) non è uguale a "10" (string)
    printf('$num1 === $strNum: %d<br>', $num1 === $strNum);

    echo '<br><hr><br>';


    //COMPARISONS

    $num2 = 20;
    $num3 = 30;

    echo 'COMPARISON<br><br>';
    echo '$num2 = 20;<br>';
    echo '$num3 = 30;<br><br>';

    //<=> --> 'minore uguale o maggiore di', restituisce -1, 0 o 1 a seconda se l'operando di sinistra
    //è minore, uguale o maggiore di quello di destra. confrontando con le stringhe viene preso in
    //considerazione il valore e non il tipo
    printf('$num1 <=> $num2 = %d<br>', $num1 <=> $num2);
    printf('$num3 <=> $num2 = %d<br>', $num3 <=> $num2);
    printf('$num1 <=> $strNum = %d<br>', $num1 <=> $strNum);

    echo '<br><br>';


    //NULL COALESCING OPERATOR (??) introdotto da PHP 7.0

    $num4;

    echo "NULL COALESCING OPERATOR<br><br>";
    echo '$num4;<br><br>';

    //se l'operando di sinistra non è null, quindi è stato inizializzato con qualche valore, allora viene restituito
    //altrimenti viene restituito il valore di destra;
    echo '$num3 ?? 10 = ', $num3 ?? 10, '<br>';
    echo '$num4 ?? 10 = ', $num4 ?? 10, '<br>';

?>