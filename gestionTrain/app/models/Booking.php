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

        public function addBooking($data, $id_user)
        {
            $this->db->query("INSERT INTO `reservations` VALUES ('',:retour,:departing,:returning,:bookingDate,:id_voyage,:id_user)");
            
            $this->db->bind(":retour",$data["retour"]);
            $this->db->bind(":departing",$data["departing"]);
            $this->db->bind(":returning",$data["returning"]);
            $this->db->bind(":bookingDate",$data["bookingDate"]);
            $this->db->bind(":id_voyage",$data["id_voyage"]);
            $this->db->bind(":id_user",$id_user);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function countBookingByVoyage($id_voyage)
        {
            $this->db->query("SELECT * FROM reservations WHERE id_voyage_fk = :id");
            $this->db->bind(":id", $id_voyage);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function get_reservations_by_id($id_user)
        {
            $this->db->query("SELECT * FROM reservations INNER JOIN voyages INNER JOIN trains WHERE `reservations`.`id_voyage_fk` = `voyages`.id_voyage AND `trains`.`id_train` = `voyages`.`id_train_fk` AND `reservations`.`id_user_fk` = :id ORDER BY `reservations`.`id_reserv` DESC");
            $this->db->bind(":id", $id_user);
            if($this->db->execute()) {
                return $this->db->resultSet();
            } else {
                return false;
            }
        }

        public function get_reservation($id)
        {
            $this->db->query("SELECT * FROM reservations INNER JOIN voyages WHERE `reservations`.`id_voyage_fk` = `voyages`.id_voyage AND `reservations`.`id_reserv` = :id");
            $this->db->bind(":id", $id);
            if($this->db->execute()) {
                return $this->db->single();
            } else {
                return false;
            }
        }

        public function delete_Res($id)
        {
            $this->db->query("DELETE FROM `reservations` WHERE `reservations`.`id_reserv` = :id");
            $this->db->bind(":id", $id);
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function get_last_insert_res($id_user)
        {
            $this->db->query("SELECT id_reserv FROM reservations WHERE id_user_fk = :id ORDER BY id_reserv DESC LIMIT 1");
            $this->db->bind(":id", $id_user);
            if($this->db->execute()){
                return $this->db->single();
            } else {
                return false;
            }
        }

        public function get_last_insert_resv()
        {
            $this->db->query("SELECT * FROM reservations ORDER BY id_reserv DESC LIMIT 1");
            if($this->db->execute()){
                return $this->db->single();
            } else {
                return false;
            }
        }
    }