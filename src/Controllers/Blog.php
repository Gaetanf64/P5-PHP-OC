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

    /**
     * Affiche la page de tous les posts
     * 
     */
    public function index()
    {
        $postManager = new PostManager();
        $posts = $postManager->readAll();
        $this->render('pages/blog', ['posts' => $posts]);
    }

    /**
     * Affiche le détail d'un post
     * 
     */
    public function post($id_article)
    {
        // On instancie le modèle
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        // On va chercher le post et les commentaires
        $post = $postManager->read($id_article);
        $comments = $commentManager->readComment($id_article);

        //PARTIE AJOUT D'UN COMMENTAIRE

        //si le formualaire d'ajout est posté
        if (!empty($_POST)) {

            //On instancie la date
            $now = new DateTime();

            // Si le formulaire d'ajout du Post est posté
            if (isset($_POST['addComment'])) {
                //On récupère les valeurs des champs du commentaire
                $newComment = new Comment();
                $newComment->setContent_comment(htmlspecialchars(filter_input(INPUT_POST, 'content_comment')));
                $newComment->setDate_creation($now->format('Y-m-d H:i:s'));
                $newComment->setDate_update($now->format('Y-m-d H:i:s'));
                $newComment->setId_user(filter_input(INPUT_POST, 'id_user'));
                $newComment->setId_article(filter_input(INPUT_POST, 'id_article'));

                $_POST = array(); //clear

                //On ajoute le commentaire dans la db
                $commentManager->addComment($newComment);

                //On redirige vers la page des posts
                return header('Location:' . local . 'blog');
            } else {
                $this->render('pages/post', ['post' => $post, 'comments' => $comments]);
            }
        }

        // On envoie à la vue
        $this->render('pages/post', ['post' => $post, 'comments' => $comments]);
    }
}
