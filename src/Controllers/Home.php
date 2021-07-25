<?php

namespace App\Controllers;

use App\Controllers\MainController;

require_once ROOT.'src/Controllers/MainController.php';

class Home extends MainController{

    public function index(){
        $this->render('home/index', []);
    }

}

?>