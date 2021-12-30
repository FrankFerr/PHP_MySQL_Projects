<?php
    namespace MySpace;

    class MyException extends \Exception
    {
        private $language;
        private $errorCode;

        public function __construct($language, $errorCode)
        {
            $this->language = $language;
            $this->errorCode = $errorCode;
        }

        public function getErrorMessage()
        {
            $errorFile = file("../Classes/errors/{$this->language}.txt");

            foreach($errorFile as $errorStr)
            {
                list($key, $value) = explode(",", $errorStr, 2);

                $errorArr[$key] = $value;
            }

            return $errorArr[$this->errorCode];
        }
    }
?>