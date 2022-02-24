<?php

    class Users extends Controller 
    {

        public function __construct()
        {
            $this->client = $this->model("Client");
            $this->user = $this->model("User");
        }
        
        public function register()
        {
            $data = [
                "page_title" => "Register",
                "fullName" => "",
                "email" => "",
                "phone" => "",
                "username" => "",
                "password" => "",
                "confirmPassword" => "",
                "fullNameError" => "",
                "phoneError" => "",
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'Errors' => ''
            ];
            

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    "page_title" => "Register",
                    "fullName" => $_POST['fullName'],
                    "email" => trim($_POST['email']),
                    "phone" => trim($_POST['phone']),
                    "username" => trim($_POST['username']),
                    "password" => trim($_POST['password']),
                    "confirmPassword" => trim($_POST['confirmPassword']),
                    "fullNameError" => "",
                    "phoneError" => "",
                    'usernameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => '',
                    'Errors' => ''
                ];

                $usernameValidation = "/^[a-zA-Z0-9]*$/";
                $fullNameValidation = "/^([a-zA-Z' ]+)$/";
                // $phoneValidation = "/^[0]{1}[5-8]{1}[0-9]{8}*$/";
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

                // check the inputs
                if (empty($data['username']) || empty($data["fullName"]) || 
                        empty($data["phone"]) || empty($data["password"]) || 
                            empty($data["confirmPassword"]) || empty($data["email"])) {
                    $data['Errors'] = 'Some field is empty, try again!';
                }

                //Validate username on letters/numbers
                if (!preg_match($usernameValidation, $data['username'])) {
                    $data['usernameError'] = 'Username can only contain letters and numbers.';
                } else {
                    //Check if username exists.
                    if ($this->client->findClientByUsername($data['username'])) {
                        $data['usernameError'] = 'Username is already taken.';
                    }
                }

                //Validate full name 
                if(!preg_match($fullNameValidation, $data["fullName"])){
                    $data["fullNameError"] = 'Full name can only contain letters.';
                }

                // validate phone
                // if (!preg_match($phoneValidation, $data['phone'])) {
                //     $data['phoneError'] = 'Check Phone format.';
                // }

                // Validate email 
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter the correct format.';
                } else {
                    //Check if email exists.
                    if ($this->user->findUserByEmail($data['email'])) {
                        $data['emailError'] = 'Email is already taken.';
                    }
                }

                if(strlen($data["password"]) < 8){
                    $data["passwordError"] = "Password must be at least 8 characters.";
                } elseif(preg_match($passwordValidation, $data["password"])){
                    $data["passwordError"] = "Password must be have at least one numeric value.";
                }

                // Make sure all errors are empty
                if (empty($data['usernameError']) && empty($data["fullNameError"]) && 
                        empty($data["phoneError"]) && empty($data["passwordError"]) && 
                            empty($data["confirmPasswordError"]) && empty($data["emailError"])) {
                    
                    // registration logic
                    if($this->user->register($data)){
                        $last = $this->user->getLastUser();
                        // hash password
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                        if($this->client->register($data, $last->id_user)){
                            header('location: ' . URLROOT . '/users/login');
                        } else {
                            die("Something is wrong, check the client model");
                        }
                    } else {
                        die("Something is wrong, check the user model");
                    }
                }
            } else {
                $this->view("/users/register", $data);
            }
        }

        public function login()
        {
            $data = [
                "page-title" => "Login",
                "username" => "",
                "password" => "",
                "Errors" => ""
            ];

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    "page-title" => "Login",
                    "username" => trim($_POST["username"]),
                    "password" => trim($_POST["password"]),
                    "Errors" => ""
                ];

                if(empty($data["username"]) || empty($data["password"])){
                    $data["Errors"] = 'Some field is empty, try again!';
                    $this->view("/users/login", $data);
                }

                if(empty($data["usernameError"]) && empty($data["passwordError"])){
                    $loggedUser = $this->client->login($data["username"], $data["password"]) ;
                    if($loggedUser){
                        $this->createUserSession($loggedUser);
                    } else {
                        $data["Errors"] = "Password or username is incorrect. Please try again.";
                        $this->view("/users/login", $data);
                    }
                }
            } else {
                $this->view("/users/login", $data);
            }
        }

        public function createUserSession($user)
        {
            $_SESSION['id_client'] = $user->id_client;
            $_SESSION['username'] = $user->username;
            header('location:'.URLROOT.'/pages/');
        }

        public function logout()
        {
            unset($_SESSION['id_client']);
            unset($_SESSION['username']);
            header('location:'.URLROOT.'/pages/');
        }
    }