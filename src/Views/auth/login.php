<?php $title = "Se connecter"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main>
    <div class="container flexC">


        <!--Login Section-->
        <h2 class="haut contact">Se connecter</h2>

        <form action=<?= local . "auth/loginPost" ?> method="POST">
            <input required type="text" name="username" placeholder="Nom d'utilisateur" maxlength='50' class="input1" />
            <input required type="password" name="password" placeholder="Mot de passe" maxlength='255' class="input1" />
            <button type="submit" class="btnCo haut">Connexion</button>
        </form>

        <?php
        if (isset($_SESSION['erreur']) && ($_SESSION['erreur']) === 'error') :
        ?>
            <p class="error haut">Mot de passe ou nom d'utilisateur invalide. Veuillez recommencer</p>
            <?php session_destroy() ?>
        <?php endif ?>

        <?php
        if (isset($_SESSION['erreur']) && ($_SESSION['erreur']) === 'invalid') :
        ?>
            <p class="error haut">Compte invalide. Veuillez confirmer votre compte avant de vous connecter</p>
            <?php session_destroy() ?>
        <?php endif ?>

        <section>

            <div class="haut flex space flexResponsive">
                <p><a href=<?= local . "auth/forgotPassword" ?>>Mot de passe oublié ?</a></p>
                <p><a href=<?= local . "auth/register" ?>>Pas encore inscrit ? Créer un compte gratuit</a></p>
            </div>

        </section>

    </div>

</main>

<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>