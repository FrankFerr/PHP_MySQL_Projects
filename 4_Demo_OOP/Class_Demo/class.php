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
            echo "<br>oggetto distrutto<br>";
        }

        //GETTER & SETTER, per le proprietà non inserite nella definizione della classe è possibile 
        //definirle quando ci servono, ad esempio le proprietà $wage alla riga 9 e $city alla riga 14
        //nel file demoClass.php non sono definite nella classe ma dopo quell'assegnazione vengono
        //aggiunte ed è possibile recuperarle come una qualsiasi proprietà di quella classe. Queste
        //tipo di proprietà che nella definizione della classe non c'erano passano per due metodi 
        //__set($nomeVariabile, $valoreVariabile) quando avviene l'assegnazione e __get($varName) quando
        //la si vuole recuperare, anche se vogliamo accedere ad una proprietà non definita nè aggiunta
        //dopo viene chiamata la funzione __get() vedi riga 17 in demoClass.php
        
        public function __set($varName, $varValue)
        {
            $this->$varName = $varValue;
        }

        public function __get($varName)
        {
            if(!($checkVar = $this->$varName))
                echo "<br>Non esiste la proprietà $varName<br>";
            else
                return $checkVar;
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