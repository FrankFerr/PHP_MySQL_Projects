<?php
    class Admin
    {
        private $firstname;
        private $lastname;
        private $username;
        private $email;
        private $id;
        private $login = false;

        public function __construct(string $fn, string $ln, string $un, string $em, int $id)
        {
            $this->firstname = $fn;
            $this->lastname = $ln;
            $this->username = $un;
            $this->email = $em;
            $this->id = $id;
            $this->login = true;
        }

        public function getFirstname() { return $this->firstname; }
        public function getLastname() { return $this->lastname; }
        public function getUsername() { return $this->username; }
        public function getEmail() { return $this->email; }
        public function getId() { return $this->id; }
        public function getLogin() { return $this->login; }
        
        public function loguot() { $this->login = false; }
    }
?>