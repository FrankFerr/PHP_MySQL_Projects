<?php
    class Book
    {
        //PROPERTIES

        private $title;
        private $isbn;
        private $copies;


        //CONSTRUCTORS

        public function __construct(string $title, string $isbn)
        {
            $this->title = $title;
            $this->setIsbn($isbn);
        }


        //GETTERS & SETTERS custom

        
        //copies

        public function setCopies($copies)
        {
            if($copies > 0)
                $this->copies = $copies;
        }

        public function getCopies()
        {
            return $this->copies;
        }


        //isbn

        public function setIsbn(string $isbn) : bool
        {
            if(is_numeric($isbn) && (strlen($isbn) == 10))
            {
                $this->isbn = $isbn;
                return TRUE;
            }

            return FALSE;
        }

        public function getIsbn() { return $this->isbn; }


        //title
        public function setTitle($title)
        {
            if($title !== "")
                $this->title = $title;
        }

        public function getTitle() { return $this->title; }

        

        // TO STRING
        public function __toString()
        {
            return sprintf("Title: %s<br>isbn: %s<br>sold: %d", $this->title, $this->isbn, $this->copies);
        }

        //__clone() è una funzione in cui possiamo descrivere la procedura di clonazione di un oggetto
        function __clone()
        {
            $this->setTitle("Cloned Book");
        }

    }
?>