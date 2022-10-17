<?php

require_once "./apps/views/MovieView.php";
require_once "./apps/views/MainView.php";
require_once "./apps/models/MovieModel.php";
require_once "./apps/models/GenModel.php";

class Controller{
    protected $movieModel;
    protected $movieView;
    protected $mainView;
    
    function __construct(){
        $this->movieModel = new movieModel();
        $this->genModel = new GenModel();
        $this->mainView = new MainView($this->isLogged());
        $this->movieView = new MovieView($this->isLogged());
    }

    protected function isLogged(){
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        return isset($_SESSION['IS_LOGGED']);
    }   

    protected function formErrorMsg(){
        return "Formulario Incompleto";
    }
}