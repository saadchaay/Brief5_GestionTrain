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

        public function jointure_user_client($id)
        {
            $this->db->query("SELECT * FROM users INNER JOIN clients WHERE `users`.id_user = `clients`.id_user_fk AND `users`.id_user = :id");
            $this->db->bind(":id", $id);
            if($this->db->execute()) {
                return $this->db->single();
            } else {
                return false;
            }
        }
        
        public function Check_join_users_clients_exists($id, $email, $username)
        {
            $this->db->query("SELECT * FROM users INNER JOIN clients WHERE `users`.id_user = `clients`.id_user_fk AND `users`.id_user NOT IN (SELECT id_user FROM users WHERE id_user = :id)");
            $this->db->bind(":id", $id);
            $results = $this->db->execute();
            $tmp = 0;
            if($this->db->rowCount() > 1){
                if($results["email"] == $email || $results["username"] == $username){
                    $tmp = 1;
                }
            }
            
            if($tmp == 0){
                return false ;
            } else {
                return true;
            }
        }

        public function updateClient($data, $id)
        {
            $this->db->query("UPDATE `clients` SET `username`= :username, `password`= :password WHERE `id_user_fk` = :id" );
            $this->db->bind(":username" , $data["username"]);
            $this->db->bind(":password" , $data["newPassword"]);
            $this->db->bind(":id" , $id);
            if($this->db->execute()){
                return true;
            } else {
                return false ;
            }
        }
    }