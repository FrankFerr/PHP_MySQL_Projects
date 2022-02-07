<?php
    class Employee
    {
        //PROPERTIES

        private $name;
        private $id;
        private static $numEmployee;

        //CONSTRUCTORS
        
        public function __construct(string $name)
        {
            $this->setId();
            $this->setName($name);
            
            self::$numEmployee++;
        }


        //DESTRUCTOR
        
        public function __destruct()
        {
            echo "<br><br>oggetto distrutto<br>";
        }

        //GETTER & SETTER, per le proprietà non inserite nella definizione della classe è possibile 
        //definirle quando ci servono, ad esempio le proprietà $wage alla riga 7 e $city alla riga 12
        //nel file 4_Demo_OOP\Class_Demo\demoClass.php non sono definite nella classe ma dopo quell'assegnazione vengono
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
        

        //GETTER & SETTER custom

        static function getNumEmployee() { return self::$numEmployee; }

        public function getName() { return $this->name; }
        public function getId() { return $this->id; }

        private function setName(string $name)
        {

            if(!is_numeric($name) && count(explode(" ", $name)) >= 2)
            {
                $this->name = $name;
            }
            else
            {
                $this->name = "Employee_".str_pad($this->id, 4, '0', STR_PAD_LEFT);
            }
            
        }

        private function setId() { $this->id = self::$numEmployee + 1; }

        
        //METHODS

        public function __toString() { return "name: $this->name, Id: $this->id"; }
    }
?>