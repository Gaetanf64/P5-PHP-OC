<?php $title = "Création de votre compte"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main>
    <div class="container">


        <!--Register Section-->
        <h2 class="haut contact">Création de votre compte</h2>

        <form action=<?= local . "auth/register" ?> method="POST">
            <input required type="text" name="username" placeholder="Nom d'utilisateur" maxlength='50' class="input1" />
            <input required type="email" name="email" placeholder="Email" maxlength='50' class="input1" />
            <input required type="password" name="password" placeholder="Mot de passe" maxlength='255' class="input1" />
            <input required type="password" name="confirmPassword" placeholder="Confirmer mot de passe" maxlength='255' class="input1" />
            <button type="submit" name="create" class="btnCo haut">Enregistrer</button>
        </form>

        <?php if (isset($_SESSION['erreur']) && ($_SESSION['erreur']) === 'error') :
        ?>
            <p class="error haut">Mots de passes ne correspondent pas</p>
            <?php session_destroy() ?>
        <?php endif ?>
        <?php if (isset($_SESSION['erreur']) && ($_SESSION['erreur']) === 'verifyUser') :
        ?>
            <p class="error haut">Nom d'utilisateur ou Email déjà pris</p>
            <?php session_destroy() ?>
        <?php endif ?>

    </div>

</main>

<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>