<?php

namespace App\Controllers;

use PDO;
use App\Models\MainModel;

require_once ROOT . 'src/Models/MainModel.php';

abstract class MainController
{
    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @return void
     */

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function render(string $fichier, array $data = [])
    {
        extract($data);

        // On démarre le buffer de sortie
        ob_start();

        // Template de page
        require_once ROOT . 'src/Views/' . $fichier . '.php';
    }

    /**
     * Accès que pour l'admin
     */
    protected function is_Admin()
    {
        //Si is_admin différent de 1
        if (!isset($_SESSION['auth']) && $_SESSION['auth'] !== '1') {
            //On redirige vers la page d'accueil
            return header('Location: ' . local . 'auth/login');
        }
    }
}
