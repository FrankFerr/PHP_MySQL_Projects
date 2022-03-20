<?php

class AuthSysSecure{

    private const MAX_INPUT_CHAR = 200;
    private $cookie;

    public function __construct(){
        $this->cookie = [
            //con '0' (valore default) la sessione è attiva finchè non chiudiamo il browser
            'lifetime' => 0,
            //con '/' i cookie sono validi per tutta l'applicazione
            'path' => '/',
            'domain' => '',
            //con true diciamo di inviare i cookie solo su connessioni sicure https
            'secure' => true,
            //con true non permettiamo l'accesso ai cookie oltre al protocollo http difendendoci dagli attacchi XSS
            'httponly' => true,
            //evita di mandare i cookie tramite richieste cross-site. Con 'Lax' i cookie non verranno inviati con
            //rihcieste POST cross-domain mentre verranno inviati con richieste GET
            'samesite' => 'Lax'
        ];

        $this->initSession();
    }


    private function initSession(){
        //session.use_cookies -> default == 1, specifica se usare i cookies per salvare l'id di sessione
        ini_set('session.use_cookies', 1);

        //session.use_only_cookies -> default == 1, specifica che si utilizzeranno solo i cookies per memorizzare
        //l'id di sessione evitando il passaggio tramite URL
        ini_set('session.use_only_cookies', 1);

        //session.use_trans_sid -> default == 0, abilita(1) o disabilita(0) il supporto per il sid trasparente
        ini_set('session.use_trans_sid', 0);

        //session.use_strict_mode -> default == 0, se abilitato i moduli non accetteranno un id di sessione non
        //inizializzato. Se un server riceve un id non inizializzato rimanda al client un nuovo id inizializzato.
        //Serve a prevenire il 'session fixation', ovvero quando un attaccante prova ad imporre al client un suo
        //id di sessione in modo da risultare loggato come se fosse la vittima
        ini_set('session.use_strict_mode', 1);

        session_set_cookie_params($this->cookie);

        $this->startSession();
    }


    //se non c'è nessuna sessione attiva ne avvia una
    private function startSession(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
    }


    //crea un nuovo id di sessione, con il parametro true andiamo a cancellare la vecchia sessione
    public function regenSession(){
        return session_regenerate_id(true);
    }


    //se c'è una sessione attiva la elimina
    public function destroySession(){
        if(session_status() === PHP_SESSION_ACTIVE){
            session_destroy();
        }
    }


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