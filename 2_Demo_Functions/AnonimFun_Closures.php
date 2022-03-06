<?php
    echo '<body style="font-family:Verdana">';


    /*
     *  LAMBDA (ANONIMOUS FUNCTION)
     */

    $closure = function(){
        echo "Anonimous Function<br>";
    };

    $closure();

    echo "<br><hr><br>";


//------------------------------------------------------>

    function myEcho($nome)
    {
        echo "Hello World from $nome<br>";
    }

    $prova = "myEcho";
    $prova('Francesco'); 

    echo "<br><hr><br>";


//------------------------------------------------------->

    //CLOSURE (WITH EXTERN VARIABLE)

    $num = 15;
    echo "\$num = 15<br><br>";


    //La variabile $num esterna alla funzione e quella interna sono due variabili diverse
    //perchè la prima non è visibile dalla funzione. Per renderlo visibile, e quindi farlo
    //rientrare nello scope della funzione, si usa la parola chiave "use"


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

    echo "extern \$num = $num<br><br>";

    echo "<br><hr><br>";


    //---------------------------------------------------------------------->

    //ESEMPIO CLOSURE (utile quando viene usata come callback)

    $arr = [10, 4, 6, 8];
    $pot = 4;

    array_walk($arr, function($elemento) use($pot){
        echo "Number: $elemento  Exponent: $pot == ".pow($elemento, $pot)."<br>";
    });

    echo "<br><hr><br>";


    //---------------------------------------------------------------------->

    //FUNZIONI ANONIME SELF-EXCECUTING (PHP 7), vengono chiamate automaticamente quando
    //lo script arriva a loro

    (function(){
        echo 'Hello from an self-excecuting anonymous function<br><br>';
    })();

    (function($nome){ echo "Hello from $nome<br><br>"; })('Francesco');

    (function($num, $exp){
        echo "Number: $num  Exponent: $exp == ".pow($num, $exp)."<br>";
    })(14, 5);
?>