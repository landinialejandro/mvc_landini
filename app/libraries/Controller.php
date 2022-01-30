<?php
//* base controller
//* load models and views

class Controller {
    //load model
    public function model($model){
        // requiere file model
        require_once "../app/models/{$model}.php";

        // instance model
        return new $model();
    }

    //load view
    public function view ($view, $data = []){

        if (file_exists( "../app/views/{$view}.php")){
            require_once "../app/views/{$view}.php";
        }else{
            die("* {$view} view does not exist");
        }

    }
}