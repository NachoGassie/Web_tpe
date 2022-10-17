<?php

require_once "MainController.php";
require_once "./apps/views/GenView.php";
require_once "./apps/models/GenModel.php";

class GenController extends Controller{
    private $genView;
    protected $genModel;

    function __construct() {
        parent::__construct();
        $this->genModel = new genModel();
        $this->genView = new GenView($this->isLogged());
    }

    //Show
    function showGeneros($genUpdate = null){
        $generos = $this->genModel->getGeneros();
        $this->genView->showGenList($generos, $genUpdate);
    }
    function showUpdateGen($id){
        if ($this->isLogged()){
            $genUpdate = $this->genModel->getGeneroId($id);
            $this->showGeneros($genUpdate);
        }else{
            header("Location: ".BASE_URL); 
        }
    }
    function showMovieByGen($idGen){
        $peliculas = $this->movieModel->getPeliculaGen($idGen);
        if (!empty($peliculas)) {
            //ACA
            $this->movieView->showMovieGen($peliculas);
        }else{
            $this->mainView->showError("Aún no hay peliculas con ese Genero", "genreList");
        }
    }
    //ABM
    function createGenero(){
        if ($this->isLogged()){
            $genero = $_POST["newGen"];
            if (!empty($genero)) {
                $this->genModel->insertGenero($genero);
                header("Location: ".BASE_URL. "genreList"); 
            }else{ 
                $this->mainView->showError($this->formErrorMsg(), "genreList");
            }
        }else{
            header("Location: ".BASE_URL. "genreList");
        }
    }
    function updateGen(){
        if ($this->isLogged()) {
            $genero = $_POST["newGen"]; $id = $_POST["id"]; 
            if (!empty($genero) && !empty($id)){
                $this->genModel->updateGenero($genero, $id);
                header("Location: ".BASE_URL. "genreList"); 
            }else{
                $this->mainView->showError($this->formErrorMsg(), "showUpdateGen/$id"); 
            }
        }else{
            header("Location: ".BASE_URL. "genreList");
        }
    }
    function deleteGenero($id){
        try {
            if ($this->isLogged()){
                $this->genModel->deleteGenero($id);
                header("Location: ".BASE_URL. "genreList"); 
            }else{
                header("Location: ".BASE_URL. "genreList");
            } 
        }catch (Exception) {
            $this->mainView->showError("No puede eliminarse un genero perteneciente a una pelicula", "genreList"); 
        }
    }
}