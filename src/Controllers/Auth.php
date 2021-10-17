<?php

namespace App\Controllers;

use App\Controllers\MainController;
use App\Models\UserManager;
use App\Models\User;
use DateTime;

require_once ROOT . 'src/Controllers/MainController.php';
require_once ROOT . 'src/Models/UserManager.php';
require_once ROOT . 'src/Models/User.php';

class Auth extends MainController
{
    public function login()
    {
        $this->render('auth/login');
    }

    public function loginPost()
    {
        $userManager = new UserManager();


        //$userManager->password;
        // var_dump($userManager->password);
        // exit;
        //$user = new User();
        //$userManager->getByUsername($_POST['username']);
        $user = $userManager->getByUsername(filter_input(INPUT_POST, 'username'));

        // var_dump($user['password']);
        // exit;

        if ($user === false) {
            $_SESSION['erreur'] = 'error';
            return header('Location: ' . local . 'auth/login');
            // $user = $userManager->getByUsername($_POST['username']);
        } else {
            if (isset($user['password'])) {
                if (password_verify($_POST['password'], $user['password'])) {
                    $_SESSION['auth'] = $user['is_admin'];
                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['username'] = $user['username'];
                    //return header('Location: ' . local . 'admin/addPost?success=true');
                    return header('Location: ' . local);
                } else {
                    $_SESSION['erreur'] = 'error';
                    return header('Location: ' . local . 'auth/login');
                    //$errorPassword = '<p>Mot de passe invalide. Veuillez recommencer</p>';
                }
            }
        }

        // var_dump($mdp);
        // exit;
        // $is_admin = $userManager->getByUsername($_POST['username']);

        //if isset $mdp[''password]

        //else {
        //     return header('Location: ' . local . 'auth/login');
        // // }
        // var_dump(password_verify($_POST['password'], $mdp['password']));
        // exit;
        //$this->render('auth/login');
    }

    public function logout()
    {
        session_destroy();

        return header('Location:' . local);
    }

    public function forgotPassword()
    {
        $this->render('auth/forgotPassword');
    }


    public function newPassword($token)
    {
        $this->render('auth/newPassword');

        $now = new DateTime();

        $userManager = new UserManager();

        // $passUpdate = $userManager->read($id_article);
        if (isset($_POST['confirmer'])) {
            $newPass = new User();

            $hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

            $newPass->setPassword($hash);
            $newPass->setDate_update($now->format('Y-m-d H:i:s'));

            $userManager->newPassword($token, $newPass);

            return header('Location:' . local);
            // $postManager = new PostManager();

            // $postUpdate = $postManager->read($id_article);
        }
    }

    public function register()
    {



        // $passUpdate = $userManager->read($id_article);
        // if (isset($_POST['confirmer'])) {
        //     //$hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        //     //$userManager->newPassword($_POST['newPassword']);
        //     $postManager = new PostManager();

        //     $postUpdate = $postManager->read($id_article);
        // }

        $this->render('auth/register');

        //si le formulaire d'ajout est posté
        if (!empty($_POST)) {
            $userManager = new UserManager();

            $now = new DateTime();

            // Si le formulaire d'ajout du Post est posté
            if (isset($_POST['create'])) {
                //Si user n'existe pas deja
                $verifyUser = $userManager->verifyUser($_POST['username'], $_POST['email']);
                if ($verifyUser['nbLogin'] === '0') {
                    //Si le mot de passe confirmé est valide
                    if ($_POST['password'] == $_POST['confirmPassword']) {
                        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        // crée un nouvel objet Post
                        // avec les valeurs recue en POST
                        $newUser = new User();
                        $newUser->setEmail(htmlspecialchars(filter_input(INPUT_POST, 'email')));
                        $newUser->setUsername(htmlspecialchars(filter_input(INPUT_POST, 'username')));
                        $newUser->setPassword($hash);
                        $newUser->setDate_creation($now->format('Y-m-d H:i:s'));
                        $newUser->setDate_update($now->format('Y-m-d H:i:s'));

                        $_POST = array(); //clear

                        $userManager->newUser($newUser);

                        return header('Location:' . local);
                    } else {
                        $_SESSION['erreur'] = 'error';
                        return header('Location: ' . local . 'auth/register');
                    }
                } else {
                    $_SESSION['erreur'] = 'verifyUser';
                    return header('Location: ' . local . 'auth/register');
                }
            } else {
                $this->render('auth/register');
            }
        }
    }

    public function editProfil($id_user)
    {


        $userManager = new UserManager();

        //$id_user =  $_SESSION['id_user'];

        $userUpdate = $userManager->readByUser($id_user);

        //si le formualaire d'ajout est posté
        if (!empty($_POST)) {

            $now = new DateTime();

            // Si le formulaire d'ajout du Post est posté
            if (isset($_POST['editBtn'])) {
                // mise a jour de l' objet Post
                // avec les valeurs recue en POST
                //$postUpdate = new Post();
                //$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $userUpdate->setEmail(htmlspecialchars(filter_input(INPUT_POST, 'email')));
                $userUpdate->setUsername(htmlspecialchars(filter_input(INPUT_POST, 'username')));
                //$userUpdate->setPassword($hash);
                //$postUpdate->setDate_creation($now->format('Y-m-d H:i:s'));
                $userUpdate->setDate_update($now->format('Y-m-d H:i:s'));
                //$userUpdate->setId_user($_POST['id_user']);

                $_POST = array(); //clear


                $userManager->updateForUser($userUpdate);

                return header('Location:' . local);
            } else {
                $this->render('auth/profil');
            }
        }

        $this->render('auth/profil', ['userUpdate' => $userUpdate]);
    }
}
