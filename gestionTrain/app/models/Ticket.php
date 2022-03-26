<?php
    class Ticket {

        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function insert_ticket($data)
        {
            $this->db->query("INSERT INTO `tickets` VALUES ('',:ticket_num, :id_booking, :id_user)");
            $this->db->bind(":ticket_num", $data["ticketNum"]);
            $this->db->bind(":id_booking", $data["id_booking"]);
            $this->db->bind(":id_user", $data["id_user"]);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function get_ticket($ticket_num)
        {
            $this->db->query("SELECT * FROM `tickets` WHERE nm_ticket = :ticket");
            $this->db->bind(":ticket", $ticket_num);
            if($this->db->execute()){
                return $this->db->single();
            } else {
                return false;
            }
        }

        public function get_last_ticket()
        {
            $this->db->query("SELECT * FROM `tickets` ORDER BY id_ticket DESC LIMIT 1");
            if($this->db->execute()){
                return $this->db->single();
            } else {
                return false;
            }
        }



    }

?>