<?php

    class Pages extends Controller{

        public function __construct()
        {
            $this->adminModel = $this->model('Admin');
        }

        public function index()
        {
            $this->view('pages/index');
        }
        public function login_admin()
        {
            $this->view('admins/login');
        }
        public function dashboard()
        {
            $this->view('pages/dashboard');
        }

        public function booking()
        {
            $this->view('pages/booking');
        }
    }