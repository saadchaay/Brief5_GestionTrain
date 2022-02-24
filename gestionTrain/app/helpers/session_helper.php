<?php

    session_start();
    
    function is_loggedIn(){
        if(isset($_SESSION['admin_id'])){
            return true;
        } else {
            return false ;
        }
    }

    function is_logged_user()
    {
        if(isset($_SESSION['id_client'])){
            return true;
        } else {
            return false ;
        }
    }