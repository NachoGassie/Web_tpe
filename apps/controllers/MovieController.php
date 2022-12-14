<?php

require_once "MainController.php";

class MovieController extends Controller{

    //Show
    function showHome(){
        $peliculas = $this->movieModel->getPeliculas();
        $this->movieView->showHome($peliculas);
    }
    function showPelibyId($id){
        $peli = $this->movieModel->getPeliculaId($id);
        $this->movieView->showMovieId($peli);
    }
    function showForm($peli = null){
        if ($this->isLogged()){
            $generos = $this->genModel->getGeneros();
            $this->movieView->showForm($generos, $peli);
        }else{
            header("Location: ".BASE_URL); 
        }
    }
    function showFormUpdate($id){
        if ($this->isLogged()){
            $peli = $this->movieModel->getPeliculaId($id);
            $this->showForm($peli);
        }else{
            header("Location: ".BASE_URL); 
        }
    }

    //ABM
    function createMovie(){
        if ($this->isLogged()){

            $title = $_POST["title"];  $poster = $this->checkPoster($_FILES['poster']['type']);
            $sinopsis = $_POST["sinopsis"]; $añoEstreno = $_POST["añoEstreno"]; $genero = $_POST["genero"];

            if ($this->checkFields($title, $sinopsis, $añoEstreno, $genero)) {
                $this->movieModel->insertMovie($title, $poster, $sinopsis, $añoEstreno, $genero);
                header("Location: ".BASE_URL); 
            }else{ 
                $this->mainView->showError($this->formErrorMsg(), "showForm"); 
            }
        }else{ 
            header("Location: ".BASE_URL); 
        }
    }
    function updateMovie(){
        if ($this->isLogged()) {

            $title = $_POST["title"]; $poster = $this->checkPoster($_FILES['poster']['type']);
            $sinopsis = $_POST["sinopsis"]; $añoEstreno = $_POST["añoEstreno"]; 
            $genero = $_POST["genero"]; $id = $_POST["id"];

            if ($this->checkFields($title, $sinopsis, $añoEstreno, $genero, $id)){
                $this->movieModel->updateMovie($title, $poster, $sinopsis, $añoEstreno, $genero, $id);
                header("Location: ".BASE_URL); 
            }else{ 
                $this->mainView->showError($this->formErrorMsg(), "showForm/$id"); 
            }
        }else{ 
            header("Location: ".BASE_URL); 
        }
    }
    function deleteMovie($id){
        if ($this->isLogged()) {
            $this->movieModel->deleteMovie($id);
            header("Location: ".BASE_URL); 
        }else{
            header("Location: ".BASE_URL);  
        }
    }
    private function checkPoster($tmpPoster){
        if($tmpPoster == "image/jpg" ||  $tmpPoster == "image/jpeg" || $tmpPoster == "image/png" ) {
            return $_FILES['poster']['tmp_name'];
        }
        else{
            return null;
        }
    }
    private function checkFields($title, $sinopsis, $añoEstreno, $genero, $id= null){
        if (!$id) {
            return (!empty($title) && !empty($sinopsis) && !empty($añoEstreno) && !empty($genero));
        }else{
            return (!empty($title) && !empty($sinopsis) && !empty($añoEstreno) && !empty($genero) && !empty($id));
        }
    }
}