<?php

    class Database {
        private $db_host = DB_HOST;
        private $db_user = DB_USER;
        private $db_pass = DB_PASS;
        private $db_name = DB_NAME;

        private $statement;
        private $handler;
        private $error;

        public function __construct() 
        {
            $conn = 'mysql:host='.$this->db_host.';dbname='.$this->db_name ;
            try {
                $this->handler = new PDO($conn, $this->db_user, $this->db_pass);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error ;
            }
        }

        public function query($rqt) 
        {
            $this->statement = $this->handler->prepare($rqt) ;
        }

        public function bind($param, $value, $type = null) 
        {
            switch (is_null($type)) {
                case is_int($value):
                    $type = PDO::PARAM_INT ;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL ;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL ;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
            $this->statement->bindValue($param,$value,$type);
        }

        public function execute() 
        {
            return $this->statement->execute();
        }

        public function resultSet() 
        {
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        public function single() 
        {
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        public function rowCount() 
        {
            return $this->statement->rowCount();
        }

    }