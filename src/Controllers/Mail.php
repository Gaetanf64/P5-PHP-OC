<?php

namespace App\Controllers;
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use App\Controllers\MainController;
use PHPMailer\PHPMailer\PHPmailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Models\UserManager;
use App\Models\User;

require_once ROOT . 'src/Controllers/MainController.php';
require_once ROOT . 'src/Models/UserManager.php';
require_once ROOT . 'src/Models/User.php';
//Load Composer's autoloader
require 'vendor/autoload.php';
require_once('env.php');


class Mail extends MainController
{

    /**
     * Envoi un mail par le formulaire de contact
     */
    public function sendMail()
    {
        //On instancie PHPMailer
        $mail = new PHPMailer(true);

        //Si le formulaire de contact est rempli
        if (!empty($_POST['surname']) && !empty(filter_input(INPUT_POST, 'firstname')) && !empty(filter_input(INPUT_POST, 'email')) && !empty(filter_input(INPUT_POST, 'message'))) {

            try {
                //Configuration
                //Je veux des infos de debug
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

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
                $mail->addAddress('gaetan.fouillet@greta-cfa-aquitaine.academy');

                //Sender
                $mail->setFrom('no-reply@site.fr', 'Formulaire de contact');

                //Copy mail
                $mail->addCC(filter_input(INPUT_POST, 'email'));

                //Content
                $mail->Subject = 'Formulaire de contact';
                $mail->isHTML(true);
                $mail->Body = '<p>De ' . filter_input(INPUT_POST, 'surname') . ' ' . filter_input(INPUT_POST, 'firstname') . '</p><p>' . filter_input(INPUT_POST, 'message') . '</p>';

                //Send mail
                $mail->send();

                $_POST = array(); //clear

                //On redirige vers la page d'accueil
                return header('Location: ' . local);
            } catch (Exception $e) {
                //Si mail non envoyé
                echo "<p class='haut'>Message non envoyé. Veuillez recommencer</p>";
            }
        }
    }

    /**
     * Envoi du mail si mot de passe oublié
     */
    public function forgotPassword()
    {
        //On instancie PHPMailer
        $mail = new PHPMailer(true);

        //On instancie le manager du user
        $userManager = new UserManager();

        //Si le formualaire d'oubli de mot de passe est soumis
        if (isset($_POST['forgotPassword'])) {
            try {
                //Configuration
                //Je veux des infos de debug
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

                //On récupère l'email rentré par l'utilisateur
                $email = $userManager->getByEmail(filter_input(INPUT_POST, 'emailPassword'));

                //Si erreur
                if ($email === false) {
                    $_SESSION['erreur'] = 'error';
                    //On redirige vers la page d'oubli de mot de passe
                    return header('Location: ' . local . 'auth/forgotPassword');
                } else {
                    //On génère un token aléatoire
                    $token = uniqid();

                    //On crée la variable qui renverra vers l'url pour la réintialisation du mot de passe
                    $url = local . "auth/newPassword/$token";


                    //On instancie l'utilisateur et on récupère le token
                    $newUserPass = new User();
                    $newUserPass->setToken($token);

                    //$_POST = array(); //clear

                    //On envoi les données dans la db du UserManager
                    $userManager->generateToken($newUserPass, filter_input(INPUT_POST, 'emailPassword'));


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
                    $mail->addAddress(filter_input(INPUT_POST, 'emailPassword'));

                    //Sender
                    $mail->setFrom('no-reply@site.fr', 'Reintialisation mot de passe');


                    //Content
                    $mail->Subject = 'Reintialisation du mot de passe';
                    $mail->isHTML(true);
                    $mail->Body = "<p><a href=" . $url . ">Lien pour reintialiser le mot de passe</a></p>";

                    //Send mail
                    $mail->send();

                    $_POST = array(); //clear

                    //On redirige vers la page d'accueil
                    return header('Location: ' . local);
                }
            } catch (Exception $e) {
                //Si mail non envoyé
                echo "<p class='haut'>Mail non envoyé. Veuillez recommencer</p>";
            }
        }
    }
}
