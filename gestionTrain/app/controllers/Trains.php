<?php

    class Trains extends Controller {

        public function __construct()
        {
            $this->trainModel = $this->model('Train');
        }

        public function send_data()
        {
            $data = [
                "id_train" => '',
                "type_train" => ''
            ];
            $trains = $this->trainModel->find_allTrain();
        }
        
    }