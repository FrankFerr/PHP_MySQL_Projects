<?php
    class Customer
    {
        private $firstname;
        private $lastname;
        private $username;
        private $email;
        private $id;
        private $user_active;
        private $userType;
        private $login = false;

        public function __construct(string $fn, string $ln, string $un, string $em, int $id, int $ua, string $ut)
        {
            $this->firstname = $fn;
            $this->lastname = $ln;
            $this->username = $un;
            $this->email = $em;
            $this->id = $id;
            $this->user_active = $ua;
            $this->userType = $ut;
            $this->login = true;
        }

        public function getFirstname() { return $this->firstname; }
        public function getLastname() { return $this->lastname; }
        public function getUsername() { return $this->username; }
        public function getEmail() { return $this->email; }
        public function getId() { return $this->id; }
        public function getUserActive() { return $this->user_active; }
        public function getUserType() { return $this->userType; }
        public function getLogin() { return $this->login; }
        
        public function loguot() { $this->login = false; }
    }
?>