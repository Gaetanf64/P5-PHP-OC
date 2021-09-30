<?php //require_once(ROOT . 'src/Views/home/mail.php'); 
?>
<form id="form" method="post" action=<?= local . "mail/sendMail" ?>>
    <input required type="text" name="surname" placeholder="Nom" class="input1" />
    <input required type="text" name="firstname" placeholder="Prenom" class="input1" />
    <input required type="email" name="email" placeholder="Adresse email" class="input1" />
    <textarea required type="text" name="message" placeholder="Votre message" rows="10" cols="40"></textarea>
    <button class="btn">Envoyer</button>
    <?php if (isset($valid)) {
        echo $valid;
    }
    if (isset($error)) {
        echo $error;
    }
    ?>
</form>
<aside><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.3264364715346!2d-0.34809628451344604!3d43.30742547913466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5648f288e8e225%3A0xe99a2fb59ff759e9!2s50%20Avenue%20des%20Lilas%2C%2064000%20Pau!5e0!3m2!1sfr!2sfr!4v1628418148162!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></aside>