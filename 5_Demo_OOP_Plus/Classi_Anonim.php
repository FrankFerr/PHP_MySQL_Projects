<?php
    echo '<body style="font-family:Verdana">';

/*
    CLASSI ANONIME, sono classi che (ovviamente) non hanno un nome e
    vengono usate quando:
        - La classe non ha necessità di una documentazione
        - Viene utilizzata una volta sola nella nostra applicazione
        - C'è bisogno di un oggetto unico di quella classe
*/

    $anonima = new class('Francesco'){

        private $nome;


        public function __construct($_nome)
        {
            $this->nome = $_nome;
        }


        public function greeting()
        {
            echo "Hello from {$this->nome}<br>";
        }
    };

    $anonima->greeting();

    echo '<br>';
    var_dump($anonima);
?>