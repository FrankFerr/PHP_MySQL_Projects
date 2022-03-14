<?php

class AuthSys
{
    private PDO $PDO;


    public function __construct($PDOconn)
    {
        $this->PDO = $PDOconn;
    }


    public function registraNuovoUtente($post) {

        /* CONTROLLI
         * [ok] -> username solo numeri e lettere, da 8 a 12 caratteri, non sia già presente
         * [ok] -> password lettere, numeri e alcuni caratteri speciali, minimo 8 caratteri
         * [ok] -> password e conferma devono coincidere
         * [ok] -> email valida
         * [ok] -> nome più di 3 caratteri
        */

        $username = trim($post['username']);
        $password = trim($post['password']);
        $cpassword = trim($post['cpassword']);
        $email = trim($post['email']);
        $nome = trim($post['nome']);


        // USERNAME ---------------------------------------------------------->
        if( !(ctype_alnum($username) && mb_strlen($username) >= 8 && mb_strlen($username) <= 15) ){
            throw new Exception('Username non valida');
        }

        try{
            $query = 'SELECT * FROM Utenti WHERE username = :username';
            $st = $this->PDO->prepare($query);
            
            $st->bindParam(':username', $username, PDO::PARAM_STR);
            $st->execute();
        }
        catch(PDOException $exc){
            echo 'Errore controllo username nel db';
        }

        if($st->rowCount() > 0){
            throw new Exception('Username già presente');
        }


        // PASSWORD ---------------------------------------------------------->
        if(!preg_match("/^[a-zA-Z0-9!\$#-@_]{8,14}$/", $password)){
            throw new Exception('Password non valida');
        }


        // CONFERMA PASSWORD ------------------------------------------------->
        if(strcmp($password, $cpassword) !== 0){
            throw new Exception('Le password inserite sono diverse');
        }


        // EMAIL ------------------------------------------------------------>
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('Email non valida!');
        }


        // NOME ------------------------------------------------------------->
        if(mb_strlen($nome) < 3){
            throw new Exception('Nome inserito non valido!');
        }


        // INSERIMENTO NEL DATABASE ------------------------------------------>
        try{
            $pw_hash = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO Utenti(username, password, nome, email) VALUES (:username, :password, :nome, :email)";
            $st = $this->PDO->prepare($query);

            $st->bindParam(':username', $username, PDO::PARAM_STR);
            $st->bindParam(':password', $pw_hash, PDO::PARAM_STR);
            $st->bindParam(':nome', $nome, PDO::PARAM_STR);
            $st->bindParam(':email', $email, PDO::PARAM_STR);

            $st->execute();
        }
        catch(PDOException $exc){
            echo 'Errore inserimenton nuovo utente';
        }

        return TRUE;

    }

    public function login(string $username, string $password) {

        // CONTROLLO REGISTRAZIONE ------------------------------------->
        try{
            $query = "SELECT * FROM Utenti WHERE username = :username";
            $st = $this->PDO->prepare($query);

            $st->bindParam(':username', $username, PDO::PARAM_STR);
            $st->execute();
        }
        catch(PDOException $exc){
            echo "Errore 'CONTROLLO REGISTRAZIONE' in {$exc->getFile()}, riga {$exc->getLine()}";
        }

        if($st->rowCount() === 0){
            throw new Exception('Username o Password errati!');
        }


        // CONTROLLO PASSWORD ------------------------------------------------>
        $user = $st->fetch(PDO::FETCH_ASSOC);

        if(!password_verify($password, $user['password'])){
            throw new Exception('Username o Password errati!');
        }


        // INSERIMENTO IN UtentiLoggati -------------------------------------->
        $sessionId = session_id();

        try{
            $query = "INSERT INTO UtentiLoggati(session_id, user_id) VALUES (:session, :id)";
            $st = $this->PDO->prepare($query);

            $st->bindParam(':session', $sessionId, PDO::PARAM_STR);
            $st->bindParam(':id', $user['id'], PDO::PARAM_INT);

            $st->execute();
        }
        catch(PDOException $exc){
            echo "Errore 'INSERIMENTO IN UtentiLoggati' in {$exc->getFile()}, riga {$exc->getLine()}";
        }

        return TRUE;

    }

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
    
}



?>