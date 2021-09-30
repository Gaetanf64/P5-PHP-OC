<?php

namespace App\Controllers;

use App\Controllers\MainController;
use App\Models\PostManager;
use App\Models\CommentManager;
use App\Models\Comment;
use DateTime;

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
        $comments = $commentManager->readComment($id_article);

        //si le formualaire d'ajout est posté
        if (!empty($_POST)) {

            $now = new DateTime();

            // Si le formulaire d'ajout du Post est posté
            if (isset($_POST['addComment'])) {
                // crée un nouvel objet Post
                // avec les valeurs recue en POST
                $newComment = new Comment();
                $newComment->setContent_comment(htmlspecialchars($_POST['content_comment']));
                //$newComment->setIs_actived($_POST['is_actived']);
                $newComment->setDate_creation($now->format('Y-m-d H:i:s'));
                $newComment->setDate_update($now->format('Y-m-d H:i:s'));
                $newComment->setId_user($_POST['id_user']);
                $newComment->setId_article($_POST['id_article']);

                $_POST = array(); //clear


                $commentManager->addComment($newComment);

                return header('Location:' . local . 'blog');
            } else {
                $this->render('pages/post', ['post' => $post, 'comments' => $comments]);
            }
        }

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
