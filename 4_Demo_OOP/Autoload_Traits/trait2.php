<head>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 1.5rem;
        }
    </style>
</head>

<?php

trait ProvaA
{
    public function metodo1(){
        echo 'funzione metodo1 del trait ProvaA<br>';
    }

    public function metodo2(){
        echo 'funzione metodo2 del trait ProvaA<br>';
    }
}

trait ProvaB
{
    public function metodo1(){
        echo 'funzione metodo1 del trait ProvaB<br>';
    }
}

class C{
    use ProvaA, ProvaB{
        //per risolvere le collisioni tra metodi con lo stesso nome di due
        //trait diversi, utilizzati da una classe, bisogna usare questa sintassi.
        //A sinistra si deve scrivere il metodo che si vuole tenere.
        ProvaB::metodo1 insteadof ProvaA;
    }
}

$test = new C;

$test->metodo2();
$test->metodo1();

?>