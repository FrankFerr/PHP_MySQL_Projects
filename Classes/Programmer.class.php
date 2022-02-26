<?php
    namespace Classes;

    class Programmer extends Employee
    {
        //PROPERTIES
        private $title;
        private $wage;


        //CONSTRUCTOR
        
        public function __construct($name, $title, $wage)
        {
            parent::__construct($name);
            $this->setTitle($title);
            $this->setWage($wage);
        }

        //GETTER & SETTER

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function getTitle() { return $this->title; }

        public function setWage($wage)
        {
            $this->wage = $wage;
        }

        public function getWage() { return $this->wage; }


        //METHODS

        public function __toString()
        {
            return parent::__toString() . "<br>title: $this->title<br>wage: " . number_format($this->wage, 2, ",", ".") . "€";
        }
    }
?>