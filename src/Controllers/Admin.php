<?php

namespace App\Controllers;

use App\Controllers\MainController;
use App\Models\PostManager;
use App\Models\Post;
use DateTime;

require_once ROOT . 'src/Controllers/MainController.php';
require_once ROOT . 'src/Models/PostManager.php';


class Admin extends MainController
{
    /**
     * Affiche la page d'ajout d'un post
     */
    public function addPost()
    {
        //Page accessible unique à l'admin
        $this->isAdmin();

        //Génère la vue de l'ajout d'un post
        $this->render('admin/addPost');

        //si le formualaire d'ajout est posté
        if (!empty($_POST)) {
            $postManager = new PostManager();

            //On instancie la date
            $now = new DateTime();

            // Si le formulaire d'ajout du Post est posté
            if (isset($_POST['btnAjouter'])) {
                //On met à jour les données
                $newPost = new Post();
                $newPost->setTitle(htmlspecialchars(filter_input(INPUT_POST, 'title')));
                $newPost->setChapo(htmlspecialchars(filter_input(INPUT_POST, 'chapo')));
                $newPost->setContent(htmlspecialchars(filter_input(INPUT_POST, 'content')));
                $newPost->setDate_creation($now->format('Y-m-d H:i:s'));
                $newPost->setDate_update($now->format('Y-m-d H:i:s'));
                $newPost->setId_user(filter_input(INPUT_POST, 'id_user'));


                $_POST = array(); //clear

                //On ajoute dans la db
                $postManager->create($newPost);

                return header('Location:' . local . 'blog');
            } else {
                $this->render('admin/addPost');
            }
        }
    }

    /**
     * Affiche la page de modification d'un post
     */
    public function editPost($id_article)
    {
        //Accessible que pour l'admin
        $this->isAdmin();

        //On instancie le manager
        $postManager = new PostManager();

        //On lit l'article à modifier
        $postUpdate = $postManager->read($id_article);

        //si le formualaire d'ajout est posté
        if (!empty($_POST)) {
            $now = new DateTime();

            // Si le formulaire d'ajout du Post est posté
            if (isset($_POST['btnAjouter'])) {
                //ON met à jour les données
                $postUpdate->setTitle(htmlspecialchars(filter_input(INPUT_POST, 'title')));
                $postUpdate->setChapo(htmlspecialchars(filter_input(INPUT_POST, 'chapo')));
                $postUpdate->setContent(htmlspecialchars(filter_input(INPUT_POST, 'content')));
                $postUpdate->setDate_update($now->format('Y-m-d H:i:s'));
                $postUpdate->setId_user(filter_input(INPUT_POST, 'id_user'));

                //On envoi dans la db
                $postManager->update($postUpdate);

                return header('Location:' . local . 'blog');
            } else {
                $this->render('admin/editPost');
            }
        }

        $this->render('admin/editPost', ['postUpdate' => $postUpdate]);
    }

    /**
     * Supprime le post
     */
    public function deletePost($id_article)
    {
        $postDelete = new PostManager();

        //Si le bouton Supprimer est cliqué
        $post = $postDelete->read($id_article);

        //On met à jour la db
        $postDelete->delete($post);

        return header('Location:' . local . 'blog');
    }
}
