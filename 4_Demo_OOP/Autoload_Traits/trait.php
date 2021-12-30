<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    //è simile ad una classe ma non è possibile instanziare un oggetto.
    //vengono usati dalle classi per aggiungere funzionalità simili tra di
    //loro per evitare la riscrittura del codice.
    //utilizzo -> nella definizione della classe usare l'istruzione: use trait1, trai2, ...;
    trait Log
    {
        private $num = 10;

        function writeLog($msg)
        {
            echo "<br>instanziato un oggetto della classe: $msg + $this->num<br><br>";
        }
    }

    class Test
    {
        use Log;

        function __construct()
        {
            $this->writeLog("Test");
            echo "num: $this->num";
        }
    }

    $prova = new Test();
?>