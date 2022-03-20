<?php

use PHPMailer\PHPMailer\PHPMailer;


//CLASSE PER LA GESTIONE DELLA REGISTRAZIONE

class AuthSysReg extends AuthSys{

    private PHPMailer $mailer;


    public function __construct(PDO $PDOconn, PHPMailer $mailer){
        $this->PDO = $PDOconn;
        $this->mailer = $mailer;
        $this->Secure = new AuthSysSecure();
    }


    //gestione registrazione nuovo utente
    public function registraNuovoUtente(array $post): string {

        try{

            //SANIFICAZIONE
            $campiForm = ['username', 'password', 'cpassword', 'nome', 'email'];

            foreach($campiForm as $campo){
                $cleanPost[$campo] = $this->Secure->sanitizeInput($post[$campo]);
            }

            //CONTROLLO ESISTENZA USERNAME
            if($this->usernameExists($cleanPost['username'])) {
                return 'L\'username inserito esiste già!';
            }

            // CONTROLLO CORRETTAZZA CAMPI INSERITI
            $this->checkModules($cleanPost);

            // INSERIMENTO NEL DATABASE
            $pw_hash = password_hash($cleanPost['cpassword'], PASSWORD_DEFAULT);
            $token = bin2hex(random_bytes(32));

            //PREPARAZIONE EMAIL ATTIVAZIONE
            $id = $this->addUser($cleanPost, $pw_hash, $token);
            $dataEmail = ['id' => $id, 'token' => $token];
            $link = "http://localhost/Projects/auth_system/attivazione.php?".http_build_query($dataEmail);

            //INVIO EMAIL
            $this->invioEmailAttivazione($cleanPost['email'], $link);
        }
        catch(PDOException $exc){
            return 'Sembra esserci qualche problema, riprova più tardi.';
        }
        catch(Exception $e){
            return $e->getMessage();
        }


        return 'Sei stato registrato correttamente!';
    }


    //Controllo correttezza moduli
    private function checkModules(array $post): void {

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
    private function addUser(array $post, string $pw_hash, string $token): int {

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
    private function invioEmailAttivazione(string $toEmail, string $link): bool {
        $mailer = &$this->mailer;

        //Indica a PHPMailer di usare la sua classe SMTP per l'invio e non la funzione mail di PHP
        $mailer->isSMTP();
        //Per l'autenticazione SMTP con username e password
        $mailer->SMTPAuth = true;
        //Imposta il protocollo ssl
        $mailer->SMTPSecure = $mailer::ENCRYPTION_SMTPS;
        //Server smtp
        $mailer->Host = 'smtp.gmail.com';
        //Porta del server smtp
        $mailer->Port = 465;
        //il tipo di messaggio da inviare
        $mailer->isHTML(true);
        //Username e Password account gmail
        $mailer->Username = 'FromEmail';
        $mailer->Password = 'FromEmailPassword';
        //Setta l'email e il nome di chi la manda
        $mailer->setFrom('FromEmail', 'MySite');
        //A chi inviare l'email
        $mailer->AddAddress($toEmail);
        //Oggetto email
        $mailer->Subject = 'Attivazione account';
        //Corpo email
        $mailer->Body = "<h3>Conferma della registrazione dell'account</h3><p>Clicca sul seguente link per confermare l'account: <a href='$link'>conferma registrazione</a></p>";

        //Invio email
        if(!$mailer->send()){
            throw new Exception($mailer->ErrorInfo);
        }

        return TRUE;
    }


    //Conferma la registrazione attivando l'account
    public function confermaRegistrazione(int $id, string $token): bool {

        try{
            $query = 'SELECT id FROM Utenti WHERE id = :id AND token = :token';
            $st = $this->PDO->prepare($query);

            $st->bindParam(':id', $id, PDO::PARAM_INT);
            $st->bindParam(':token', $token, PDO::PARAM_STR);

            $st->execute();

            if($st->rowCount() == 0) return FALSE;

            $this->PDO->query("UPDATE Utenti SET active = 1 WHERE id = $id");

            return TRUE;
        }
        catch(PDOException $exc){
            return FALSE;
        }

    }


}

?>