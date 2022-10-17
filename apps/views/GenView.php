<?php

require_once "MainView.php";

class GenView extends MainView{

    function showGenList($generos, $genUpdate = null){
        $this->smarty->assign("generos", $generos);
        $this->smarty->assign("genUpdate", $genUpdate);
        $this->smarty->display("./templates/genreList.tpl");
    }
}