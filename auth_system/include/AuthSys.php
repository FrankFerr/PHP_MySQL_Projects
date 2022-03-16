<?php

class AuthSys
{
    private PDO $PDO;


    public function __construct($PDOconn)
    {
        $this->PDO = $PDOconn;
    }


    //Controllo esistenza username
    public function usernameExists($username){
        $query = 'SELECT * FROM Utenti WHERE username = :username';
        $st = $this->PDO->prepare($query);
        
        $st->bindParam(':username', $username, PDO::PARAM_STR);
        $st->execute();

        if($st->rowCount() > 0){
            return $st->fetch(PDO::FETCH_ASSOC);
        }

        return FALSE;
    }


    //Controllo correttezza moduli
    public function checkModules($post){

        // USERNAME ---------------------------------------------------------->
        if( !(ctype_alnum($post['username']) && mb_strlen($post['username']) >= 8 && mb_strlen($post['username']) <= 15) ){
            throw new Exception('Username non valida');
        }


        // PASSWORD ---------------------------------------------------------->
        if(!preg_match("/^[a-zA-Z0-9!\$#-@_]{8,14}$/", $post['password'])){
            throw new Exception('Password non valida');
        }


        // CONFERMA PASSWORD ------------------------------------------------->
        if(strcmp($post['password'], $post['cpassword']) !== 0){
            throw new Exception('Le password inserite sono diverse');
        }


        // EMAIL ------------------------------------------------------------>
        if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
            throw new Exception('Email non valida!');
        }


        // NOME ------------------------------------------------------------->
        if(mb_strlen($post['nome']) < 3){
            throw new Exception('Nome inserito non valido!');
        }
    }


    //Aggiunta nuovo utente nel database
    public function addUser($post, $pw_hash, $token){

        $query = "INSERT INTO Utenti(username, password, nome, email) VALUES (:username, :password, :nome, :email, :token)";
        $st = $this->PDO->prepare($query);

        $st->bindParam(':username', $post['username'], PDO::PARAM_STR);
        $st->bindParam(':password', $pw_hash, PDO::PARAM_STR);
        $st->bindParam(':nome', $post['nome'], PDO::PARAM_STR);
        $st->bindParam(':email', $post['email'], PDO::PARAM_STR);
        $st->bindParam(':token', $token, PDO::PARAM_STR);

        $st->execute();
    }


    //gestione registrazione nuovo utente
    public function registraNuovoUtente($post) {

        foreach ($post as $key => $value) {
            $post[$key] = trim($value);
        }


        try{

            //CONTROLLO ESISTENZA USERNAME
            if($this->usernameExists($post['username'])) {
                return 'L\'username inserito esiste già!';
            }

            // CONTROLLO CORRETTAZZA CAMPI INSERITI
            $this->checkModules($post);

            // INSERIMENTO NEL DATABASE
            $pw_hash = password_hash($post['cpassword'], PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(32));

            $this->addUser($post, $pw_hash, $token);

        }
        catch(PDOException $exc){
            return 'Sembra esserci qualche problema, riprova più tardi.';
        }
        catch(Exception $e){
            return $e->getMessage();
        }


        return 'Sei stato registrato correttamente!';
    }


    //Controllo login
    public function login(string $username, string $password) {

        $user = $this->usernameExists($username);

        try{
            // Ricerca username ------------------------------------->
            if(!$user){
                throw new Exception('Username o Password errati!');
            }


            // CONTROLLO PASSWORD ------------------------------------------------>
            if(!password_verify($password, $user['password'])){
                throw new Exception('Username o Password errati!');
            }


            //Controllo account attivo ------------------------------------->
            if(!$user['active']){
                throw new Exception('Account non attivo, controllare l\'email!');
            }


            // Inserimento in UtentiLoggati -------------------------------------->
            $sessionId = session_id();
        
            $query = "INSERT INTO UtentiLoggati(session_id, user_id) VALUES (:session, :id)";
            $st = $this->PDO->prepare($query);

            $st->bindParam(':session', $sessionId, PDO::PARAM_STR);
            $st->bindParam(':id', $user['id'], PDO::PARAM_INT);

            $st->execute();

        }
        catch(PDOException $exc){
            return 'Sembra esserci qualche errore. Riprova più tardi!';
        }
        catch(Exception $exc){
            return $exc->getMessage();
        }

        return TRUE;

    }


    //Effettua il ogout
    public function logout() {
        try{
            $query = 'DELETE FROM UtentiLoggati WHERE session_id = :sessionId';
            $st = $this->PDO->prepare($query);

            $sessionId = session_id();

            $st->bindParam(':sessionId', $sessionId, PDO::PARAM_STR);
            $st->execute();
        }
        catch(PDOException $exc){
            echo "Errore 'logout' in {$exc->getFile()}, riga {$exc->getLine()}";
        }

        return TRUE;
    }


    //Controllo login utente registrato
    public function utenteLoggato() {
        try{
            $query = 'SELECT * FROM UtentiLoggati WHERE session_id = :session';
            $st = $this->PDO->prepare($query);

            $sessionId = session_id();

            $st->bindParam(':session', $sessionId, PDO::PARAM_STR);
            $st->execute();
        }
        catch(PDOException $exc){
            echo "Errore 'utenteLoggato' in {$exc->getFile()}, riga {$exc->getLine()}";
        }
        
        if($st->rowCount() == 0){
            return FALSE;
        }

        return TRUE;
    }
    

    private function printArray($array){
        echo "<pre>".print_r($array, true)."</pre><br>";
    }
}



?>