<?php

require_once "MainView.php";

class LoginView extends MainView{

    function showFormLogin($error = null){
        $this->smarty->assign("error", $error);
        $this->smarty->display("./templates/login.tpl");
    }
}    