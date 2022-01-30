<?php
/**
 * App Core Class
 * 
 */

 class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $parameters = [];

    public function __construct(){
        // print_r($this->getUrl());
        $url = $this->getUrl();

        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            // If exists, set as controller in current controller
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        //requiere controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        //instance controller class
        $this->currentController = new $this->currentController;

        //check second part of url
        if(isset($url[1])){
            //check if method exists
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //get params
        $this->parameters = $url ? array_values($url) : [];
        
        //call a callback with array of parameters
        call_user_func_array([$this->currentController, $this->currentMethod], $this->parameters);

    }

    public function getUrl(){
        if( isset($_GET['url'])){
            $url = rtrim( $_GET['url'],'/');
            $url = filter_var( $url, FILTER_SANITIZE_URL);
            $url = explode( '/', $url);
            return $url;
        }
    }
 }
 