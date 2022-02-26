<?php

    class Employee
    {

        //PROPERTIES

        private $name;
        private $title;


        //CONSTRUCTOR
        
        public function __construct($name, $title)
        {
            $this->name = $name;
            $this->title = $title;
        }


        //DESTRUCTOR
        
        public function __destruct()
        {
            echo "<br>oggetto {$this->getName()} distrutto<br>";
        }

        //GETTER & SETTER, per le proprietà non inserite nella definizione della classe è possibile 
        //definirle quando ci servono, ad esempio le proprietà $wage alla riga 9 e $city alla riga 
        //14 nel file demoClass.php. Non sono definite nella classe ma dopo quell'assegnazione 
        //vengono aggiunte ed è possibile recuperarle come una qualsiasi proprietà di quella
        //classe. Queste tipo di proprietà che nella definizione della classe non c'erano passano  
        //per due metodi __set($nomeVariabile, $valoreVariabile) quando avviene l'assegnazione e 
        //__get($varName) quando la si vuole recuperare, anche se vogliamo accedere ad una 
        //proprietà non definita nè aggiunta dopo viene chiamata la funzione __get() vedi riga 17 
        //in demoClass.php.
        //Le funzioni __get() e __set() vengono chiamate anche quando si vuole accedere a
        //delle proprietà private di una classe, quindi possono essere usate come getter e setter
        //generali per tutte le proprietà ma è consigliato usarlo quando si hanno molte proprietà
        //private perchè sono più lente rispetto a dei metodi "personali" per ogni proprietà
        public function __set($varName, $varValue)
        {
            $this->$varName = $varValue;
        }

        public function __get($varName)
        {
            if(!($checkVar = $this->$varName))
                echo "<br>Non esiste la proprietà $$varName<br>";
            else
                return $checkVar;
        }

        //Come i metodi descritti sopra (__get() e __set()), __call() viene chiamato quando
        //si tenta di accedere ad un metodo che non esiste. Per i metodi statici viene 
        //chiamata __callstatic()
        public function __call($nomeMetodo, $argomenti)
        {
            echo "<br>il metodo '$nomeMetodo' con i seguenti argomenti '".print_r($argomenti, true)."' non esiste<br>";
        }

        //CUSTOM GETTER & SETTER
        
        public function getName()
        {
            return $this -> name;
        }

        public function setName(string $name)
        {
            $this -> name = $name;
        }

        public function setTitle(string $title)
        {
            $this -> title = $title;
        }

        public function getTitle()
        {
            return $this -> title;
        }


        //METHODS
        
        public function sayHello()
        {
            echo "My name is {$this->getName()}<br>title: {$this->getTitle()}.";
        }
    }
?>