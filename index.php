<?php

namespace App;

use App\Controllers\MainController;
use App\Controllers\Home;
use App\Controllers\Contact;
use App\Controllers\Mail;



// On génère une constante contenant le chemin vers la racine publique du projet
define('ROOT', str_replace('index.php', '', filter_input(INPUT_SERVER, 'SCRIPT_FILENAME')));

// On génère une constante reprenant le chemin du site
define('local', 'http://localhost/php/OC/blog/');


// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', filter_input(INPUT_GET, 'p'));

// Si au moins 1 paramètre existe
if ($params[0] != "") {
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]);

    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';

    // On charge la classe
    $class = "App\Controllers\\$controller";



    // On appelle le contrôleur
    require_once(ROOT . 'src/Controllers/' . $controller . '.php');

    // On instancie le contrôleur
    $controller = new $class();


    //Si la fonction existe
    if (method_exists($controller, $action)) {
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller, $action], $params);
        // On appelle la méthode
        $controller->$action($params);
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
