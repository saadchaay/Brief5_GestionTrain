<?php

    class Voyage {
        private $db ;

        public function __construct(Type $var = null)
        {
            $this->db = new Database();
        }

        public function getAllVoyages()
        {
            $this->db->query("SELECT * FROM voyages ORDER BY id_voyage ASC");
            $result = $this->db->resultSet();
            return $result ;
        }

        public function countVoyages()
        {
            $this->db->query("SELECT * FROM voyages");
            $this->db->execute();
            $count = $this->db->rowCount();
            return $count ;
        }
        
        public function addVoyages($data)
        {
            $this->db->query("INSERT INTO `voyages`(`garre_depart`, `garre_destination`, `heure_depart`, `heure_destination`, `id_train_fk`) 
                                VALUES(:depart, :arrive, :depart_time, :arrive_time , :id_train)");
            
            $this->db->bind(':depart', $data['departStation']);
            $this->db->bind(':arrive', $data['arriveStation']);
            $this->db->bind(':depart_time', $data['departTime']);
            $this->db->bind(':arrive_time', $data['arriveTime']);
            $this->db->bind(':id_train', $data['train']);
            
            if($this->db->execute()){
                return true ;
            } else {
                return false ;
            }
        }

        public function find_voyage($id_voyage)
        {
            $this->db->query("SELECT * FROM voyages WHERE id_voyage = :ID");

            $this->db->bind(':ID', $id_voyage);
            
            $voyage = $this->db->single();
            
            return $voyage ;
        }

        public function update_voyage($data)
        {
            $this->db->query("UPDATE voyage SET 
                `garre_depart`= :depart,
                `garre_destination`= :arrive,
                `heure_depart`= :depart_time,
                `heure_destination`= :arrive_time,
            ");

            $this->db->bind(':depart', $data['depart_station']);
            $this->db->bind(':arrive', $data['arrive_station']);
            $this->db->bind(':depart_time', $data['depart_time']);
            $this->db->bind(':arrive_time', $data['arrive_time']);
            $this->db->bind(':status', $data['status']);

            if($this->db->execute()){
                return true ;
            } else {
                return false ;
            }

        }

        public function canceled_voyage($id_v, $date_canceled)
        {
            $this->db->query("INSERT INTO `voyages_annule`(`id_VA`, `date_VA`, `id_voyage_fk`) VALUES ('', :date_canceled, :ID_V)");
            $this->db->bind(':date_canceled', $date_canceled);
            $this->db->bind(':ID_V', $id_v);
            
            if($this->db->execute()){
                return true ;
            } else {
                return false ;
            }
        }

        public function getArchiveVoyage()
        {
            $this->db->query("SELECT * FROM `voyages_annule`");
            $result = $this->db->resultSet();
            return $result ;
        }

        public function countVoyage(Type $var = null)
        {
            $this->db->query("SELECT * FROM voyages");
            $this->db->execute();
            $count = $this->db->rowCount();
            return $count;
        }

        public function getNameTrain($id_train_fk)
        {
            $this->db->query("SELECT * FROM trains,voyages WHERE `voyages`.id_train_fk = `trains`.`id_train` AND `voyages`.`id_train_fk` = :ID");
            $this->db->bind("ID", $id_train_fk);
            $this->db->execute();
            return $this->db->single();
        }

        public function is_dateExists($date)
        {
            $this->db->query("SELECT * FROM voyages_annule");
            $this->db->execute();
            $archives = $this->db->resultSet();
            for ($i=0; $i < count($archives); $i++) { 
                $result = ($archives[$i]->date_VA == $date)?true:false ;
            }
            return $result ;
        }
        
        public function deleteArchive($id)
        {
            $this->db->query("DELETE FROM `voyages_annule` WHERE id_VA = :id");
            $this->db->bind(":id", $id);
            if($this->db->execute()){
                return true;
            } else {
                return false ;
            }
        }
    }