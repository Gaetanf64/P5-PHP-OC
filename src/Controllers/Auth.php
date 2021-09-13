<?php

namespace App\Controllers;

use App\Controllers\MainController;
use App\Models\UserManager;
use App\Models\User;

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
        $user = $userManager->getByUsername($_POST['username']);
        // var_dump($mdp);
        // exit;
        // $is_admin = $userManager->getByUsername($_POST['username']);

        //if isset $mdp[''password]
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['auth'] = $user['is_admin'];
            $_SESSION['id_user'] = $user['id_user'];
            //return header('Location: ' . local . 'admin/addPost?success=true');
            return header('Location: ' . local . 'admin/addPost');
        }
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

        // if (isset($_POST['forgotPassword'])) {
        //     $token = uniqid();
        //     //$url = local . "auth/newPassword/$token";

        //     // $message = "Bonjour : $url";
        //     //     $headers = "Content-Type: text/plain; charset='utf-8'" . "";

        //     //     if (mail($_POST['email'], "Mot de passe oublié", $message, $headers)) {
        //     $userManager = new UserManager();

        //     //         $user = $userManager->getByUsername($_POST['email']);
        //     $userManager->forgotPassword($token, $_POST['forgotPassword']);

        //     //         echo "Mail envoyé";
        //     //     }
        //     // }
        //     // if (isset($_GET['token']) && $_GET['token'] !== "") {
        //     //     $userManager = new UserManager();
        // }
    }

    public function newPassword()
    {


        $userManager = new UserManager();
        // $passUpdate = $userManager->read($id_article);
        // if (isset($_POST['confirmer'])) {
        //     //$hash = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
        //     //$userManager->newPassword($_POST['newPassword']);
        //     $postManager = new PostManager();

        //     $postUpdate = $postManager->read($id_article);
        // }

        $this->render('auth/newPassword');
    }
}
