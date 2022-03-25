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
    /**
     * Affiche la page de login
     */
    public function login()
    {
        $this->render('auth/login');
    }

    /**
     * Connexion de l'utlisateur
     */
    public function loginPost()
    {
        //On instancie le manager
        $userManager = new UserManager();

        //On récupère l'username de l'utilisateur
        $user = $userManager->getByUsername(filter_input(INPUT_POST, 'username'));

        //Si erreur
        if ($user === false) {
            $_SESSION['erreur'] = 'error';
            //On redirige vers la page de login
            return header('Location: ' . local . 'auth/login');
        } else {
            //Si le password est soumis
            if (isset($user['password'])) {
                //On vérifie si le hash du password est valide
                if (password_verify($_POST['password'], $user['password'])) {
                    //On met en place la Session du user
                    $_SESSION['auth'] = $user['is_admin'];
                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['username'] = $user['username'];

                    //On redirige vers la page d'accueil
                    return header('Location: ' . local);
                } else {
                    $_SESSION['erreur'] = 'error';
                    return header('Location: ' . local . 'auth/login');
                }
            }
        }
    }

    /**
     * Fonction de déconnexion
     */
    public function logout()
    {
        session_destroy();

        return header('Location:' . local);
    }

    /**
     * Affiche la page de mot de passe oublié
     */
    public function forgotPassword()
    {
        $this->render('auth/forgotPassword');
    }


    /**
     * Affiche la page de nouveau mot de passe
     */
    public function newPassword($token)
    {
        //Affiche la vue
        $this->render('auth/newPassword');

        //On instancie la date
        $now = new DateTime();
        //On instancie le manager du user
        $userManager = new UserManager();

        //Si le formulaire est soumis
        if (isset($_POST['confirmer'])) {
            $newPass = new User();

            //On hash le nouveau mot de passe renté
            $hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

            //On met à jour le password
            $newPass->setPassword($hash);
            $newPass->setDate_update($now->format('Y-m-d H:i:s'));

            //On envoi dans la db
            $userManager->newPassword($token, $newPass);

            return header('Location:' . local);
        }
    }

    public function register()
    {

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
                        //On hash le password
                        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        //On met à jour les données
                        $newUser = new User();
                        $newUser->setEmail(htmlspecialchars(filter_input(INPUT_POST, 'email')));
                        $newUser->setUsername(htmlspecialchars(filter_input(INPUT_POST, 'username')));
                        $newUser->setPassword($hash);
                        $newUser->setDate_creation($now->format('Y-m-d H:i:s'));
                        $newUser->setDate_update($now->format('Y-m-d H:i:s'));

                        $_POST = array(); //clear

                        //On envoi dans la db
                        $userManager->newUser($newUser);

                        return header('Location:' . local);
                    } else { //Si password non valide
                        $_SESSION['erreur'] = 'error';
                        return header('Location: ' . local . 'auth/register');
                    }
                } else { //Si user existe deja
                    $_SESSION['erreur'] = 'verifyUser';
                    return header('Location: ' . local . 'auth/register');
                }
            } else {
                $this->render('auth/register');
            }
        }
    }

    /**
     * Affiche la page de profil
     */
    public function editProfil($id_user)
    {
        //On instancie le manager
        $userManager = new UserManager();

        //On récupère les données du user
        $userUpdate = $userManager->readByUser($id_user);

        //si le formualaire d'ajout est posté
        if (!empty($_POST)) {

            $now = new DateTime();

            // Si le formulaire d'ajout du Post est posté
            if (isset($_POST['editBtn'])) {
                //On met à jour les données
                $userUpdate->setEmail(htmlspecialchars(filter_input(INPUT_POST, 'email')));
                $userUpdate->setUsername(htmlspecialchars(filter_input(INPUT_POST, 'username')));
                $userUpdate->setDate_update($now->format('Y-m-d H:i:s'));

                $_POST = array(); //clear

                //On envoi dans la db
                $userManager->updateForUser($userUpdate);

                return header('Location:' . local);
            } else {
                $this->render('auth/profil');
            }
        }

        //On génère la vue
        $this->render('auth/profil', ['userUpdate' => $userUpdate]);
    }
}
