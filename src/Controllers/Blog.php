<?php

namespace App\Controllers;

use App\Controllers\MainController;
use App\Models\PostManager;
use App\Models\CommentManager;

require_once ROOT . 'src/Controllers/MainController.php';
require_once ROOT . 'src/Models/PostManager.php';
require_once ROOT . 'src/Models/CommentManager.php';

class Blog extends MainController
{


    public function index()
    {
        $postManager = new PostManager();
        $posts = $postManager->readAll();
        $this->render('pages/blog', ['posts' => $posts]);
    }

    public function post($id_article)
    {
        // On instancie le modèle
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        // On va chercher
        // if à réaliser
        $post = $postManager->read($id_article);
        $comments = $commentManager->readAll($id_article);

        // On envoie à la vue
        $this->render('pages/post', ['post' => $post, 'comments' => $comments]);
    }

    /*
    public function viewsAll()
    {
        $this->_postManager = new PostManager();
        $articles = $this->_postManager->readAll();
        // $this->_view = new View('Accueil');
        //$this->_view->generate(array('articles' => $articles));
    }*/
}
