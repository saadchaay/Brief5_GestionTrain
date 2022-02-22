<?php

    session_start();
    function is_loggedIn(){
        if(isset($_SESSION['admin_id'])){
            return true;
        } else {
            return false ;
        }
    }