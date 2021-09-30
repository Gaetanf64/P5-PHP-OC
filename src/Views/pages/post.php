<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link rel="stylesheet" href="../../public/css/layout.css" />
    <link rel="stylesheet" href="../../public/css/home.css" />
    <title>Post</title>

<body>

    <?php require_once ROOT . 'src/Views/layout/menu.php'; ?>

    <main>
        <div class="container">



            <section class="haut">

                <article>
                    <!--Post Section-->
                    <h2 class="haut contact"><?= $post->getTitle() ?></h2>
                    <h6><?= $post->getChapo() ?></h6>
                    <p><?= $post->getContent() ?></p>
                    <p>Date de création : <?= $post->getDate_creation() ?></p>
                    <p>Date de dernière mise à jour : <?= $post->getDate_update() ?></p>

                </article>



                <h4 class="haut">Commentaires</h4>
                <?php foreach ($comments as $comment) :
                ?>
                    <article>
                        <p><?= $comment->getContent_comment() ?></p>
                        <p>Date de création : <?= $comment->getDate_creation() ?></p>
                        <p>Date de dernière mise à jour : <?= $comment->getDate_update() ?></p>
                    </article>
                    <!--'Ecrit par' => $post->getId_user()-->
                <?php endforeach ?>

            </section>

            <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === '1') : ?>
                <section>
                    <p><a href=<?= local . "admin/editPost/" . $post->getId_article() ?>>Modifier l'article</a></p>
                    <p><a href=<?= local . "admin/deletePost/" . $post->getId_article() ?>>Supprimer l'article</a></p>
                </section>
            <?php endif ?>

            <?php if (isset($_SESSION['auth'])) : ?>
                <form action="" method="post">
                    <textarea required type="text" name="content_comment" placeholder="Ajouter un commentaire" rows="10" cols="40"></textarea>
                    <input required type="hidden" name="id_user" placeholder="Id_user" value="<?= $_SESSION['id_user'] ?>" class="" />
                    <input required type="hidden" name="id_article" placeholder="Id_article" value="<?= $post->getId_article() ?>" class="" />
                    <button name="addComment" class="btn">Ajouter</button>
                </form>
            <?php endif ?>
        </div>

    </main>
    <?php require_once ROOT . 'src/Views/layout/footer.php'; ?>
</body>

</html>