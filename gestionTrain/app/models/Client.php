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
    }