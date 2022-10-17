<?php

require_once "./libs/smarty-4.2.1/libs/Smarty.class.php";

class MainView{
    protected $smarty;
    
    function __construct($isAdmin){
        $this->smarty = new Smarty();
        $this->smarty->assign("isAdmin", $isAdmin);
    }
    
    function showError($msg, $url=null){
        $this->smarty->assign("msg", $msg);
        $this->smarty->assign("url", $url);
        $this->smarty->display("./templates/error.tpl");
    }
}