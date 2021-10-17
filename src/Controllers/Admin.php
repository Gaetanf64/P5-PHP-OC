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
    public function addPost()
    {
        $this->is_Admin();


        $this->render('admin/addPost');

        //si le formualaire d'ajout est posté
        if (!empty($_POST)) {
            $postManager = new PostManager();

            $now = new DateTime();

            // Si le formulaire d'ajout du Post est posté
            if (isset($_POST['btnAjouter'])) {
                // crée un nouvel objet Post
                // avec les valeurs recue en POST
                $newPost = new Post();
                $newPost->setTitle(htmlspecialchars($_POST['title']));
                $newPost->setChapo(htmlspecialchars($_POST['chapo']));
                $newPost->setContent(htmlspecialchars(filter_input(INPUT_POST, 'content')));
                $newPost->setDate_creation($now->format('Y-m-d H:i:s'));
                $newPost->setDate_update($now->format('Y-m-d H:i:s'));
                $newPost->setId_user(filter_input(INPUT_POST, 'id_user'));


                $_POST = array(); //clear


                $postManager->create($newPost);

                return header('Location:' . local . 'blog');
            } else {
                $this->render('admin/addPost');
            }
        }
    }

    public function editPost($id_article)
    {
        $this->is_Admin();

        $postManager = new PostManager();

        $postUpdate = $postManager->read($id_article);

        //si le formualaire d'ajout est posté
        if (!empty($_POST)) {



            $now = new DateTime();

            // Si le formulaire d'ajout du Post est posté
            if (isset($_POST['btnAjouter'])) {
                // mise a jour de l' objet Post
                // avec les valeurs recue en POST
                //$postUpdate = new Post();
                $postUpdate->setTitle(htmlspecialchars($_POST['title']));
                $postUpdate->setChapo(htmlspecialchars($_POST['chapo']));
                $postUpdate->setContent(htmlspecialchars($_POST['content']));
                //$postUpdate->setDate_creation($now->format('Y-m-d H:i:s'));
                $postUpdate->setDate_update($now->format('Y-m-d H:i:s'));
                $postUpdate->setId_user($_POST['id_user']);


                $postManager->update($postUpdate);

                return header('Location:' . local . 'blog');
            } else {
                $this->render('admin/editPost');
            }
        }



        $this->render('admin/editPost', ['postUpdate' => $postUpdate]);
    }

    public function deletePost($id_article)
    {
        $postDelete = new PostManager();

        //Si le bouton Supprimer est cliqué
        //if (isset($_GET['id_article'])) {
        $post = $postDelete->read($id_article);
        // var_dump($post);
        // exit;
        $postDelete->delete($post);

        return header('Location:' . local . 'blog');
        //}
    }
}
