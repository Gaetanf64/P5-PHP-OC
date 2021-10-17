<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/layout.css" />
    <link rel="stylesheet" href="public/css/pages/blog.css" />
    <title>Blog</title>

<body>

    <?php require_once ROOT . 'src/Views/layout/menu.php'; ?>

    <main>
        <div class="container">


            <!--Blog Section-->
            <h1 class="haut contact">Blog</h1>

            <section class="haut">
                <?php
                foreach ($posts as $post) :
                ?>
                    <article class="haut ligne">
                        <h3><?= $post->getTitle() ?></h3>
                        <h4 class="miHaut"><?= $post->getChapo() ?></h4>
                        <p><?= $post->getContent() ?></p>
                        <p class="haut italic">Ecrit par <?= $post->getUsername() ?></p>
                        <p class="haut date"><span class="gras"> Date de création : </span><?= $post->getDate_creation() ?></p>
                        <p class="date"><span class="gras"> Date de dernière mise à jour : </span><?= $post->getDate_update() ?></p>
                        <a class="suite" href="blog/post/<?= $post->getId_article() ?>">Lire la suite</a>
                    </article>
                <?php endforeach; ?>
            </section>

            <!--Admin Section-->
            <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === '1') : ?>
                <section>
                    <p class="haut center"><a class="btnAdmin" href=<?= local . "admin/addPost" ?>>Ajouter un article</a></p>
                </section>
            <?php endif ?>
        </div>

    </main>
    <?php require_once ROOT . 'src/Views/layout/footer.php'; ?>
</body>

</html>