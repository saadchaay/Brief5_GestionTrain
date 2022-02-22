<?php

    class Train {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function find_allTrain()
        {
            $this->db->query("SELECT * FROM trains");
            $result = $this->db->resultSet();
            return $result ;
        }

        public function find_train_by_ID($id)
        {
            $this->db->query("SELECT * FROM trains WHERE id_train = :ID");
            $this->db->bind(":ID",$id);
            $train = $this->db->single();
            return $train ;
        }

        public function countTrain(){
            $this->db->query("SELECT * FROM trains");
            $this->db->execute();
            $count = $this->db->rowCount();
            return $count;
        }
    }