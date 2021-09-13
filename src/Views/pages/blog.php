<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/layout.css" />
    <link rel="stylesheet" href="public/css/home.css" />
    <title>Blog</title>

<body>

    <?php require_once ROOT . 'src/Views/layout/menu.php'; ?>

    <main>
        <div class="container">


            <!--Blog Section-->
            <h2 class="haut contact">Blog</h2>

            <section class="haut flex">
                <?php
                foreach ($posts as $post) :
                ?>
                    <article>
                        <h4><?= $post->getTitle() ?></h4>
                        <h6><?= $post->getChapo() ?></h6>
                        <p><?= $post->getContent() ?></p>
                        <p>Date de création : <?= $post->getDate_creation() ?></p>
                        <p>Date de dernière mise à jour : <?= $post->getDate_update() ?></p>
                        <a href="blog/post/<?= $post->getId_article() ?>">Lire la suite</a>
                        <?php //$post->getId_user() 
                        ?>
                    </article>
                    <!--'Ecrit par' => $post->getId_user()-->
                <?php endforeach;
                ?>
            </section>
            <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === '1') : ?>
                <section>
                    <p><a href=<?= local . "admin/addPost" ?>>Ajouter un article</a></p>
                </section>
            <?php endif ?>
        </div>

    </main>
    <?php require_once ROOT . 'src/Views/layout/footer.php'; ?>
</body>

</html>