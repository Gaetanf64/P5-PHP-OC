<?php

namespace App\Controllers;

use App\Controllers\MainController;
use App\Models\UserManager;
use App\Models\User;
use DateTime;
use PHPMailer\PHPMailer\PHPmailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require_once ROOT . 'src/Controllers/MainController.php';
require_once ROOT . 'src/Models/UserManager.php';
require_once ROOT . 'src/Models/User.php';
//Load Composer's autoloader
require 'vendor/autoload.php';
require_once('env.php');

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
            if ($user['is_activated'] == 0) {
                $_SESSION['erreur'] = 'invalid';
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
                        $newUser->setIs_activated(0);
                        $newUser->setDate_creation($now->format('Y-m-d H:i:s'));
                        $newUser->setDate_update($now->format('Y-m-d H:i:s'));

                        $_POST = array(); //clear

                        //On envoi dans la db
                        $userManager->newUser($newUser);

                        //PARTIE ENVOI DU MAIL

                        //On instancie PHPMailer
                        $mail = new PHPMailer(true);

                        //On instancie le manager du user
                        $userManager = new UserManager();

                        try {
                            //Configuration
                            //Je veux des infos de debug
                            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

                            //On génère un token aléatoire
                            $token = uniqid();

                            //On crée la variable qui renverra vers l'url pour la réintialisation du mot de passe
                            $url = local . "auth/confirm/$token";


                            //On instancie l'utilisateur et on récupère le token
                            $newUser = new User();
                            $newUser->setToken($token);

                            //$_POST = array(); //clear

                            //On envoi les données dans la db du UserManager
                            $userManager->generateToken($newUser, filter_input(INPUT_POST, 'email'));


                            //SMTP Configuration
                            $mail->isSMTP();
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
                            $mail->Username   = username;                             //SMTP username
                            $mail->Password   = pass;                                 //SMTP password
                            $mail->SMTPSecure = "tls";                                //Enable implicit TLS encryption
                            $mail->Port       = 587;

                            //Charset
                            $mail->Charset = "utf-8";

                            //Recipients
                            $mail->addAddress(filter_input(INPUT_POST, 'email'));

                            //Sender
                            $mail->setFrom('no-reply@site.fr', 'Confirmation de votre compte');


                            //Content
                            $mail->Subject = 'Confirmation de votre compte';
                            $mail->isHTML(true);
                            $mail->Body = "<p><a href=" . $url . ">Lien pour confirmer votre compte</a></p>";

                            //Send mail
                            $mail->send();

                            $_POST = array(); //clear

                            //On redirige vers la page d'accueil
                            return header('Location: ' . local);
                        } catch (Exception $e) {
                            //Si mail non envoyé
                            echo "<p class='haut'>Mail non envoyé. Veuillez recommencer</p>";
                        }
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
     * Confirme le compte du nouveau user par mail
     * 
     */
    public function confirm($token)
    {
        $this->render('auth/confirm');

        //On instancie la date
        $now = new DateTime();
        //On instancie le manager du user
        $userManager = new UserManager();

        $user = new User();

        $user->setIs_activated(1);
        $user->setDate_update($now->format('Y-m-d H:i:s'));

        //On envoi dans la db
        $userManager->confirmDefinitive($token, $user);


        return header('Location:' . local . 'auth/login');
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
