<?php

namespace App;

use App\Controllers\MainController;
use App\Controllers\Home;
use App\Controllers\Contact;
use App\Controllers\Mail;



// On génère une constante contenant le chemin vers la racine publique du projet
define('ROOT', str_replace('index.php', '', filter_input(INPUT_SERVER, 'SCRIPT_FILENAME')));

define('local', 'http://localhost/php/OC/blog/');

// define(
//     "HTTP",
//     ($_SERVER["SERVER_NAME"] == "localhost")
//         ? "http://localhost/your_work_folder/"
//         : "http://your_site_name.com/"
// );




// On appelle le modèle et le contrôleur principaux
//require_once(ROOT.'app/Model.php');
//require_once(ROOT.'Controllers/MainController.php');

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', filter_input(INPUT_GET, 'p'));

// Si au moins 1 paramètre existe
if ($params[0] != "") {
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    //$controller = '\App\Controllers\\' . ucfirst($params[0]);
    $controller = ucfirst($params[0]);


    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';

    $class = "App\Controllers\\$controller";

    //define('namespace', "App\Controllers\\$controller");
    //var_dump(namespace);
    //use namespace;



    // On appelle le contrôleur
    require_once(ROOT . 'src/Controllers/' . $controller . '.php');
    //var_dump($controller);
    // On instancie le contrôleur
    $controller = new $class();

    // exit;
    //$controller = new Contact();

    if (method_exists($controller, $action)) {
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller, $action], $params);
        // On appelle la méthode
        $controller->$action($params);
        //$controller->index();
    } else {
        // On envoie le code réponse 404
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
} else {
    // Ici aucun paramètre n'est défini
    // On appelle le contrôleur par défaut
    require_once ROOT . 'src/Controllers/Home.php';

    // On instancie le contrôleur
    $controller = new Home();

    // On appelle la méthode index
    $controller->index();
};
