<?php

namespace App\Controllers;

use App\Controllers\MainController;

require_once ROOT . 'src/Controllers/MainController.php';

class Contact extends MainController
{
    /**
     * Afficher la page contact
     */
    public function index()
    {
        $this->render('pages/contact', []);
    }
}
