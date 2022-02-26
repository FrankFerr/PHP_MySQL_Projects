<?php
    namespace MySpace;

    class MyException extends \Exception
    {
        private $language;
        private $errorCode;
        private $error_message;

        public function __construct($language, $errorCode)
        {
            $this->language = $language;
            $this->errorCode = $errorCode;
            $this->error_message = $this->message();
        }

        private function message()
        {
            //apertura file di testo in cui sono scritti alcuni errori
            //nel formato "1,descrizione errore"
            $errorFile = file("../../Classes/errors/{$this->language}.txt");

            //lettura stringa per stringa del file
            foreach($errorFile as $errorStr)
            {
                //divisione del numero e della descrizione dell'errore con explode()
                list($key, $value) = explode(",", $errorStr, 2);

                //salvataggio dell'errore trovato con codice errore come chiave e 
                //la descrizione come valoreS
                $errorArr[$key] = $value;
            }

            return "Errore nel file: {$this->getFile()} alla linea {$this->getLine()}, con codice {$this->errorCode}. Messaggio: {$errorArr[$this->errorCode]}";

        }

        public function getErrorMessage()
        {            
            //C:\xampp\apache\logs
            error_log($this->error_message);
        }
    }
?>