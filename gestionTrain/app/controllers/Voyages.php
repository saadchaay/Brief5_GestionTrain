<?php

    class Voyages extends Controller {

        public function __construct()
        {
            $this->voyage = $this->model('Voyage');
            $this->train = $this->model('Train');
            $this->booking = $this->model('Booking');
            $this->client = $this->model('Client');
        }

        public function voyage()
        {
            $trains = $this->train->find_allTrain();
            $voyages = $this->voyage->getAllVoyages();

            $data = [
                "page-name" => 'Voyages',
                'trains' => $trains,
                'voyages' => $voyages,
                'departStation' => '',
                'arriveStation' => '',
                'departTime' => '',
                'arriveTime' => '',
                'train' => '',
                'Errors' => '',
                'Success' => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    "page-name" => 'Voyages',
                    'trains' => $trains,
                    'voyages' => $voyages,
                    'departStation' => trim($_POST['departStation']),
                    'arriveStation' => trim($_POST['arriveStation']),
                    'departTime' => trim($_POST['departTime']),
                    'arriveTime' => trim($_POST['arriveTime']),
                    'train' => trim($_POST['train']),
                    'Errors' => '',
                    'Success' => ''
                ];

                if(empty($data['departStation'] && $data['arriveStation'] && 
                    $data['departTime'] && $data['arriveTime'] && $data['train'])){

                    $data['Errors'] = "Something is empty, try again!";
                    
                } elseif($data['departTime'] >= $data['arriveTime']) {
                    $data["Errors"] = "Error timing, fix arrive time!";
                } else{
                    if($data['departStation'] == $data['arriveStation']) {
                        $data['Errors'] = "Ops, the cities are match!";
                    } else {
                        if($this->voyage->addVoyages($data)){
                            $data['Success'] = "Your voyage has been add successfully.";
                            header("Location: " . URLROOT . "/voyages/voyage");
                        } else {
                            die("something is wrong.");
                        }
                    }
                }
            }

            if(is_loggedIn()){
                $this->view('voyages/voyage',$data);
            } else {
                header("location:". URLROOT ."/admins/login");
            }
        }

        public function index()
        {
            $countTrain = $this->train->countTrain();
            $countVoyage = $this->voyage->countVoyage();
            $countBooking = $this->booking->countBooking();
            $countClient = $this->client->countClient();
            $data = [
                "page-name" => 'Dashborad',
                "allVoyages" => $countVoyage,
                "reservation" => $countBooking,
                "trains" => $countTrain,
                "clients" => $countClient
            ];
            if(is_loggedIn()){
                $this->view('voyages/index',$data);
            } else {
                header("location:". URLROOT ."/admins/login");
            }
        }

        public function cancel($id)
        {
            $voyage = $this->voyage->find_voyage($id);
            $data = [
                'page-name' => 'Cancel voyage',
                'voyage' => $voyage,
                "dateArchive" =>"",
                "Error" => "",
                "Success" => ""
            ];

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    "page-name" => "Cancel voyage",
                    "voyage" => $voyage,
                    "dateArchive" =>trim($_POST["dateArchive"]),
                    "Error" => "",
                    "Success" => ""
                ];

                if(empty($data["dateArchive"])){
                    $data["Error"] = "Date field is empty, try again!" ;
                } elseif($this->voyage->is_dateExists($id,$data["dateArchive"])){
                    $data["Error"] = "This date is already exists!" ;
                } else {
                    if($this->voyage->canceled_voyage($id,$data["dateArchive"])){
                        $data["Success"] = "Voyage has been archived successfully.";
                        header("Location: " . URLROOT . "/voyages/voyage");
                    } else {
                        die("something is wrong.");
                    }
                }

            }
            if(is_loggedIn()){
                $this->view('voyages/cancel',$data);
            } else {
                header("location:". URLROOT ."/admins/login");
            }
        }

        public function archive()
        {
            $voyages = $this->voyage->getAllVoyages();
            $archives = $this->voyage->getArchiveVoyage();

            $data = [
                "page-name" => "Archive des voyages",
                "voyages" =>$voyages,
                "archives" =>$archives
            ];

            if(is_loggedIn()){
                $this->view('voyages/archive',$data);
            } else {
                header("location:". URLROOT ."/admins/login");
            }
        }
        
        public function deleteArchive($id)
        {
            if($this->voyage->deleteArchive($id)) {
                header("location:". URLROOT ."/voyages/archive");
            }else {
                die("something is wrong!");
            }
        }
    }