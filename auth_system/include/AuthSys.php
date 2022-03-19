<?php

//CLASSE ASTRATTA GESTIONE AUTENTICAZIONE

abstract class AuthSys{

    protected PDO $PDO;
    protected AuthSysSecure $Secure = new AuthSysSecure();


    //Controllo esistenza username
    protected function usernameExists(string $username): array|bool {
        $query = 'SELECT * FROM Utenti WHERE username = :username';
        $st = $this->PDO->prepare($query);

        $st->bindParam(':username', $username, PDO::PARAM_STR);
        $st->execute();

        if($st->rowCount() > 0){
            return $st->fetch(PDO::FETCH_ASSOC);
        }

        return FALSE;
    }

}



?>