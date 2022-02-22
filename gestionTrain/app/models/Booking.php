<?php
    class Booking {
        private $db;

        public function __construct()
        {
            $this->db = new DATABASE();
        }

        public function countBooking()
        {
            $this->db->query("SELECT * FROM reservations");
            $this->db->execute();
            return $this->db->rowCount();
        }
    }