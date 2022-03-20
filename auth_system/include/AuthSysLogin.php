<?php

//CLASSE PER LE GESTIONE DEL LOGIN/LOGOUT

class AuthSysLogin extends AuthSys{

    public function __construct(PDO $PDOconn){
        $this->PDO = $PDOconn;
        $this->Secure = new AuthSysSecure();
    }


    //Controllo login
    public function login(string $username, string $password): bool|string {

        try{
            //SANIFICAZIONE
            $username = $this->Secure->sanitizeInput($username, 'str');
            $password = $this->Secure->sanitizeInput($password, 'str');

            
            // Ricerca username ------------------------------------->
            $user = $this->usernameExists($username);

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


            //Pulizia vecchie sessioni attive --------------------------------->
            $this->PDO->query("DELETE FROM UtentiLoggati WHERE user_id = {$user['id']}");


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


    //Effettua il logout
    public function logout(): bool {
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
    public function utenteLoggato(): bool {
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