<?php
require_once "./apps/controllers/MovieController.php";
require_once "./apps/controllers/GenController.php";
require_once "./apps/controllers/LoginController.php";

$movieController = new MovieController();
$genController = new GenController();
$loginController = new LoginController();

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET["action"])) {
    $action = $_GET["action"];
}else{
    $action = "home";
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'login':
        $loginController->showLogin();
        break;
    case 'verify':
        $loginController->verifyLogin();
        break;
    case 'logout':
        $loginController->logout();
        break;
    case 'home':
        $movieController->showHome();
        break;
    case 'id':
        $movieController->showPelibyId($params[1]);
        break;
    case 'genero':
        $genController->showMovieByGen($params[1]);
        break;
    case 'showForm':
        if (!isset($params[1])) {
            $movieController->showForm();
        }else{
            $movieController->showFormUpdate($params[1]);
        }
        break;
    case 'createMovie':
        $movieController->createMovie();
        break;
    case 'updateMovie':
        $movieController->updateMovie();
        break;
    case 'deleteMovie':
        $movieController->deleteMovie($params[1]);
        break;
    case 'genreList':
        $genController->showGeneros();
        break;
    case 'createGen':
        $genController->createGenero();
        break;
    case 'showUpdateGen':
        $genController->showUpdateGen($params[1]);
        break;
    case 'updateGen':
        $genController->updateGen();
        break;
    case 'deleteGen':
        $genController->deleteGenero($params[1]);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo "ERROR 404. Pagina no encontrada";
        break;
}
