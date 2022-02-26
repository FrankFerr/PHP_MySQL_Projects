<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    spl_autoload_register(function ($class) { require_once("../Classes/$class.class.php"); });

    /* 
        Se una sottoclasse non ha il costruttore, viene richiamato quella della superclasse.
        Se c'è, allora quello della sottoclasse sovrascrive quello della superclasse che non viene eseguito
        Se si vuole eseguire anche il costruttore della superclasse si utilizza --> parent::__construct()
        direttamente nel costruttore della sottoclasse.
        
        Se in Person2 ci fosse un costruttore e instanziando un oggetto Person3 si volessero chiamare entrambi i
        costruttori (Person e Person2) ci sono due modi:

        1)effettuare una chiamata in cascata dei costruttori, ovvero usare in ogni costruttore l'istruzione
          parent::__construct() in questo modo ogni sottoclasse chiamerà il costruttore della propria superclasse
          in questo modo verranno eseguiti tutti

        2)effettuare chiamate individuali agli altri costruttori utilizzando al posto di "parent" il nome della classe
          esempio, nel costruttore di Person3 potremmo scrivere --> function __construct()
                                                                    {
                                                                        Person::__construct();
                                                                        Person2::__construct();
                                                                        alro codice...
                                                                    } 
    */

    class Person
    {
        public $name;

        function __construct($name) 
        {
            $this->name = $name;
            echo '<br>construct person<br>';
        }
        function __destruct(){ echo '<br>Person destruct<br>';}
    }

    class Person2 extends Person
    {
        public function info() { echo 'Person2 obj';}
        function __destruct(){ echo '<br>Person2 destruct<br>';}
    }

    //con la parola chiave 'final' si può indicare che quella classe,
    //in questo caso Person3, non può essere ereditata
    final class Person3 extends Person2
    {
        public $eta;

        //mentre indicare un metodo come 'final' evita la sovrascrittura
        //(override) da parte di classe figlie 
        final public function info() { echo 'Person3 obj';}

        function __construct($name, $eta)
        {
            parent::__construct($name);
            echo '<br>construct person3<br>';
            $this->eta = $eta;
        }
        function __destruct(){ echo '<br>Person3 destruct<br>';}
    }

    $p = new Person2("Francesco");
    $p3 = new Person3("Francesco", 24);
?>