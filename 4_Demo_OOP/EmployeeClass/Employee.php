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

        private function setId()
        {
            $this->id = self::$numEmployee + 1;
        }


        //METHODS

        public function __toString()
        {
            return "name: $this->name, Id: $this->id";
        }
    }
?>