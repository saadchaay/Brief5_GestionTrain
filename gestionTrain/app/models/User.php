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

            /* $this->db->query("SELECT * FROM users");
            $results = $this->db->resultSet();
            foreach ($results as $row) {
                if($row["email"] === $email){
                    $check = true;
                    break;
                } else {
                    $check = false ;
                }
            }
            return $check; */
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

    }