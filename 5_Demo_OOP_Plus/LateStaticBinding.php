<?php
    echo '<heaf><style>body{font-family:Verdana}</style></head>';

    /*
    Quando ci troviamo in una situazione in cui una variabile statica ha lo stesso nome
    nella superclasse e sottoclasse ed un methodo statico definito nella superclasse
    accede a questa variabile, avremmo dei problemi di visibilità. Se accediamo ad essa
    attraverso "self::$favGame" ci verrà restituito il valore della classe Super perchè,
    "self::" risolve la visibilità al momento della compilazione, anche se chiamiamo il
    metodo da Sub. Per fare in modo che la visibilità della variabile venga risolta durante
    l'esecuzione si utilizza la parola chiave static --> static::$favGame
    */

    class Super
    {
        public static $favGame = "Far Cry 6";

        public static function playGame()
        {
            echo "self --> I'm playing " . self::$favGame . "<br>";
            echo "static --> I'm playing " . static::$favGame . "<br><br>";
        }
        
    }

    class Sub extends Super
    {
        public static $favGame = "God Of War";

    }


    Sub::playGame();

?>