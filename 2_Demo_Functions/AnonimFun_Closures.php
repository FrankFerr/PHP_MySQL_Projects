<?php
    echo '<body style="font-family:Verdana">';


    /*
     *  CLOSURE (ANONIMOUS FUNCTION)
     */

    $closure = function(){
        echo "Anonimous Function<br>";
    };

    $closure();

    echo "<br><hr><br>";
//------------------------------------------------------>

    $str = "Hello";

    function myEcho()
    {
        echo "Test closure<br>";
    }

    $prova = "myEcho";
    $prova(); // stampa -> "Test closure<br>"

    echo "<br><hr><br>";
//------------------------------------------------------->

    //CLOSURE WITH EXTERN VARIABLE

    $num = 15;
    echo "\$num = 15<br><br>";

    //La variabile $num esterna alla funzione e quella interna sono due variabili diverse
    //perchè la prima non è visibile dalla funzione. Per renderlo visibile, e quindi farlo
    //rientrare nello scope della funzione, si usa la parola chiave "use"(vedi il prossimo esempio)

    $extern1 = function(){
        //$num += 100; -> $num non viene vista all'esterno, bisogna ridefinirla
        $num = 100;
        echo "\$extern1's \$num = $num<br>";
    };
    $extern1();

    echo "extern \$num = $num<br><br>";

    //BY VALUE
    $extern2 = function() use ($num){
        $num += 100;
        echo "\$extern2's \$num = $num<br>";
    };
    $extern2();

    echo "extern \$num = $num<br><br>";

    //BY REFERENCE
    $extern3 = function() use (&$num){
        $num += 100;
        echo "\$extern3's \$num = $num<br>";
    };
    $extern3();

    echo "extern \$num = $num<br><br>"
?>