<?php
require_once "./apps/controllers/MovieController.php";
require_once "./apps/controllers/GenController.php";
require_once "./apps/controllers/LoginController.php";

<<<<<<< HEAD
$movieController = new MovieController();
=======
$MovieController = new MovieController();
>>>>>>> 6c5fa87e14fb66405107159a6c98ae8c993e5201
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
<<<<<<< HEAD
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
=======
        $MovieController->showHome();
        break;
    case 'id':
        $MovieController->showPelibyId($params[1]);
        break;
    case 'genero':
        $MovieController->showMovieByGen($params[1]);
        break;
    case 'showForm':
        if (!isset($params[1])) {
            $MovieController->showForm();
        }else{
            $MovieController->showFormUpdate($params[1]);
        }
        break;
    case 'createMovie':
        $MovieController->createMovie();
        break;
    case 'updateMovie':
        $MovieController->updateMovie();
        break;
    case 'deleteMovie':
        $MovieController->deleteMovie($params[1]);
>>>>>>> 6c5fa87e14fb66405107159a6c98ae8c993e5201
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
