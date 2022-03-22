<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= local . "public/css/style.css" ?> />
    <link rel="stylesheet" href=<?= local . "public/css/layout.css" ?> />
    <link rel="stylesheet" href=<?= local . "public/css/home.css" ?> />
    <link rel="stylesheet" href=<?= local . "public/css/auth.css" ?> />
    <link rel="stylesheet" href=<?= local . "public/css/admin.css" ?> />
    <link rel="stylesheet" href=<?= local . "public/css/pages/blog.css" ?> />
    <link rel="stylesheet" href=<?= local . "public/css/pages/post.css" ?> />
    <link rel="icon" href=<?= local . "public/favicon.png" ?> />
    <title><?= $title ?></title>
</head>

<body>

    <header>
        <nav>
            <div class="container flex">
                <p class="noneResponsive"><a href=<?= local . "./" ?> class="imgAccueil">GAETANFOUILLET.FR</a></p>
                <ul class="flex menu menuNormal">
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

                <ul class="flex menu menuResponsive">
                    <li><a href=<?= local . "./" ?>><img src=<?= local . "public/img/accueil-Responsive.png" ?> /></a></li>
                    <li><a href=<?= local . "blog" ?>><img src=<?= local . "public/img/sauvegarder.png" ?> /></a></li>
                    <li><a href=<?= local . "contact" ?>><img src=<?= local . "public/img/livre-de-contact.png" ?> /></a></li>
                    <?php if (!isset($_SESSION['auth'])) : ?>
                        <li><a href=<?= local . "auth/login" ?>><img src=<?= local . "public/img/login.png" ?> /></a></li>
                    <?php endif ?>
                    <?php if (isset($_SESSION['auth'])) : ?>
                        <li><a href=<?= local . "auth/editProfil/" . $_SESSION['id_user'] ?>><img src=<?= local . "public/img/profile-user.png" ?> /></a></li>
                        <li><a href=<?= local . 'auth/logout' ?>><img src=<?= local . "public/img/logout.png" ?> /></a></li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>
    </header>