<header>
    <nav>
        <div class="container flex">
            <p><a href=<?= local . "./" ?> class="imgAccueil">GAETANFOUILLET.FR</a></p>
            <ul class="flex menu">
                <li><a href=<?= local . "./" ?>>Accueil</a></li>
                <li><a href=<?= local . "blog" ?>>Blog</a></li>
                <li><a href=<?= local . "contact" ?>>Contact</a></li>
                <?php if (!isset($_SESSION['auth'])) : ?>
                    <li><a href=<?= local . "auth/login" ?>>Connexion</a></li>
                <?php endif ?>
                <?php if (isset($_SESSION['auth'])) : ?>
                    <li><a href=<?= local . "auth/editProfil/" . $_SESSION['id_user'] ?>>Profil</a></li>
                    <li><a href=<?= local . 'auth/logout' ?>>Déconnexion</a></li>
                <?php endif ?>
            </ul>
        </div>
    </nav>
</header>