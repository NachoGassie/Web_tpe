<?php

require_once "MainView.php";

class MovieView extends MainView{

    function showHome($peliculas){
        $this->smarty->assign("peliculas", $peliculas);
        $this->smarty->display("./templates/home.tpl");
    }
    function showMovieGen($peliculas){
        $this->smarty->assign("peliculas", $peliculas);
        $this->smarty->display("./templates/movieGen.tpl");
    }
    function showMovieId($peli){
        $this->smarty->assign("peli", $peli);
        $this->smarty->display("./templates/movieId.tpl");
    }
    function showForm($generos, $peli=null){
        $this->smarty->assign("generos", $generos);
        $this->smarty->assign("peli", $peli);
        $this->smarty->display("./templates/movieForm.tpl");
    }
}