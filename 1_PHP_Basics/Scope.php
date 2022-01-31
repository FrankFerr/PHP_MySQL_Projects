<?php
    $test = 'Hello'; //scope globale

    //$nome ha uno scope locale, non viene vista al di fuori della funzione
    function globalTest(string $nome)
    {
        // echo $test; -> errore, la variabile non è visibile 
        global $test; //primo metodo
        echo $test.' '.$nome;

        echo '<br>';

        $test2 = $GLOBALS['test'];
        echo $test2.' '.$nome;
    }

    function staticTest()
    {
        static $a = 0; //scope statico, la variabile non è visibile al di fuori della funzione ma mantiene il suo valore

        $a++;
        
        echo $a.'<br>';
    }

    globalTest('Francesco');

    echo '<br><br>';

    staticTest();
    staticTest();
    staticTest();

?>