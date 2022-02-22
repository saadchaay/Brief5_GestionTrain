<?php

    class Controller {

        public function model($model_class)
        {
            require_once '../app/models/'.$model_class.'.php' ;
            return new $model_class();
        }

        public function view($view_file, $data = [])
        {
            if(file_exists('../app/views/'.$view_file.'.php')) {
                require_once '../app/views/'.$view_file.'.php' ;
            } else {
                die("404 Page not found.") ;
            }
        }
    }