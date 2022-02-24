<?php
    class Client {
        private $db;

        public function __construct()
        {
            $this->db = new DATABASE();
        }

        public function countClient()
        {
            $this->db->query("SELECT * FROM clients");
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function findClientByUsername($username)
        {
            $this->db->query("SELECT * FROM clients WHERE username = :username");
            $this->db->bind(":username", $username);
            $this->db->execute();

            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        public function register($data, $id_user)
        {
            $this->db->query("INSERT INTO `clients`(`username`, `password`, `id_user_fk`) VALUES (:username, :password, :id_user)");
            $this->db->bind(":username", $data["username"]);
            $this->db->bind(":password", $data["password"]);
            $this->db->bind(":id_user", $id_user);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function login($username, $password)
        {
            $this->db->query("SELECT * FROM clients WHERE username = :username");
            $this->db->bind(":username", $username);
            $this->db->execute();
            if($this->db->rowCount() > 0) {
                $result = $this->db->single();
                $hashedPassword = $result->password ;
                if(password_verify($password, $hashedPassword)){
                    return $result;
                } else {
                    return false;
                }   
            } else {
                return false ;
            }
        }
    }