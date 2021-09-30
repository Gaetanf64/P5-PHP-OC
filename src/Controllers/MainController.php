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
        //$this->db = $db;
    }

    public function render(string $fichier, array $data = [])
    {
        extract($data);

        // On démarre le buffer de sortie
        // ob_start();

        // // On génère la vue
        // /*require_once ROOT . 'src/Views/' . $fichier . '.php';*/

        // // On stocke le contenu dans $content
        // $content = ob_get_clean();

        // Template de page
        require_once ROOT . 'src/Views/' . $fichier . '.php';
    }


    protected function is_Admin()
    {
        if (!isset($_SESSION['auth']) && $_SESSION['auth'] !== '1') {
            //return header('Location: ' . local . 'admin/addPost');
            return header('Location: ' . local . 'auth/login');
            //return true;
            //die();
        }
        // else {
        //return header('Location: ' . local . 'auth/login');
        //}
    }
    /*
    protected function is_User()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth'] === '0') {
            return header('Location: ' . local);
            //return true;
        } else {
            return header('Location: ' . local . 'auth/login');
        }
    }*/
}
