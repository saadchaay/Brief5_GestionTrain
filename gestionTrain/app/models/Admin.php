<?php

    class Admin {
        private $db ;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function login($username, $password)
        {
            $this->db->query("SELECT * FROM admins WHERE username = :username");
            $this->db->bind(':username', $username);
            if($this->db->single()){
                $admin = $this->db->single();
                $hashedPassword = $admin->password;
                if(password_verify($password, $hashedPassword)){
                    return $admin;
                }else {
                    return false ;
                }
            }
        }

        public function index($data)
        {
            
        }

        public function getCountAll()
        {
            $this->db->query("SELECT * FROM voyages");
            $this->db->execute();
            $count = $this->db->rowCount();
        }
    }