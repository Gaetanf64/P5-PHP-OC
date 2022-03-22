<?php $title = "Gestion de votre compte"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main>
    <div class="container">

        <!--Profil Section-->
        <h1 class="haut contact">Gestion de votre compte</h1>

        <form action="" method="POST">
            <input required type="text" name="username" placeholder="Nom d'utilisateur" value="<?= $userUpdate->getUsername() ?>" class="input1" />
            <input required type="email" name="email" placeholder="Email" value="<?= $userUpdate->getEmail() ?>" class=" input1" />
            <button type="submit" name="editBtn" class="btnCo haut">Enregistrer</button>
        </form>
    </div>

</main>

<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>