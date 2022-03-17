<?php

    class User {
        private $db ;

        public function __construct()
        {
            $this->db = new DATABASE();
        }

        public function findUserByEmail($email)
        {
            $this->db->query("SELECT * FROM users WHERE email = :email");
            $this->db->bind(":email", $email);
            $this->db->execute();
            if($this->db->rowCount() > 0){
                return true ;
            } else {
                return false ;
            }
        }

        public function getLastUser()
        {
            $this->db->query("SELECT id_user FROM users ORDER BY id_user DESC LIMIT 1");
            $this->db->execute();
            return $this->db->single();
            
        }

        public function register($data)
        {
            $this->db->query("INSERT INTO `users`(`full_name`, `email`, `telephone`) VALUES (:fullName, :email, :phone)");
            $this->db->bind(":fullName", $data["fullName"]);
            $this->db->bind(":email", $data["email"]);
            $this->db->bind(":phone", $data["phone"]);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getUserById($ID)
        {
            $this->db->query("SELECT * FROM users WHERE id_user = :id_user");
            $this->db->bind(":id_user", $ID);
            $this->db->execute();
            return $this->db->single();
        }

        public function updateUser($data, $id)
        {
            $this->db->query("UPDATE `users` SET `full_name`= :fullName, `email`= :email, `telephone` = :phone WHERE `id_user` = :id");
            $this->db->bind(":fullName" , $data["fullName"]);
            $this->db->bind(":email" , $data["email"]);
            $this->db->bind(":phone" , $data["phone"]);
            $this->db->bind(":id" , $id);
            if($this->db->execute()){
                return true;
            } else {
                return false ;
            }
        }
    }