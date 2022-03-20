<?php

class AuthSysSecure{

    private const MAX_INPUT_CHAR = 200;

    public function __construct(){}


    //Limita la quantità di dati ricevuti e li sanifica
    public function sanitizeInput(mixed &$input, string $type = 'mixed', bool $maxLength = TRUE): mixed {

        if($maxLength === TRUE){
            $result = mb_substr($input, 0, self::MAX_INPUT_CHAR);
        }
        else{
            $result = &$input;
        }


        switch($type){
            case 'str': htmlspecialchars($result);
                        break;
            
            case 'int': filter_var($result, FILTER_SANITIZE_NUMBER_INT);
                        break;

            default: htmlspecialchars($result);
        }

        return $result;
    }


    //genera un token per l'identificazione dell'utente
    public static function getTokenCSRF(): string{
        return bin2hex(random_bytes(64));
    }
}



?>