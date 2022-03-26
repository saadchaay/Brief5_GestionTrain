<?php

    class Pages extends Controller{

        public function __construct()
        {
            $this->booking = $this->model('Booking');
            $this->voyage = $this->model('Voyage');
            $this->user = $this->model('User');
            $this->train = $this->model('Train');
            $this->ticket = $this->model('Ticket');
        }

        public function index()
        {
            $this->view('pages/index');
        }

        public function booking()
        {
            $data = [
                "title_page" => "Booking",
                "return_way" => "",
                "departStation" => "",
                "arriveStation" => "",
                "departing" => "",
                "returning" => "",
                "places" => "",
                "results" => "",
                "archives" => "",
                "ids" => "",
                "trains" => "",
                "Errors" => ""
            ];
            
            print_r($data["Errors"]);
            
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    "title_page" => "Booking",
                    "return_way" => trim($_POST["book"]),
                    "departStation" => trim($_POST["departStation"]),
                    "arriveStation" => trim($_POST["arriveStation"]),
                    "departing" => trim($_POST["departTime"]),
                    "returning" => trim($_POST["arriveTime"]),
                    "places" => trim($_POST["places"]),
                    "results" => "",
                    "archives" => "",
                    "ids" => "",
                    "trains" => $this->train->find_allTrain(),
                    "Errors" => ""
                ];

                if(empty($data["departStation"]) || empty($data["arriveStation"]) || empty($data["departing"])){
                    $data["Errors"] = "Some field is empty, try again";
                }elseif($data["return_way"] === "Roundtrip"){
                        if(empty($data["returning"])){
                            $data["Errors"] = "Returning date is empty, try again!";
                        }elseif($data["returning"] < $data["departing"]){
                            $data["Errors"] = "Returning date can't be before departing date!";
                        }
                }elseif($data["departing"] < date("Y-m-d")){
                        $data["Errors"] = "Departing date can't be before today!";
                } 
                $data["archives"] = $this->voyage->find_join_voyage();

                $i = 0 ;
                $ids_voyage = array();
                foreach ($data["archives"] as $archive) {
                    if(($archive->date_VA == $data["departing"]) && ($archive->garre_depart == $data["departStation"]) && ($archive->garre_destination == $data["arriveStation"])){
                        $ids_voyage[$i] = $archive->id_voyage ;
                        $i++;
                    }
                }

                if(empty($data["Errors"])){
                    if($this->voyage->find_voyage_by_station($data["departStation"],$data["arriveStation"])){
                        $results = $this->voyage->find_voyage_by_station($data["departStation"],$data["arriveStation"]);
                        if(!empty($ids_voyage)){
                            for ($j=0; $j < count((array)$results); $j++) { 
                                for ($i=0; $i < count((array)$ids_voyage); $i++) { 
                                    if($results[$j]->id_voyage === $ids_voyage[$i]){
                                        unset($results[$j]);
                                    }
                                }
                            }
                        }
                        $data["results"] = $results;
                        $this->view('pages/booking', $data);
                    } else {
                        $data["Errors"] = "No trips available";
                        $this->view('pages/booking', $data);
                    } 
                }else {
                    $this->view('pages/booking', $data);
                }
            }
            else {
                $this->view('pages/booking', $data);
            }
        }

        public function results($id, $departing, $returning = "", $places)
        {
            $data = [
                "id_voyage" => $id,
                "retour" => 0,
                "departing" => $departing,
                "returning" => $returning,
                "bookingDate" => "",
                "passagers" => [], 
                "places" => $places,
                "client" => "",
                "Errors" => "",
                "Success" => "",
                "Ticket" => []
            ];
            
            $place_this_voyage = $this->voyage->join_VBT($data["id_voyage"]);

            if($place_this_voyage[0]->places - count($place_this_voyage) < $data["places"]) {
                $data["Errors"] = "All places have been reserved, there's no places more on the train.";
                $this->view("pages/booking", $data);
            } else {
                if(!($returning == "null")) {
                    $data["retour"] = 1;
                }
                if(is_logged_user())
                {
                    $user = $this->user->getUserById($_SESSION['id_fk_user']);
                    $data["client"] = $user;
                } else {
                    unset($data["client"]);
                }
                
                
                
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if(isset($_POST["addPassagers"]))
                    {
                        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                        
                        $passager = [
                            "fullName" => "",
                            "email" => "",
                            "phone" => ""
                        ];
    
                        //affecte passagers to data
                        for ($i=0; $i < $data["places"]; $i++) { 
                            if(empty($_POST["fullName".$i+1]) || empty($_POST["email".$i+1]) || empty($_POST["phone".$i+1]))
                            {
                                $data["Errors"] = "Some field is empty, Try Again!";
                            } else {
                                $passager = [
                                    "fullName" => trim($_POST["fullName".$i+1]),
                                    "email" => trim($_POST["email".$i+1]),
                                    "phone" => trim($_POST["phone".$i+1])
                                ];
                                array_push($data["passagers"], $passager);
                            }
                        }
    
                        //affecte date of booking
                        $data["bookingDate"] = date('Y-m-d H:i:s');
                        $success = 0 ;
                        if(empty($data["Errors"])){
                            if(!is_logged_user()){
                                for ($i=0; $i < $data["places"]; $i++) { 
                                    if($this->user->register($data["passagers"][$i])){
                                        $last_user = $this->user->getLastUser();
                                        if($this->booking->addBooking($data, $last_user->id_user)){
                                            $success = 1 ;
                                        }
                                    }
                                }
                            } else {
                                if($this->booking->addBooking($data, $_SESSION['id_fk_user'])){
                                    $success = 1 ;
                                }
                                for ($i=1; $i < $data["places"]; $i++) { 
                                    if($this->user->register($data["passagers"][$i])){
                                        $last_user = $this->user->getLastUser();
                                        if($this->booking->addBooking($data, $last_user->id_user)){
                                            $success = 1 ;
                                        }
                                    }
                                }
                            }
                        }
                        if(is_logged_user()){
                            if($success == 1) {
                                $booking = ($this->booking->get_last_insert_res($_SESSION["id_fk_user"]));
                                $ticket_info = [
                                    "ticketNum" => mt_rand(),
                                    "id_booking" => $booking->id_reserv,
                                    "id_user" => $_SESSION["id_fk_user"],
                                    "Success" => ""
                                ];
                                if($this->ticket->insert_ticket($ticket_info)){
                                    $_SESSION["Ticket"] = $ticket_info;
                                    header("location: ".URLROOT."/pages/ticket");
                                }
                            } else {
                                $data["Errors"] = "Your Booking failed";
                            }
                        } else {
                            $booking = ($this->booking->get_last_insert_resv());
                            $ticket_info = [
                                "ticketNum" => mt_rand(),
                                "id_booking" => $booking->id_reserv,
                                "id_user" => $booking->id_user_fk,
                                "Success" => ""
                            ];
                            if($this->ticket->insert_ticket($ticket_info)){
                                $_SESSION["Ticket"] = $ticket_info;
                                header("location: ".URLROOT."/pages/ticket");
                            } else {
                                $data["Errors"] = "Your Booking failed";
                            }
                        }
                        $this->view("pages/available-travels", $data);
                    } else {
                        $this->view("pages/available-travels", $data);
                    }
                } else {
                    $this->view("pages/available-travels", $data);
                }
            }
        }

        public function all_reservations()
        {
            $data = [
                "allRes" => $this->booking->get_reservations_by_id($_SESSION["id_fk_user"]),
                "res" => [],
                "Success" => ""
            ];

            $tmp_arr = [];
            
            for ($i=0; $i < count($data["allRes"]); $i++) { 
                $tmp_arr = $this->check_time($data["allRes"][$i]->id_reserv) ;
                array_push($data["res"], $tmp_arr);
            }
            if(is_logged_user()){
                $this->view("/pages/all-reservations", $data);
            } else {
                header("location:" .URLROOT. "/users/login");
            }
            return $data;
        }

        public function check_time($id_booking)
        {
            $status = [
                "booking" => $this->booking->get_reservation($id_booking),
                "status" => "",
                "Errors" => "",
            ];

            $date_now = date("Y-m-d");

            // convert time to minutes string
            $arr_time_now = explode(":", date("H:i"));
            $arr_time_now = ($arr_time_now[0]*60) + $arr_time_now[1];
            $arr_voyage_time = explode(":", $status["booking"]->heure_depart);
            $arr_voyage_time = ($arr_voyage_time[0]*60) + $arr_voyage_time[1];

            if($date_now > $status["booking"]->date_voyage){
                $status["Errors"] = "The date is expired" ;
                $status["status"] = "Expired" ;
            } elseif($date_now == $status["booking"]->date_voyage ){
                if($arr_time_now >= $arr_voyage_time){
                    $status["Errors"] = "The time is expired" ; 
                    $status["status"] = "Expired" ;
                }elseif(($arr_voyage_time - $arr_time_now) < 60){
                    $status["Errors"] = "The depart of train soon, can't cancel the trip now!" ;
                    $status["status"] = "Depart Soon" ;
                } else {
                    $status["status"] = "Pending" ;
                }
            } else {
                $status["status"] = "Pending" ;
            }

            return $status;
        }

        public function cancel_reservation($id_booking)
        {
            $data = [
                "voyage" => $id_booking,
                "Success" => ""
            ];

            if($this->booking->delete_Res($data["voyage"])){
                $data["Success"] = "Your trip has been canceled successfully.";
                header("location:" .URLROOT. "/pages/all_reservations");
            }
        }

        public function ticket()
        {
            if(!empty($_SESSION["Ticket"])){
                $last_ticket = $this->ticket->get_last_ticket();
                $data = [
                    "voyage" => $this->booking->get_reservation($last_ticket->id_reserv_fk),
                    "ticket_details" => $_SESSION["Ticket"],
                    "ticketNum" => "",
                    "Success" => "Your Booking Has Been Successfully.",
                    "Errors" => ""
                ];
                $this->view("/pages/ticket", $data);
            } else {
                $data = [
                    "voyage" => "",
                    "ticket_details" => "",
                    "ticketNum" => "",
                    "Success" => "",
                    "Errors" => "" 
                ];
            }

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data["Success"] = "";
                $data["ticketNum"] = trim($_POST["ticketNum"]);

                if(empty($data["ticketNum"])){
                    $data["Errors"] = "Please Enter Your Ticket Number!";
                } elseif(strlen($data["ticketNum"]) < 7 ){
                    $data["Errors"] = "Please the ticket number must be at least 8 number!";
                }

                if(!empty($data["Errors"])){
                    if($this->ticket->get_ticket($data["ticketNum"])){
                        $data["ticket_details"] = $this->ticket->get_ticket($data["ticketNum"]);
                    }
                }
            }
            
            $_SESSION["Ticket"] = [];
            unset($_SESSION["Ticket"]);
            $this->view("/pages/ticket", $data);
        }
    }