<?php

class AuthSysSecure{

    private const MAX_INPUT_CHAR = 200;

    public function __construct(){}


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

}



?>