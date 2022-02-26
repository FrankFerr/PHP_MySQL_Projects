<?php
    //Dichiarare il namespace prima di tutte le altre istruizioni
    namespace Books;

    class Book
    {
        //PROPERTIES

        private $title;
        private $isbn;
        private static $copies = 0;



        //CONSTRUCTORS

        public function __construct($title, $isbn)
        {
            $this->title = $title;
            $this->setIsbn($isbn);

            self::$copies++;
            
        }


        //GETTERS & SETTERS custom

        
        //copies

        public static function getCopies()
        {
            return self::$copies;
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
            $this->title = $title;
        }

        public function getTitle() { return $this->title;}

        // TO STRING
        public function __toString()
        {
            return sprintf("Title: %s<br>isbn: %s<br>sold: %d", $this->title, $this->isbn, self::$copies);
        }

        //__clone() è una funzione in cui possiamo descrivere la procedura di clonazione di un oggetto
        function __clone()
        {
            $this->setTitle("Cloned Book");
        }

    }
?>