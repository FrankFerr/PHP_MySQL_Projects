<?php
    echo '<heaf><style>body{font-family:Verdana}</style></head>';

    //Quando ci troviamo in questa situazione, in cui una stessa variabile statica può contenere valori diversi da 
    //superclasse a sottoclasse ed un methodo statico definito nella superclasse il quale accede a questa variabile,
    //avremmo dei problemi di visibilità della variabile se accediamo ad essa attraverso "self::" perchè risolve la 
    //visibilità al momento della compilazione quindi visto che durante la compilazione self:: si trova in un metodo
    //della superclasse, self::$favGame "punterà" sempre al valore di $favGame della classe Super anche s chiamiamo il
    //metodo da Sub. Per fare in modo che la visibilità della variabile venga risolta durante l'esecuzione si utilizza
    //la parola chiave static --> static::$favGame
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