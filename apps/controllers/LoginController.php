<?php
require_once "MainController.php";
require_once "./apps/views/LoginView.php";
require_once "./apps/models/UserModel.php";

class LoginController extends Controller{
    private $logView;
    private $model;

    function __construct(){
        parent::__construct();
        $this->model = new UserModel();
        $this->logView = new LoginView($this->isLogged());
    }

    function showLogin(){
        if (!$this->isLogged()) {
            $this->logView->showFormLogin();
        }else{
            header("Location: ".BASE_URL);
        }
    }

    function verifyLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->getUser($email);

        if ($user && password_verify($password, $user->password)) {
            session_start();
            $_SESSION['USER_ID'] = $user->id_user;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;
            header("Location: " . BASE_URL);
        } else {
            $this->logView->showFormLogin("Usuario o la contraseña incorrectos.");
        } 
    }

    function logout(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}