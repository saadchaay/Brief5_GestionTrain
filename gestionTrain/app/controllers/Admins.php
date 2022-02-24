<?php

    class Admins extends Controller{

        public function __construct()
        {
            $this->adminModel = $this->model('Admin');
        }
        
        public function login()
        {
            $data = [
                "titlePage" => 'Admin Login',
                'username' => '',
                'password' => '',
                "usernameError" => '',
                "passwordError" => ''
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING) ;
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'usernameError' => '',
                    'passwordError' => ''
                ];

                //validate username 
                if(empty($data['username'])){
                    $data['usernameError'] = "Please enter username." ;
                }

                // password validation
                if(empty($data['password'])){
                    $data['passwordError'] = "Please enter password." ;
                }

                //Make sure all the errors are empty
                if(empty($data['usernameError']) && empty($data['passwordError'])) {
                    // Login user the model
                    $loggedInAdmin = $this->adminModel->login($data['username'], $data['password']) ;
                    if($loggedInAdmin){
                        $this->createAdminSession($loggedInAdmin);
                    } else {
                        $data['passwordError'] = "Username or Password is incorrect, try again.";
                        $this->view('admins/login',$data);
                    }
                }
            } else {
                $data = [
                    'username' => '',
                    'password' => '',
                    "usernameError" => '',
                    "passwordError" => ''
                ];
            }
            if(!is_loggedIn()){
                $this->view('admins/login',$data);
            } else {
                header("location:". URLROOT ."/voyages/");
            }
        }

        public function createAdminSession($admin)
        {
            $_SESSION['admin_id'] = $admin->id_admin;
            $_SESSION['username'] = $admin->username;
            header('location:'.URLROOT.'/voyages/');
        }

        public function Logout()
        {
            unset($_SESSION['admin_id']);
            unset($_SESSION['username']);
            header('location:'.URLROOT.'/admins/login');
        }

        public function index()
        {
            $data = [
                "usernameError" => "",
                "passwordError" => ""
            ];
            if(!is_loggedIn()){
                $this->view('admins/login',$data);
            } else {
                header("location:". URLROOT ."/voyages/");
            }
        }

    }