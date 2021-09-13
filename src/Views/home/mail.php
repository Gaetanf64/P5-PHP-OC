<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPmailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'vendor/autoload.php';
require_once('env.php');

$mail = new PHPMailer(true);



if (!empty($_POST['surname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    try {
        //Configuration
        //Je veux des infos de debug
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        //SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
        $mail->Username   = 'gaetan.fouillet@gmail.com';          //SMTP username
        $mail->Password   = pass;                                 //SMTP password
        $mail->SMTPSecure = "tls";                                //Enable implicit TLS encryption
        $mail->Port       = 587;

        //Charset
        $mail->Charset = "utf-8";

        //Recipients
        $mail->addAddress('gaetan.fouillet@gmail.com');

        //Sender
        $mail->setFrom('no-reply@site.fr', 'Formulaire de contact');

        //Copy mail
        $mail->addCC($_POST['email']);

        //Content
        $mail->Subject = 'Formulaire de contact';
        $mail->isHTML(true);
        $mail->Body = '<p>De ' . $_POST['surname'] . ' ' . $_POST['firstname'] . '</p><p>' . $_POST['message'] . '</p>';

        //Send mail
        $mail->send();

        //header('location:./#form');
        //echo "<p>Votre message a bien été envoyé</p>";
        $valid = "<p class='haut'>Votre message a bien été envoyé</p>";
    } catch (Exception $e) {
        $error = "<p class='haut'>Message non envoyé. Veuillez recommencer</p>";
    }
};

if (isset($_POST['forgotPassword'])) {
    try {
        //Configuration
        //Je veux des infos de debug
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        //SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
        $mail->Username   = 'gaetan.fouillet@gmail.com';          //SMTP username
        $mail->Password   = pass;                                 //SMTP password
        $mail->SMTPSecure = "tls";                                //Enable implicit TLS encryption
        $mail->Port       = 587;

        //Charset
        $mail->Charset = "utf-8";

        //Recipients
        $mail->addAddress($_POST['emailPassword']);

        //Sender
        $mail->setFrom('no-reply@site.fr', 'Reintialisation mot de passe');

        $url = "http://localhost/php/OC/blog/auth/newPassword";

        //Content
        $mail->Subject = 'Reintialisation du mot de passe';
        $mail->isHTML(true);
        $mail->Body = "<p><a href=" . $url . ">Lien pour reintialiser le mot de passe</a></p>";

        //Send mail
        $mail->send();

        //header('location:./#form');
        //echo "<p>Votre message a bien été envoyé</p>";
        $valid = "<p class='haut'>Votre message a bien été envoyé</p>";
    } catch (Exception $e) {
        $error = "<p class='haut'>Mail non envoyé. Veuillez recommencer</p>";
    }
};
