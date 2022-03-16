<?php

class AuthSys
{
    private PDO $PDO;
    private PHPMailer\PHPMailer\PHPMailer $mail;

    public function __construct($PDOconn, $mail)
    {
        $this->PDO = $PDOconn;
        $this->mail = $mail;
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
    public function addUser($post, $pw_hash, $token): int {

        $query = "INSERT INTO Utenti(username, password, nome, email, token) VALUES (:username, :password, :nome, :email, :token)";
        $st = $this->PDO->prepare($query);

        $st->bindParam(':username', $post['username'], PDO::PARAM_STR);
        $st->bindParam(':password', $pw_hash, PDO::PARAM_STR);
        $st->bindParam(':nome', $post['nome'], PDO::PARAM_STR);
        $st->bindParam(':email', $post['email'], PDO::PARAM_STR);
        $st->bindParam(':token', $token, PDO::PARAM_STR);

        $st->execute();

        return $this->PDO->lastInsertId();
    }


    //Invio email attivazione
    public function invioEmailAttivazione($toEmail, $link){
        $mail = &$this->mail;

        //Indica a PHPMailer di usare la sua classe SMTP per l'invio e non la funzione mail di PHP
        $mail->isSMTP();
        //Per l'autenticazione SMTP con username e password
        $mail->SMTPAuth = true;
        //Imposta il protocollo ssl
        $mail->SMTPSecure = $mail::ENCRYPTION_SMTPS;
        //Server smtp
        $mail->Host = 'smtp.gmail.com';
        //Porta del server smtp
        $mail->Port = 465;
        //il tipo di messaggio da inviare
        $mail->isHTML(true);
        //Username e Password account gmail
        $mail->Username = 'ferrantefrancesco878@gmail.com';
        $mail->Password = 'kekko97gokart';
        //Setta l'email e il nome di chi la manda
        $mail->setFrom('ferrantefracnesco878@gmail.com', 'MySite');
        //A chi inviare l'email
        $mail->AddAddress($toEmail);
        //Oggetto email
        $mail->Subject = 'Attivazione account';
        //Corpo email
        $mail->Body = "<h3>Conferma della registrazione dell'account</h3><p>Clicca sul seguente link per confermare l'account: <a href='$link'>conferma registrazione</a></p>";

        //Invio email
        if(!$mail->send()){
            throw new Exception($mail->ErrorInfo);
        }

        return TRUE;
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

            //PREPARAZIONE EMAIL ATTIVAZIONE
            $id = $this->addUser($post, $pw_hash, $token);
            $dataEmail = ['id' => $id, 'token' => $token];
            $link = "http://localhost/Projects/auth_system/attivazione.php?".http_build_query($dataEmail);

            //INVIO EMAIL
            $this->invioEmailAttivazione($post['email'], $link);
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
    

    public function confermaRegistrazione($id, $token){
        try{
            $query = 'SELECT id FROM Utenti WHERE id = :id AND token = :token';
            $st = $this->PDO->prepare($query);

            $st->bindParam(':id', $id, PDO::PARAM_INT);
            $st->bindParam(':token', $token, PDO::PARAM_STR);

            if($st->rowCount() == 0) return FALSE;

            $this->PDO->query("UPDATE Utenti SET active = 1 WHERE id = $id");

            return TRUE;
        }
        catch(PDOException $exc){
            return FALSE;
        }
    }

    private function printArray($array){
        echo "<pre>".print_r($array, true)."</pre><br>";
    }
}



?>